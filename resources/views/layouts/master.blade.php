<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="root" id="root" data-root="{{ route('index') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ $siteName }}| @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/theme-shop.css') }}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('front/vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/rs-plugin/css/navigation.css') }}">
    {{--<link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css">--}}

    <!-- Demo CSS -->

    <link rel="stylesheet" href="{{ asset('front/css/skins/skin-corporate-4.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    <style>
        #header .header-nav.header-nav-links:not(.header-nav-light-text) nav > ul > li > a, #header .header-nav.header-nav-line:not(.header-nav-light-text) nav > ul > li > a{
            color: #ffffff;
        }
        html #header .header-nav .header-nav-main nav > ul > li.dropdown-full-color.dropdown-light .dropdown-menu li:hover > a{
            background-color: #0b71e1;
            color:#ffffff;
        }
    </style>
</head>

<body>

<div id="app">
    <app-master></app-master>
</div>
<script  src="{{ asset('js/app.js') }}"></script>
<!-- Vendor -->
<script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('front/js/theme.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('front/js/theme.init.js') }}"></script>

</body>

</html>
