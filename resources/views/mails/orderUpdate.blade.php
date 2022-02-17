<?php
   $companyInfor = DB::table('company_details')->first();
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
                            <a href="{{ url('/') }}"> <img src="{{ asset('storage/'.$companyInfor->company_logo ?? '') }}" width="auto" height="65"></a>
                          </td>
                        </tr>
                        <tr><td colspan="3" height="10"></td></tr>
                        <tr>
                            <td width="10"></td>
                            <td>

                                <h2>{{ $msg ?? '' }}</h2>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        @if($type == 'admin')
                        <tr>
                            <td width="10"></td>

                            <td>
                            @if($order_status == 2)
                                <p>Order has been approved successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <br>
                            @endif
                               
                            @if($order_status == 3)
                                <p>Order is under processing having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                            @endif
                                    
                            @if($order_status == 4)
                                <p>Order id ready to ship having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                            @endif
                            
                            @if($order_status == 5)
                                <p>Congratulations, an order has been delivered successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <br>
                            @endif
                            
                            @if($order_status == 6)
                                <p>Order cancelled successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                            @endif

                            @if($order_status == 7)
                                <p>Order returned successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                            @endif
                            </td>
                            <td width="10"></td>
                        </tr>
                        @else
                        <tr>
                            <td width="10"></td>
                            <td>

                                @if($order_status == 2)
                                <p>Hi {{$customer->name ?? 'User'}}, Your order has been approved successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                                <br>
                            @endif
                               
                            @if($order_status == 3)
                                <p>Hi {{$customer->name ?? 'User'}}, Your order is under processing having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                            @endif
                                    
                            @if($order_status == 4)
                                <p>Hi {{$customer->name ?? 'User'}}, Your order is ready to ship having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                            @endif
                            
                            @if($order_status == 5)
                               <p>Congratulations {{$customer->name ?? 'User'}}, Your order has been delivered successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                            @endif
                            
                            @if($order_status == 6)
                                <p>Hi {{$customer->name ?? 'User'}}, Your order has been cancelled successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                            @endif

                            @if($order_status == 7)
                                <p>Hii {{$customer->name ?? 'User'}}, Your order has been returned successfully having <i><b>Invoice ID - GVM/{{ date('Y',strtotime($order->created_at)) }}/#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</b></i> </p>
                                <p>Thank you for shopping at GV Mart.</p>
                            @endif

                                
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
