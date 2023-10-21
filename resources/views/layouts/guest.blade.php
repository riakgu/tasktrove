<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TaskTrove - {{ $title }}</title>

    <link rel="shortcut icon" href="assets/images/svg/favicon.svg" type="image/x-icon" />

    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/app-dark.css" />
    <link rel="stylesheet" href="assets/css/auth.css" />

    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css" />

</head>

<body>
<script src="assets/js/initTheme.js"></script>
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">

            <div id="auth-left">
                <h1 class="auth-title mt-5">Login.</h1>
                <p class="auth-subtitle mb-5">
                    Log in with your data that you entered during registration.
                </p>
                <!-- @error('email')
                <div class="alert alert-danger mb-5">
{{ $message }}
                </div>
@enderror -->
                <form action="dashboard.html" method="post" class="form">


                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email" name="email"
                               value="" required />
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password"
                               value="" required />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">
                        Login
                    </button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Don't have an account?
                        <a href="register.html" class="font-bold">Register</a>.
                    </p>
                </div>
            </div>

        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>

<script src="assets/js/dark.js"></script>
<script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="assets/js/app.js"></script>

<script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/sweetalert2.js"></script>

</body>

</html>
