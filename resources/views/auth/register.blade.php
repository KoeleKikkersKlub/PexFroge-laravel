@extends("layout.app")

@section("extra-head")
@vite('resources/css/login.css')
@endsection

@section("content")

<div class="fuck shadow">
    <div class="triangle-element"> </div>
    <p class="login" id="login"> Register </p>
    <hr />
    <!-- this is placeholder for debugging -->
    @if(Auth::user())
    {{Auth::user()->email}}
    @endif
     <!--  -->
    <form action="{{ route('attemptRegister') }}" method="post" id="login-form">
        @csrf
        <div class="form-container">
    <label for="textfield-email"><i class="fas fa-envelope"></i> Email:</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror textfield-email shadow" id="email" name="email" value="{{ old('email') }}" oninput="checkEmailExists()">
    @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
<div id="password-field" class="form-container">
    <label for="textfield-password"><i class="fas fa-lock"></i> Password:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror textfield-password shadow" id="password" name="password">
    @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
<div class="form-container">
        <label for="password_confirmation"><i class="fas fa-lock"></i> Confirm Password:</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror textfield-password shadow" id="password_confirmation" name="password_confirmation">
        @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="spacer"></div>
        <div class="btn-doorgaan-container">
                <button type="submit" id="submit-button" class="doorgaan shadow">Doorgaan</button>
            </div>
        </div>
    </form>
</div>

@endsection
