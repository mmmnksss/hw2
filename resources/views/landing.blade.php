<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ url('style/landing.css') }}">
    <script src="{{ url('scripts/landing.js') }}" defer></script>

    <title>Welcome</title>
</head>

<body>
    <h2>GIF It Up! - Homework 2 - Danilo Caruso</h2>
    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <form name="signup_form" method="post" action="{{ url('signup') }}">
                <h1>Welcome!</h1>
                <span>Let us know more about yourself</span>

                @csrf

                @if($err == 's_incomplete')
                <span class='error'>Please fill out the whole form</span>
                @elseif($err == 'f_name_invalid' || $err == 'l_name_invalid')
                <span class='error'>Invalid name(s)</span>
                @elseif($err == 'user_invalid')
                <span class='error'>Invalid username</span>
                @elseif($err == 'user_taken')
                <span class='error'>This username is already taken</span>
                @elseif($err == 'pass_invalid' || $err == 'pass_match')
                <span class='error'>Password invalid or doesn't match</span>
                @elseif($err == 'email_invalid')
                <span class='error'>Invalid email</span>
                @elseif($err == 'email_taken')
                <span class='error'>This email is already taken</span>
                @endif
                
                <div id="fullname">
                    <input name="firstname" type="text" placeholder="First name" value='{{ old("firstname") }}' required />
                    <input name="lastname" type="text" placeholder="Last name" value='{{ old("lastname") }}' required />
                </div>
                <div id="err_name" class="signup_error hidden">Invalid name(s) (16 characters max.)</div>

                <input name="email" type="email" placeholder="Email" required />
                <div id="err_email" class="signup_error hidden">Invalid email address</div>

                <input name="s_username" type="text" placeholder="Username" required />
                <div id="err_user" class="signup_error hidden">Invalid username (16 characters max.)</div>

                <div id="passwords">
                    <input name="s_password" type="password" placeholder="Password" required />
                    <input name="s_confirm_password" type="password" placeholder="Confirm password" required />
                </div>
                <div id="err_pass" class="signup_error hidden">Password is too weak: make it at least 8 characters</div>
                <div id="err_match" class="signup_error hidden">Passwords don't match</div>

                <input class="btn" type="submit" value="Sign up">
                <div id="err_final" class="signup_error hidden">Something's wrong; double check your credentials.</div>

            </form>
        </div>

        <div class="form-container sign-in-container">
            <form name='login_form' method='post' action="{{ url('login') }}">
                <h1>Welcome back!</h1>
                <span>Log in with your credentials</span>

                @csrf

                @if($err == 'l_incomplete')
                <span class='error'>Please fill both fields</span>
                @elseif($err == 'bad_credentials')
                <span class='error'>Incorrect username and/or password</span>
                @endif

                <input name="l_username" type="text" placeholder="Username" value='{{ old("l_username") }}'/>
                <input name="l_password" type="password" placeholder="Password" />
                <input class="btn" type="submit" value="Sign in">
                <div class="login_error hidden">Please fill out both fields.</div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already have an account?</h1>
                    <p>Switch to the log-in page.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Don't have an account?</h1>
                    <p>Create one right away!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>