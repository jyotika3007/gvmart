@extends('layouts.front.app')

@section('content')
<style type="text/css">
  .social-logins{
    list-style-type: none;
  }
  .social-logins li{
    float: left;
    padding: 10px;
  }
  #facebook,#google{
    text-decoration: none;
  }
  #facebook:hover{
    background-color: #1f598a;
    color: #fff;
  }#google:hover{
    background-color: #982723;
    color: #fff;
  }
</style>
<main class="main-content">  

    <nav class="breadcrumb" aria-label="breadcrumbs">

      <h1>Create Account</h1>

      <a href="{{ url('/') }}" title="Back to the frontpage">Home</a>

      <span aria-hidden="true" class="breadcrumb__sep">/</span>
      <span>Create Account</span>


  </nav>
  <div class="dt-sc-hr-invisible-large"></div> 
  
  <div class="wrapper">

      <div class="grid-uniform">
        <div class="grid__item">  
          <div class="container-bg"> 
            <div class="container">
                <div class="grid">

                  <div class="grid__item small--text-center">


                    <div class="register-form">

                        <form method="post" action="{{ url('register') }}" id="registerCustomer">                            
                          {{ csrf_field() }}

                          <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="label--hidden">Name</label>
                              <input type="text" name="name" id="name" placeholder="Full Name" autocapitalize="words" autofocus="" required="required" value="{{ old('name') }}">
                              @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>

                          <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="Email" class="label--hidden">Email</label>
                              <input type="email" name="email" id="Email" placeholder="Email" autocorrect="off" autocapitalize="off" required="required">
                               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>

                          <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="CreatePassword" class="label--hidden">Password</label>
                              <input type="password" name="password" id="CreatePassword" placeholder="Password" required="required">
                               @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>

                          <div class="row">
                              <label for="ConfirmPassword" class="label--hidden">Confirm Password</label>
                              <input type="password" name="password_confirmation" id="ConfirmPassword" placeholder="Confirm Password" required="required">
                          </div>

                          <p>
                            <input type="button" value="Create" class="btn" onclick="postRegister()">
                        </p>

                         <div class="row">
       <div class="row col-sm-4"></div>
       <div class="row col-sm-5">
                <p>- OR -</p>
                <ul class="social-logins">
                  <li>
                    <a href="#" class="btn btn-primary" id="facebook"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                  </li>
                  <li>
                     <a href="#" class="btn btn-danger " id="google"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
                  </li>
                </ul>
       </div>
       <div class="row col-sm-4"></div>
            </div>
                        <p>
                           Already have an account?                        <a href="{{ route('login') }}" id="customer_register_link">Click Here</a>
                       </p>
                       <a href="{{ url('/') }}">Return to Store</a>

                   </form>

               </div>

           </div>
       </div>
   </div>                
</div>  
</div>
</div>


</div>


</main>

<script>
    function postRegister(){

    }

    function postRegister(){
      var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
        
          jQuery.ajax({
           url: '/register',
           type: 'POST',
           data: $('#registerCustomer').serialize(),
           success: function (data) {
            if(data == 'Yes'){
                Swal('Registration Successful');
                 setTimeout(function(){
            window.location.href = '/';       
          }, 3000);
            }
            else{
                Swal('Something Went Wrong');
            }
         },
         failure: function (data) {
           Swal('Something Went Wrong');
         }
       });
       
      }
</script>
@endsection
