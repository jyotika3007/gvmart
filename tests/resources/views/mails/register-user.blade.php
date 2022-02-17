<?php
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To {{ config('app.name') }}</title>
<style>
.box
{
        height: 63px;
    border: 1px solid #000;
    background: black;
    color: #fff;
    line-height: 32px;
    margin-left: 15%;
    margin-right: 15%;
    padding-left: 11%;
    border-radius: 10px
}
.small-box
{
    height: 29px;
    border: 1px solid #000;
    background: black;
    color: #fff;
    line-height: 28px;
    margin-left: 42%;
    margin-right: 15%;
    padding-left: 5%;
    border-radius: 10px;
    width: 44%;
}
.snapBox
{
        height: 100px;
    border: 1px solid #000;
    width: 45%;
}
</style>
</head>

<body>
<!-- <div width="512" style="text-align:center;">
    <a href="#">Can't see our images? Click here.</a>
</div> -->
<table align="center" border="0" cellspacing="0" cellpadding="0" width="512" style="border:1px solid #e8e8e8;">
    <tbody>
        <tr><td colspan="3" height="10"></td></tr>
        <tr>
            <td width="10"></td>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="490">
                    <tbody>
                        <tr>
                          <td colspan="3" height="70" align="center" style="background-color:#eeeeee">
                            <a href="{{ url('/') }}"> <img src="{{ asset('front/in%20hand%20city%20logo-10.png') }}" width="100" height="65"></a>
                          </td>
                        </tr>
                        <tr><td colspan="3" height="10"></td></tr>
                        <tr>
                            <td width="10"></td>
                            <td>
                                
                                <h2>Registration Successful</h2>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        @if($type=='admin')
                        <tr>
                            <td width="10"></td>
                            <td>
                            
                                <p> A new user have successfully registered at In Hand City having details  </p>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        <tr>
                            <td width="10"></td>
                            <td>
                              
                               <h3>Name : {{$name ?? ''}}</h3>
                               <h4>Email : {{$email}} </h4>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        @else
                        <tr>
                            <td width="10"></td>
                            <td>
                            
                                <p>Congratulations {{$name}}, You have successfully registered at In Hand City. Your Login Details are </p>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        <tr>
                            <td width="10"></td>
                            <td>
                              
                               <h3>Email : {{$email}}</h3>
                               <h4>Password : {{$password}} </h4>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        @endif
                        <tr><td colspan="3" height="10"></td></tr>
                        <tr><td colspan="3" height="30" style="background-color:#e06f47;"></td></tr>
                    </tbody>
                </table>
            </td>
            <td width="10"></td>
        </tr>
        <tr><td colspan="3" height="10"></td></tr>
    </tbody>
</table>
</body>
</html>
