<?php
   
    // var_dump(Auth::user()); die;
    if(!Auth::user()){
        echo "<h1 style='text-align: center; margin-top: 200px'>Please Login first</h1><br> <h4 style='text-align: center; margin-top: 0px'><a href='/admin/login'>Click to Login</a></h4>"; die;
    }

    $admin = Auth::user();
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@if(!empty($admin)){{ ucfirst($admin->user_role ) }}@else{{ 'Adminstrator' }}@endif - {{ config('app.name') }}</title>

    <link rel="icon" sizes="57x57" href="{{ asset('favicons/favicon.png')}}">
    
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    @yield('css')
 

    <style type="text/css">
         /* label {
        width: 30%;
    } */
    input[type="radio"]{
        margin-left: 10%
    }
    </style>

        <meta name="_t" content="{{ csrf_token() }}" />
        
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/favicon.png')}}">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<!-- Site wrapper -->
<div class="wrapper">
    @include('layouts.admin.header', ['user' => $admin])

    @include('layouts.admin.sidebar', ['user' => $admin])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin.footer')

    @include('layouts.admin.control-sidebar')
</div>
<!-- ./wrapper -->

<script src="{{ asset('js/admin.min.js') }}"></script>
<script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
<script src="{{ asset('js/scripts.js?v=0.2') }}"></script>
    @include('layouts.admin.scripts')
@yield('js')
</body>
</html>
