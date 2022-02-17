<?php

use App\Shop\CompanyDetail\CompanyDetail;

$company_detail = CompanyDetail::first();
?>


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <style type="text/css">
        h2{
            color: #ffffff;
            padding: 10px 45px;
            font-family: 'Open Sans' !important;
        }
        h4{
            color: #ffffff;
            padding: 25px 45px;
            font-family: 'Open Sans' !important;
        }
        h4 i{
            font-weight: 700 !important;
            margin-left: 10px;
            /*font-family: 'Open Sans' !important;*/
        }

        .login-box, .register-box {
            width: 480px;
            margin: 1% auto !important;
        }
        h3{
            font-family: 'Open Sans' !important;
            text-align: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        p,input,button,a{
            font-family: 'Open Sans' !important;
        }

        .login-page, .register-page {
            background: transparent !important;
        }

        .login-box-body, .register-box-body {

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 20px 35px;
        }

        .login-logo, .register-logo {
            margin-bottom: 5px !important;
        }

        @media screen and (max-width: 768px){
            .response{
                display: none;
            }
        }
    </style>
</head>
<body class="hold-transition skin-purple login-page">
    <div class="container-fluid top-header" style="background-color: #4c96d7">
        <div class="row">
            <div class="col-sm-9">
                <h2>GV Mart Admin Panel</h2>
            </div>
            <div class="col-sm-3 response">
                <a href="{{ url('/') }}">
                    <h4>
                        <i class="fa fa-angle-left"></i> Back to home page
                    </h4>
                </a>
            </div>
        </div>        
    </div>
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('storage/'.$company_detail->company_logo ?? '') }}" style="height: 150px; width: auto;"></a>
        </div>

        <!-- /.login-logo -->
        @include('layouts.errors-and-messages')
        <div class="login-box-body">
            <h3>Admin Login</h3>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
                </div> -->
                <!-- /.social-auth-links -->

                <a href="{{ url('forgot_password') }}">I forgot my password</a><br>
                <!-- <a href="{{ url('/') }}" class="text-center">Register a new membership</a> -->

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <script src="{{ asset('js/admin.min.js') }}"></script>
    </body>
    </html>