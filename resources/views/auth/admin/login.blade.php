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
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #ffffff;
            padding: 10px 45px;
            font-family: 'Open Sans' !important;
        }

        h4 {
            color: #ffffff;
            padding: 25px 45px;
            font-family: 'Open Sans' !important;
        }

        h4 i {
            font-weight: 700 !important;
            margin-left: 10px;
            /*font-family: 'Open Sans' !important;*/
        }

        .login-box,
        .register-box {
            width: 480px;
            margin: 1% auto !important;
        }

        h3 {
            font-family: 'Open Sans' !important;
            text-align: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        p,
        input,
        button,
        a {
            font-family: 'Open Sans' !important;
        }

        .login-page,
        .register-page {
            background: transparent !important;
        }

        .login-box-body,
        .register-box-body {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 20px 35px;
            border-top: 5px solid #FFA000;
            border-radius: 5px;
        }

        .login-logo,
        .register-logo {
            margin-bottom: 5px !important;
        }

        @media screen and (max-width: 768px) {
            .response {
                display: none;
            }
        }

        .has-feedback .form-control {
            padding: 25px 15px 25px 50px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .form-control-feedback.fa {
    line-height: 34px;
    border-right: 1px solid #80808045;
}

.form-control-feedback {
    position: absolute;
    top: 10px;
    left: 0;
}

.form-control-vision{
    position: absolute;
    top: 8px;
    right: 0;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;
    cursor: pointer
}

.hidePass {
    display: block;
    cursor: pointer;
}
.showPass{
display: none;
cursor: pointer
}
    </style>
</head>

<body class="hold-transition skin-purple login-page">

    <div class="login-box">

        <!-- /.login-logo -->
        @include('layouts.errors-and-messages')
        <div class="login-box-body">
            <div class="login-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('storage/'.$company_detail->company_logo ?? '') }}" style="height: 150px; width: auto;"></a>
            </div>
            <h3>SIGN IN</h3>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group has-feedback">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                    <span class="fa fa-eye form-control-vision showPass"></span>
                    <span class="fa fa-eye-slash form-control-vision hidePass"></span>
                </div>
                <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-border">SIGN IN</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <br/>
                    <center><a href="{{ url('forgot_password') }}" class="primary-color">Forget Password ?</a></center>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script src="{{ asset('js/admin.min.js') }}"></script>
    <script>
        let i=0;
        $('.form-control-vision').on('click', function() {
            if(i%2==0){
                $('.hidePass').hide();
                $('.showPass').show();
                $('#password').attr('type','text');
            }
            else{
                $('.hidePass').show();
                $('.showPass').hide();
                $('#password').attr('type','password');
            }
        });
    </script>
</body>

</html>