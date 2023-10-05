@extends("app") 

@section("extra-head")
@vite('resources/css/login.css')
@endsection

@section("content")

<div class="fuck shadow">
    <div class="triangle-element"> </div>
    <p class="login" id="login"> Login </p>
    <hr />
    <!-- this is placeholder for debugging -->
    @if(Auth::user())
    {{Auth::user()->email}}
    @endif
     <!--  -->
    <form action="{{ route('attemptLogin') }}" method="post" id="login-form">
        @csrf
        <div class="form-container">
    <label for="textfield-email"><i class="fas fa-envelope"></i> Email:</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror textfield-email shadow" id="email" name="email" value="{{ old('email') }}" oninput="checkEmailExists()">
</div>
<div id="password-field" class="form-container" style="display: none">
    <label for="textfield-password"><i class="fas fa-lock"></i> Password:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror textfield-password shadow" id="password" name="password">
</div>
<div class="form-container" id="confirm-password-field" style="display: none;">
    <label for="textfield-confirm-password"><i class="fas fa-lock"></i> Confirm Password:</label>
    <input type="password" class="form-control textfield-password shadow" id="confirm-password" name="confirm_password">
</div>

        <div class="spacer"></div>
        <div class="btn-doorgaan-container">
            <div class="spinner-wrapper">
                <div class="spinner" id="spinner"></div>
                <button type="submit" id="submit-button" class="doorgaan shadow">Doorgaan</button>
            </div>
        </div>
    </form>
</div>

<script>
    // function to switch between register and login layouts depending on user's input
function togglePasswordFields(loginMode) {
    const passwordField = document.getElementById('password-field');
    const confirmPasswordField = document.getElementById('confirm-password-field');
    const login = document.getElementById('login');

    if (loginMode === 'login') {
        passwordField.style.display = 'block';
        confirmPasswordField.style.display = 'none';
        login.innerHTML = 'Login';
    } else if (loginMode === 'register') {
        passwordField.style.display = 'block';
        confirmPasswordField.style.display = 'block';
        login.innerHTML = 'Register';
    }
}

// Validate the confirm password field if registering
function validateForm() {
    const loginMode = (document.getElementById('login').innerHTML === 'Login');
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (!loginMode && password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}
 // it does exactly what the function name is, runs thru the db for the email and disables input during this.
 // also toggles login/register fields depending on if it found an email or not
function checkEmailExists() {
    clearTimeout(timeoutId);
    const login = document.getElementById('login');
    const email = document.getElementById('email').value;
    const passwordField = document.getElementById('password-field');
    const confirmPasswordField = document.getElementById('confirm-password-field');
    const spinner = document.getElementById('spinner');
    const submitButton = document.getElementById('submit-button');
    const loginForm = document.getElementById('login-form');

    passwordField.classList.add('disabled');
    confirmPasswordField.classList.add('disabled');
    submitButton.classList.add('disabled');
    spinner.style.display = 'block';

    timeoutId = setTimeout(function () {
        axios.post('{{ route('checkEmail') }}', { email: email })
            .then(function (response) {
                if (response.data.exists) {
                    togglePasswordFields('login');
                } else {
                    togglePasswordFields('register');
                }
            })
            .catch(function (error) {
                console.error(error);
            })
            .finally(function () {
                passwordField.classList.remove('disabled');
                confirmPasswordField.classList.remove('disabled');
                submitButton.classList.remove('disabled');
                spinner.style.display = 'none';
            });
    }, 1000); // 2000 milliseconds (2 seconds)
}

// Attach the togglePasswordFields function to the email input's oninput event
document.getElementById('email').addEventListener('input', function () {
    checkEmailExists();
    togglePasswordFields('login'); // During email check, display the login layout.
});

// Attach the validateForm function to the form's onsubmit event
document.querySelector('form').addEventListener('submit', validateForm);

let timeoutId; // Variable to store the timeout ID

</script>


@endsection
