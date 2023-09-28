@extends('app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous"
          rel="stylesheet">
</head>
<body>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{ route('attemptLogin') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
    <div class="col-md-6">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" oninput="checkEmailExists()">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>
<div class="mb-3 row" id="password-field" style="display: none;">
    <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
    <div class="col-md-6">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
</div>
<div id="email-error" class="mb-3 row" style="display: none;">
    <div class="col-md-6 offset-md-4">
        <span class="text-danger">Email not found in the database.</span>
    </div>
</div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    function checkEmailExists() {
        const email = document.getElementById('email').value;
        const passwordField = document.getElementById('password-field');

        axios.post('{{ route('checkEmail') }}', { email: email })
            .then(function (response) {
                if (response.data.exists) {
                    // Email exists, show the password field
                    passwordField.style.display = 'block';
                } else {
                    // Email does not exist, show an error message
                    passwordField.style.display = 'none';
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    }
</script>
</body>
</html>
