<?php
use App\Shop\Orders\Order;
use App\Shop\RegisteredShop\RegisteredShop;
use App\User;

$user = Auth::user();
$total_count = 0;
$count_orders = 0;
$count_registered_shops = 0;
if($user->user_role =='vendor'){

    $count_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.vendor_click',0)->count();
    $total_count = $count_orders;
$pending_orders = Order::JOIN('registered_shops','registered_shops.id','orders.user_id')->where('registered_shops.user_id',$user->id)->where('orders.order_status_id',1)->count();
}
else{
    $count_orders = Order::where('admin_click',0)->count();
    $count_registered_shops = RegisteredShop::where('admin_click',0)->count();
    $total_count = $count_orders+$count_registered_shops;
    $pending_orders = Order::where('order_status_id',1)->count();
}

$companyInfor = DB::table('company_details')->first();

?>

<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.dashboard')}}" class="logo">

        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ asset('storage/'.$companyInfor->company_logo ?? '') }}" style="height: 70px;"></span>
        <!-- <span class="logo-mini">{{ config('app.name') }}</span> -->

        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg">{{ config('app.name') }}</span> -->
        <span class="logo-lg"><img src="{{ asset('storage/'.$companyInfor->company_logo ?? '') }}" style="height: 70px;"></span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
               
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu" title="All Notificatons">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ $total_count }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$total_count}} notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @if($count_orders>0)
                                <li>
                                    <a href="{{ url('admin/notifications/orders') }}">
                                        <i class="fa fa-users text-aqua"></i> {{ $count_orders }} new orders are received
                                    </a>
                                </li>
                                @endif


                                @if($user->user_role == 'admin' &&  $count_registered_shops>0)
                                <li>
                                    <a href="{{ url('admin/notifications/shops') }}">
                                        <i class="fa fa-users text-aqua"></i> {{$count_registered_shops}} new shops are requested to connect with us                                   </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('admin/notifications/all') }}">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu"  title="Pending Orders">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">{{ $pending_orders }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ $pending_orders }} Orders</li>
                        <li class="footer"><a href="{{ url('admin/orderslist/pending_orders') }}">View all</a></li>
                       
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('storage/logos/user.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('storage/logos/user.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ $user->name }}
                                <small>Member since {{ date('m Y', strtotime($user->created_at)) }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                
                                <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                                
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>