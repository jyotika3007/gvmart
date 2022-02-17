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
  <h1>Account</h1>
  <a href="{{ url('/') }}" title="Back to the frontpage">Home</a>
  <span aria-hidden="true" class="breadcrumb__sep">/</span>
  <span>Account</span>
</nav>

<div class="dt-sc-hr-invisible-large"></div>
<div class="wrapper">
  <div class="grid-uniform">
   <div class="grid__item">
    <div class="container-bg">
     <div class="container">
      <div class="grid">
       <div class="grid__item text-center">
        <div class="note form-success" id="ResetSuccess" style="display:none;">
         We've sent you an email with a link to update your password.
       </div>
       <div id="CustomerLoginForm">
         <form method="post" action="{{ route('login') }}" id="customer_login" accept-charset="UTF-8">
          <input type="hidden" name="form_type" value="customer_login"><input type="hidden" name="utf8" value="✓">
          {{ csrf_field() }}

          <div class="row">
           <label for="CustomerEmail" class="label--hidden">Email</label>
           <input type="email" name="email" id="CustomerEmail" placeholder="Email" autocorrect="off" autocapitalize="off" autofocus="">
         </div>

         <div class="row">
          <label for="CustomerPassword" class="label--hidden">Password</label>
          <input type="password" value="" name="password" id="CustomerPassword" placeholder="Password">
        </div>

        <p>
         <a href="#" onclick="showRecoverPasswordForm();return false;">Forgot your password?</a>
       </p>
       <p>
         <input type="submit" class="btn" value="Sign In">
       </p>

       <div class="row">
       <div class="row col-sm-4"></div>
       <div class="row col-sm-5">
                <p>- OR -</p>
                <ul class="social-logins">
                  <li>
                    <a href="#" class="btn btn-primary" id="facebook"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                  </li>
                  <li>
                     <a href="#" class="btn btn-danger " id="google"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
                  </li>
                </ul>
       </div>
       <div class="row col-sm-4"></div>
            </div>
       <p>
         <a href="{{ route('register') }}" id="customer_register_link">Create account</a>
       </p>
       <a href="{{ url('/') }}">Return to Store</a>
     </form>
   </div>
   <div id="RecoverPasswordForm" style="display: none;">
     <div class="section-header section-header--small">
      <h2 class="section-header__title">Reset your password</h2>
    </div>
    <p>We will send you an email to reset your password.</p>
    <form method="post" action="#" accept-charset="UTF-8">
      <input type="hidden" name="form_type" value="recover_customer_password"><input type="hidden" name="utf8" value="✓">
      <label for="RecoverEmail" class="label--hidden">Email</label>
      <input type="email" value="" name="email" id="RecoverEmail" placeholder="Email" autocorrect="off" autocapitalize="off">
      <p>
       <input type="submit" class="btn" value="Submit">
     </p>
     <a href="#" onclick="hideRecoverPasswordForm();return false;">Cancel</a>
   </form>
 </div>
</div>
</div>
<script>


 function showRecoverPasswordForm() {
   document.getElementById('RecoverPasswordForm').style.display = 'block';
   document.getElementById('CustomerLoginForm').style.display='none';
 }

 function hideRecoverPasswordForm() {
   document.getElementById('RecoverPasswordForm').style.display = 'none';
   document.getElementById('CustomerLoginForm').style.display = 'block';
 }


 if (window.location.hash == '#recover') { showRecoverPasswordForm() }

   
</script>
</div>
</div>
</div>
</div>
</div>
<div class="dt-sc-hr-invisible-large"></div>
</main>
@endsection