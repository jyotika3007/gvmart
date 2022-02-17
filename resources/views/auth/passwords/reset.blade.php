@extends('layouts.front.app')

@section('content')


<!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('login') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Reset Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="page-content mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">

                <div class="col-sm-3"></div>

                <!-- <div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div> -->
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->

                    <form  class="form-horizontal" role="form" method="POST" action="" >
                                   
                                    {{ csrf_field() }}

                        <div class="login-form">
                            <h4 class="login-title">Reset Password</h4>

                            @include('layouts.errors-and-messages')



                            <div class="row">

                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="mb-0" name="email" value="{{ $user->email ?? '' }}" id="email" required autofocus readonly="readonly">

                                </div>


                                 <div class="col-md-12 col-12 mb-20">
                                    <label>New Password</label>
                                    <input id="password" type="password" class="mb-0" name="password" value="{{ old('password') }}" id="email" required autofocus>

                                </div>


                                 <div class="col-md-12 col-12 mb-20">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="mb-0" name="password_confirmation" value="" id="email" required autofocus>

                                </div>
                                
                               
                                <div class="col-md-12">
                                    <button typr="submit" class="register-button mt-0" style="width: auto;">Send Submit</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

               <div class="col-sm-3"></div>

                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30"></div>

            </div>
        </div>
    </div>





@endsection
