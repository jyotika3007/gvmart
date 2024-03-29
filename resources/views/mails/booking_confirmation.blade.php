
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
                            <a href="{{ url('/') }}"> <img src="https://admin.iadvance.in/storage/logos/1685348917logo.png" width="auto" height="65"></a>
                          </td>
                        </tr>
                        <tr><td colspan="3" height="10"></td></tr>
                        <tr>
                            <td width="10"></td>
                            <td>
                                
                                <h2>Booking Confirmed</h2>
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                       
                        
                        <tr>
                            <td width="10"></td>
                            <td>
                            
                            <p>Your Service booking has been confirmed.</p>
                            
                                <p><b>Booking ID : </b> {{ $data->id ?? '' }}</p>
                                <p><b>Booking Date : </b> {{ $data->booking_date ?? '' }}</p>
                                <p><b>Requirement : </b> {{ $data->requirement ?? '' }}</p>
                                
                                <br>
                            </td>
                            <td width="10"></td>
                        </tr>
                        <tr>
                            <td width="10"></td>
                            <td>
                              
                               
                               <p><b>Service Query : </b> {{ $data->customer_service_query ?? '' }} </p>
                               
                                <br>
                                
                                    
                              <h3><u>Shop Details</u> - </h3>
                               
                               <h4>Shop Name : {{$shop->shop_name ?? ''}}</h4>
                               <h4>Shop Owner : {{$shop->owner_name ?? ''}} </h4>
                               <h4>Email : {{$shop->email ?? ''}} </h4>
                               <h4>Address : {{$shop->address ?? ''}}, {{ $shop->city ?? ''}}, {{ $shop->state ?? '' }} - ({{ $shop->pincode ?? ''}}) </h4>
                               
                                <br>
                            </td>
                            </td>
                            <td width="10"></td>
                        </tr>
                     
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
