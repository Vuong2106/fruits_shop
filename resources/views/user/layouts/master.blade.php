<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('page/assets/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('page/assets/css/main-color.css') }}">
    @yield('css')
</head>

<body>
    @include('user.layouts.header')
    @yield('content')
    @include('user.layouts.footer')
    {{-- @include('user.layouts.scripts') --}}
    <script src="{{ asset('page/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('page/assets/js/biolife.framework.js') }}"></script>
    <script src="{{ asset('page/assets/js/functions.js') }}"></script>
    @yield('js')
</body>

</html>
