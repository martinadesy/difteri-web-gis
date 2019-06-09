<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ditferi">
    <meta name="author" content="Martina">
    <title>DiphRate</title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/')}}/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    {{--<link rel="stylesheet" href="{{asset('public/backend/')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">--}}
    <link rel="stylesheet" href="{{asset('public/')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('public/')}}/assets/css/argon.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/')}}/core/ajax.css" type="text/css">
    <style>

        @import url('https://fonts.googleapis.com/css?family=Ubuntu:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            /*background-image: url("public/assets/img/brand/new1.jpg");*/
            background: #0d2b3e;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Ubuntu';
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            font-size: 40px;
        }

        h2 {
            text-align: center;
            font-size: 25px;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #5e72e4;
            background-color: #5e72e4;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container{
            transform: translateX(-100%);
        }

        .overlay {
            background: #00C9FF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #00c6ff, #5e72e4);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #00c6ff, #5e72e4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }
    </style>
</head>

<body>
<!-- from the tutorial https://medium.freecodecamp.org/how-to-build-a-double-slider-sign-in-and-sign-up-form-6a5d03612a34 -->
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
            <h1>Create Account</h1>
            <br>
            <h2 style="color: #1d32aa">DiphRate</h2>
            {{--<div class="social-container">--}}
                {{--<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>--}}
                {{--<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>--}}
                {{--<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>--}}
            {{--</div>--}}
            <span>The Risk Rate of Diphtheria in East Java</span>
            <input type="text" placeholder="Name" />
            <input type="password" placeholder="Password" />
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form role="form" action="" onsubmit="return false" id="form-konten">
            <h1>Sign In</h1>
            <br>
            <h2 style="color: #1d32aa">DiphRate</h2>
            {{--<div class="social-container">--}}
                {{--<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>--}}
                {{--<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>--}}
                {{--<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>--}}
            {{--</div>--}}
            <span>The Risk Rate of Diphtheria in East Java</span>

            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <button type="submit">Sign In</button>

        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 style="color: white">Welcome back!</h1>
                <p>Please enter a username and password</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <div id="results"></div>
                <h1 style="color: white">Welcome!</h1>
                <br>
                <p >Please register if you don't have an account yet!</p>
                <br>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

{{--<div class="main-content">--}}
{{--<!-- Header -->--}}
{{--<div class="header bg-gradient-white py-6">--}}
{{--<div class="container">--}}
{{--<div class="header-body text-center mb-7">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-xl-5 col-lg-6 col-md-8 px-5">--}}
{{--<h1 class="text-white">--}}

{{--<img src="{{asset('public/backend/')}}/assets/img/brand/logo.png" class="img-responsive" width="400px">--}}
{{--</h1>--}}
{{--<!--  <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="separator separator-bottom separator-skew zindex-100">--}}
{{--<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
{{--<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>--}}
{{--</svg>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- Page content -->--}}
{{--<div class="container mt--8">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-lg-5 col-md-7">--}}
{{--<div class="card bg-secondary border-0 mb-0">--}}
{{--<div class="card-body px-lg-5 py-lg-5">--}}
{{--<div class="text-center text-muted mb-4">--}}
{{--<small>Silahkah Login Dibawah ini !</small>--}}
{{--<div id="results"></div>--}}
{{--</div>--}}
{{--<form role="form" action="" onsubmit="return false" id="form-konten">--}}
{{--<div class="form-group mb-3">--}}
{{--<div class="input-group input-group-merge input-group-alternative">--}}
{{--<div class="input-group-prepend">--}}
{{--<span class="input-group-text"><i class="ni ni-email-83"></i></span>--}}
{{--</div>--}}
{{--<input class="form-control" placeholder="Email" name="email" type="email" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<div class="input-group input-group-merge input-group-alternative">--}}
{{--<div class="input-group-prepend">--}}
{{--<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>--}}
{{--</div>--}}
{{--<input class="form-control" placeholder="Password" name="password" type="password" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="custom-control custom-control-alternative custom-checkbox">--}}
{{--<input class="custom-control-input" id=" customCheckLogin" type="checkbox">--}}
{{--<label class="custom-control-label" for=" customCheckLogin">--}}
{{--<span class="text-muted">Remember me</span>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="text-center">--}}
{{--<button type="submit" class="btn btn-success my-4">Login</button>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row mt-3">--}}
{{--<div class="col-6">--}}
{{--<a href="#" class="text-light" style="color: #fff;"><small style="color: #fff;">Forgot password?</small></a>--}}
{{--</div>--}}
{{--<div class="col-6 text-right">--}}
{{--<a href="#" class="text-light" style="color: #fff;"><small style="color: #fff">Create new account</small></a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- Footer -->--}}
{{--<footer class="py-5" id="footer-main">--}}
{{--<div class="container">--}}
{{--<div class="row align-items-center justify-content-xl-between">--}}
{{--<div class="col-xl-6">--}}
{{--<div class="copyright text-center text-xl-left text-muted">--}}
{{--&copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank" style="color: #fff;">Dinas Pertanian Kabupaten Ponorogo</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- <div class="col-xl-6">--}}
{{--<ul class="nav nav-footer justify-content-center justify-content-xl-end">--}}
{{--<li class="nav-item">--}}
{{--<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div> -->--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}
{{--<!-- Argon Scripts -->--}}
{{--<!-- Core -->--}}
<script src="{{asset('public/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
{{--<script src="{{asset('public/backend/')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="{{asset('public/backend/')}}/assets/vendor/js-cookie/js.cookie.js"></script>--}}
{{--<script src="{{asset('public/backend/')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>--}}
{{--<script src="{{asset('public/backend/')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>--}}
{{--<script src="{{asset('public/backend/')}}/assets/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>--}}
{{--<!-- Argon JS -->--}}
{{--<script src="{{asset('public/backend/')}}/assets/js/argon.min-v=1.0.0.js"></script>--}}
{{--<!-- Demo JS - remove this in your project -->--}}
{{--<script src="{{asset('public/backend/')}}/assets/js/demo.min.js"></script>--}}
<input type='hidden' name='_token' value='{{ csrf_token() }}'>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
<script src="{{asset('public/core/ajax.js')}}"></script>

<script type="text/javascript">
    $('#form-konten').submit(function () {
        var data = getFormData('form-konten');
        ajaxTransfer("{{url('/login')}}", data, '#results');
    });

    function redirectPage(){
        redirect(1000, '/backend');
    }
</script>
</body>

</html>