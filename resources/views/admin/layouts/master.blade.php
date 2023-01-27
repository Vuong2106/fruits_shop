<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adm/assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('adm/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('adm/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('adm/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('adm/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    @yield('css')
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    @include('admin.layouts.preloader')
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="content-page">
            <div class="content">
                @include('admin.layouts.header')
                @yield('content')
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    @include('admin.layouts.rightside')
    <script src="{{ asset('adm/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('adm/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('adm/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('adm/assets/js/pages/demo.dashboard.js') }}"></script>
    {{-- <script src="{{ asset('adm/assets/js/pages/demo.materialdesignicons.js') }}"></script> --}}
    <!-- end demo js-->
    @yield('js')
</body>

</html>
