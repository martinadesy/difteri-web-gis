<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ditferi">
    <meta name="author" content="Martina">
    <title>DiphRate</title>
    <link rel="icon" href="{{asset('public/')}}/assets/img/brand/toplgo.png" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html {
            color: #4672f6;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
        }
        .full-height {
            height: 75vh;
        }
        .flex-center {
            align-items: left;
            display: flex;
            justify-content: left;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 55px;
            color: rgba(255, 255, 255, 0.8);
        }
        .links > a {
            color: rgba(200, 200, 200, 1);
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links > a:hover {
            color: white;
            text-shadow: 0px 0px 5px rgba(255, 255, 255, 1);
        }
        .links-top > a {
            color: rgba(0, 0, 0, 1);
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links-top > a:hover {
            color: white;
            text-shadow: 0px 0px 20px rgba(0, 0, 0, 1), 0px 0px 20px rgba(0, 0, 0, 1);
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        body {
            margin-top: 150px;
            margin-left: 100px;
            background-image: url("public/assets/img/welcomepage1.png");
            background-size: cover;
            background-position: center bottom;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        @font-face {
            font-family: Bladog;
            src: url("{{ asset("fonts/Bladog.otf") }}");
        }
        @font-face {
            font-family: Title;
            {{--src: url("{{asset("fonts/Ubuntu-B.ttf")}}");--}}
        }
        .title-shadow {
            text-shadow: 0px 0px 30px royalblue;
        }
        .boxed {
            width: auto;
            height: auto;
            padding: 15px;
            background-color: #4672f6;
            box-shadow: 0px 0px 100px;

        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right">

    </div>


    <div class="content">
        <div class="title m-b-md title-shadow" style="font-family: Title; padding: 70px 5px 5px 5px;">
            DiphRate
        </div>
        <h4 style="color: #3c4d69">Spatial Analysis of the Risk Rate of Diphtheria disease</h4>
        <div class="boxed">
            <div class="links">
                <a href="{{ url("/index") }}">See the report</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>