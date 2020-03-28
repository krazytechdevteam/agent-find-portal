<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <!--<link rel="icon" href="favicon.ico">-->
       
        @stack('before-styles')

        <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('public/css/jQuery-plugin-progressbar.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('public/css/custom.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('public/css/sweetalert.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('public/css/frontend.css')}}" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @stack('after-styles')
        

    </head>
    <body>
        
        @include('sweet::alert')

        @if(session()->has('AUTH_USER'))
            @include('frontend.includes.header')
        @endif

        @yield('content')


        @stack('before-scripts')
        <script type="text/javascript" src="{{asset('public/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/jQuery-plugin-progressbar.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js')}}"></script>
        @stack('after-scripts')

        
       
    </body>

   
   
</html>
