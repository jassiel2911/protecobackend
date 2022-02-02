<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROTECO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/glider.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles3.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="shortcut icon" href="{{asset('img/icons/personales/logo.png')}}">



</head>
<body>
        @yield('content')

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/glider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
