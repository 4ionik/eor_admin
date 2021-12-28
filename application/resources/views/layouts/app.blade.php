<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
          type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" type="text/css">

    @stack('styles')
    <style>
        .wrimagecard{
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
            border: 2px solid #203478;
        }
        .wrimagecard .fa{
            position: relative;
            font-size: 70px;
        }
        .wrimagecard-topimage_header{
            padding: 5px;
        }
        a.wrimagecard:hover, .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
        }
        .wrimagecard-topimage a {
            width: 100%;
            height: 100%;
            display: block;
        }
        .wrimagecard-topimage_title {
            padding: 10px 15px;
            height: 80px;
            padding-bottom: 0.75rem;
            position: relative;
            overflow:auto;
            background-color: #EEEEEE;
        }
        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }

        @media (max-width: @screen-xs) {
            .wrimagecard-topimage_title{font-size: 10px;}
        }

        @media (max-width: @screen-sm) {
            .wrimagecard-topimage_title{font-size: 14px;}
        }
    </style>

</head>

<body>

@include('includes.navbar')
<div class="main-content" id="panel">
    @include('includes.header')
    @include('includes.page-header')
    <div class="container-fluid mt--6">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="https://use.fontawesome.com/5d66ce89aa.js"></script>
    @stack('scripts')
</body>
</html>
