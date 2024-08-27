<!DOCTYPE html>
<html lang="en">

</form>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
        }

        ::selection {
            background: #1a75ff;
            color: #fff;
        }

        .wrapper {
            overflow: hidden;
            max-width: 390px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .wrapper .title-text {
            display: flex;
            width: 200%;
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .title {
            width: 50%;
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .slide-controls {
            position: relative;
            display: flex;
            height: 50px;
            width: 100%;
            overflow: hidden;
            margin: 30px 0 10px 0;
            justify-content: space-between;
            border: 1px solid lightgrey;
            border-radius: 15px;
            background: #f0f0f0;
        }

        .slide-controls .slide {
            height: 100%;
            width: 100%;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 48px;
            cursor: pointer;
            z-index: 1;
            transition: color 0.3s ease;
        }

        .slide-controls label.signup {
            color: #000;
        }

        .slide-controls .slider-tab {
            position: absolute;
            height: 100%;
            width: 50%;
            left: 0;
            z-index: 0;
            border-radius: 15px;
            background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
            transition: left 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        input[type="radio"] {
            display: none;
        }

        #signup:checked~.slider-tab {
            left: 50%;
        }

        #signup:checked~label.signup {
            color: #fff;
            cursor: default;
            user-select: none;
        }

        #signup:checked~label.login {
            color: #000;
        }

        #login:checked~label.signup {
            color: #000;
        }

        #login:checked~label.login {
            cursor: default;
            user-select: none;
        }

        .wrapper .form-container {
            width: 100%;
            overflow: hidden;
        }

        .form-container .form-inner {
            display: flex;
            width: 200%;
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .form-container .form-inner form {
            width: 50%;
            transition: opacity 0.3s ease;
        }

        .form-inner form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
        }

        .form-inner form .field input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 15px;
            border-radius: 15px;
            border: 1px solid lightgrey;
            border-bottom-width: 2px;
            font-size: 17px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-inner form .field input:focus {
            border-color: #1a75ff;
            box-shadow: 0 0 5px rgba(26, 117, 255, 0.5);
        }

        .form-inner form .field input::placeholder {
            color: #999;
            transition: color 0.3s ease;
        }

        form .field input:focus::placeholder {
            color: #1a75ff;
        }

        .form-inner form .pass-link {
            margin-top: 5px;
        }

        .form-inner form .signup-link {
            text-align: center;
            margin-top: 30px;
        }

        .form-inner form .pass-link a,
        .form-inner form .signup-link a {
            color: #1a75ff;
            text-decoration: none;
        }

        .form-inner form .pass-link a:hover,
        .form-inner form .signup-link a:hover {
            text-decoration: underline;
        }

        form .btn {
            height: 50px;
            width: 100%;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        form .btn .btn-layer {
            height: 100%;
            width: 300%;
            position: absolute;
            left: -100%;
            background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
            border-radius: 15px;
            transition: left 0.4s ease;
        }

        form .btn:hover .btn-layer {
            left: 0;
            transform: scale(1.1);
        }

        form .btn input[type="submit"] {
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            background: none;
            border: none;
            color: #fff;
            padding-left: 0;
            border-radius: 15px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

             .btn input[type="submit"]:hover {
            transform: scale(1.05);
        }
    </style>
    <style>
        .alert-success {
            justify-content: center;
            /* Horizontal center */
            display: flex;
            /* Gunakan Flexbox untuk tata letak */
            align-items: center;
            /* Vertikal center */
            color: green;
            border: 1px solid green;
            padding: 10px;
            margin-bottom: 15px;

        }

        .alert-danger {
            color: red;
            border: 1px solid red;
            padding: 10px;
            margin-bottom: 15px;

        }
    </style>

</head>

<body>


    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login</div>
            <div class="title signup">Signup</div>
        </div>
        <br>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-inner">
                <!-- Login Form -->

                <form method="POST" action="{{ route('loginproses') }}" class="login-form">
                    @csrf
                    <div class="field">
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>
                    @error('email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="field">
                        <input type="password" id="login-password" name="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="col-8 d-inline-flex align-items-center">
                        <input type="checkbox" id="showLoginPassword">
                        <label for="showLoginPassword" class="ms-2">Show Password</label>
                    </div>

                    <div class="field btn">
                        <div class="btn-layer mb-3 mt-3 "></div>
                        <input type="submit" id="submitButton" value="Login">
                    </div>
                    {{-- <div class="signup-link">Not a member? <a href="#">Signup now</a></div> --}}
                </form>
                <form action="#" method="POST" id="signupForm" class="signup" id="">
                    @csrf
                    <div class="field">
                        <input type="text" name="FullName" placeholder="FullName" required>
                    </div>
                    @error('FullName')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="field">
                        <input type="text" name="Email" placeholder="Email" required>
                    </div>
                    @error('Email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="field">
                        <input type="password" id="signup-password" name="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="field">
                        <input type="password" id="signup-confirm-password" name="password_confirmation"
                            placeholder="Password Confirmation" required>
                    </div>
                    @error('password confirmation')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <div class="col-8 d-inline-flex align-items-center">
                        <input type="checkbox" id="showSignupPassword">
                        <label for="showSignupPassword" class="ms-2">Show Password</label>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" id="submitButton11" value="Signup">
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle show/hide password for signup and login forms
            const showLoginPassword = document.getElementById('showLoginPassword');
            const loginPassword = document.getElementById('login-password');
            const showSignupPassword = document.getElementById('showSignupPassword');
            const signupPassword = document.getElementById('signup-password');
            const signupConfirmPassword = document.getElementById('signup-confirm-password');

            if (showLoginPassword && loginPassword) {
                showLoginPassword.addEventListener('change', function() {
                    loginPassword.type = this.checked ? 'text' : 'password';
                });
            }

            if (showSignupPassword && signupPassword && signupConfirmPassword) {
                showSignupPassword.addEventListener('change', function() {
                    signupPassword.type = this.checked ? 'text' : 'password';
                    signupConfirmPassword.type = this.checked ? 'text' : 'password';
                });
            }

            // Handle form toggle between login and signup
            const loginText = document.querySelector(".title-text .login");
            const loginForm = document.querySelector("form.login-form");
            const loginBtn = document.querySelector("label.login");
            const signupBtn = document.querySelector("label.signup");

            if (signupBtn) {
                signupBtn.onclick = () => {
                    loginForm.style.marginLeft = "-50%";
                    loginText.style.marginLeft = "-50%";
                };
            }

            if (loginBtn) {
                loginBtn.onclick = () => {
                    loginForm.style.marginLeft = "0%";
                    loginText.style.marginLeft = "0%";
                };
            }

            // jQuery for handling form submission with AJAX
            $(document).ready(function() {
                $('#signupForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();
                    var submitButton = $('#submitButton11');
                    submitButton.prop('disabled', true);

                    $.ajax({
                        url: 'http://localhost/latihan6/api/register_proses',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            alert(response.status);
                        },
                        error: function(xhr) {
                            // Handle errors
                            var errors = xhr.responseJSON.errors;
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    alert(errors[key][0]);
                                }
                            }
                        },
                        complete: function() {
                            submitButton.prop('disabled', false);
                        }
                    });
                });
            });
        });
    </script>


</body>

</html>
