<?php
$shop = "";
if ($admin->user_role == 'vendor') {
    $shop = DB::table('registered_shops')->where('user_id', $admin->id)->first();
}

$company = DB::table('company_details')->first();

// var_dump($admin); die;

?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar btn-primary">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('storage/logos/user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div> 
        </div> -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <style type="text/css">
                .side-menu,
                .side-menu:hover {

                    /* background-color: #2c2c2c !important; */
                    margin-top: 5px
                }
            </style>


            <!-- For Home -->
            <!-- <li class="header">DASHBOARD</li> -->
            <li><a href="{{ route('admin.dashboard') }}" class="side-menu @if(request()->segment(2) == 'dashboard' ) activeSideMenu @endif"> <i class="fa fa-home"></i> Dashboard</a></li>


            <!-- For Personnal -->
            
            <li class="treeview @if(request()->segment(2) == 'customers' || request()->segment(2) == 'complaints') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-user"></i> <span>Personnal</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.customers.create') }}"> Add User</a></li>
                    <li><a href="{{ route('admin.customers.index') }}"> Users List</a></li>
                    
                    <!-- <li><a href="{{ route('admin.complaints.index') }}"> Manage Feedback</a></li> -->
                    <!-- <li><a href="{{ url('admin/wishlist/index') }}"> Customers Wishlist</a></li> -->
                    <!-- <li><a href="{{ url('admin/newsletters/index') }}"> Newsletter Subscribers</a></li> -->
                    <!-- <li><a href="{{ url('admin/newsletter_posts/index') }}"> Newsletter Posts</a></li> -->
              

                </ul>
            </li>

            <!-- For Catalogs -->
            <li class="treeview @if(request()->segment(2) == 'brands' || request()->segment(2) == 'pincodes' || request()->segment(2) == 'location' || request()->segment(2) == 'categories' || request()->segment(2) == 'products' || request()->segment(2) == 'products_reviews' || request()->segment(2) == 'shop_categories' || request()->segment(2) == 'registered_shops' || request()->segment(2) == 'vendor_products' || request()->segment(2) == 'inactive_products') active @endif">
                <a href="#" class="side-menu ">
                    <i class="  fa fa-th-large"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ route('admin.products.create') }}"> Add Product</a></li>
                    <li><a href="{{ route('admin.products.index') }}"> Products List</a></li>
                    <li><a href="{{ url('admin/prelaunchProducts') }}"> Prelaunch Products List</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('admin.brands.index') }}"> Brands</a></li>
                    <li><a href="{{ route('admin.attributes.index') }}"> Attributes</a></li>
                    <li><a href="{{ url('admin/product_reviews') }}"> Reviews</a></li>
                  
<!-- 
                    <li><a href="{{ route('admin.shop_categories.index') }}"> Manage Vendor Categories</a></li>
                    <li><a href="{{ route('admin.registered_shops.index') }}"> Manage Vendors</a></li>

                    <li><a href="{{ route('admin.pincodes.index' )}}"> Manage Pincode</a></li>
                    <li><a href="{{ route('admin.locations.index') }}"> Manage Location</a></li>

                    <li><a href="{{ url('admin/inactive_products') }}"> Inactive Products</a></li> -->

                    <li><a href="{{ url('admin/out_stock_products') }}"> Out Stock Products</a></li>

                    <!-- <li><a href="{{ url('admin/dump_data') }}"> Products Excel</a></li>

                    <li><a href="{{ url('admin/product_reviews') }}"> Manage Products Reviews</a></li>
                    <li><a href="{{ url('admin/vendor_products') }}"> New Vendors Products </a></li> -->

                </ul>
            </li>

            <!-- For Sales -->
            <li class="treeview @if(request()->segment(2) == 'apple_services') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Apple Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.apple_services.create') }}"> Add Apple Service</a></li>
                <li><a href="{{ route('admin.apple_services.index') }}"> Apple Service List</a></li>
                </ul>
            </li>

            <!-- For Sales -->
            <li class="treeview @if(request()->segment(2) == 'our_store') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Our Store</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.our_store.create') }}"> Add Our Srore</a></li>
                <li><a href="{{ route('admin.our_store.index') }}"> Our  Store List</a></li>
                </ul>
            </li>

            <!-- For Sales -->
            <li class="treeview @if(request()->segment(2) == 'orders') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.orders.index') }}"> All Orders</a></li>
                    <li><a href="{{ url('admin/pending_payments?type=store') }}"> Pending Store Orders</a></li>
                    <li><a href="{{ url('admin/pending_payments?type=online') }}"> Pending Online Orders</a></li>
                    <li><a href="{{ url('admin/completed_payments') }}"> Completed Orders</a></li>
                </ul>
            </li>

            <!-- For Request -->
            <li class="treeview @if(request()->segment(2) == 'orders') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Request</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.orders.order_request','cancel') }}"> Cancel Requests</a></li>
                    <li><a href="{{ route('admin.orders.order_request','return') }}"> Return Requests</a></li>
                    <li><a href="{{ route('admin.orders.order_request','approved') }}"> Approved Requests</a></li>
                    <li><a href="{{ route('admin.orders.order_request','rejected') }}"> Rejected Requests</a></li>
                </ul>
            </li>

            <!-- For Sales -->
            <li class="treeview @if(request()->segment(2) == 'inventories') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Inventory</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.inventories.index') }}"> Manage Inventory</a></li>
                </ul>
            </li>

            <!-- For Sales Report -->
            <li class="treeview @if(request()->segment(2) == 'sales_report' || request()->segment(2) == 'products_report') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-money"></i> <span>Sales Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/report/sales_report') }}"> View Sales Report</a></li>
                    <li><a href="{{ url('admin/report/daily_product_sale') }}"> Manage Products Report</a></li>
                    <li><a href="{{ url('admin/report/booked_product_sale') }}"> Booked Products Report</a></li>

                </ul>
            </li>

            @if($admin->user_role!='vendor')
            <!-- For Customers -->
            <li class="treeview @if(request()->segment(2) == 'sliders') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-thumbs-up"></i> <span>Manage Promocode</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- <li><a href="{{ route('admin.dashboard') }}">  Manage Category Discount</a></li> -->
                    <li><a href="{{ route('admin.promocodes.index') }}"> Manage Promocode</a></li>

                </ul>
            </li>
            @endif

            <!-- For Online Transactions -->
            <!-- <li><a href="{{ route('admin.online_transactions') }}" class="side-menu"> <i class="fa fa-money"></i> Online Transcations</a></li> -->


 <!-- For Request -->
 <li class="treeview @if(request()->segment(2) == 'orders') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Policies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.policies') }}"> Policies List</a></li>
                    <li><a href="{{ route('admin.policies.create') }}"> Add Policy</a></li>
                </ul>
            </li>

            <!-- For Settings -->

            @if($admin->user_role!='vendor')

            <li class="treeview @if(request()->segment(2) == 'sliders' || request()->segment(2) == 'banners' || request()->segment(2) == 'testimonials' || request()->segment(2) == 'cms' || request()->segment(2) == 'company_detail' || request()->segment(2) == 'subadmins') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-tv"></i> <span>Website</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.sliders.index') }}"> Manage Sliders</a></li>
                    <li><a href="{{ route('admin.banners.index') }}"> Manage Offer Banners</a></li>
                    <li><a href="{{ route('admin.testimonials.index') }}"> Manage Testimonial</a></li>
                    <li><a href="{{ route('admin.cms.index') }}"> Manage CMS</a></li>
                    <li><a href="{{ route('admin.company_detail.edit',$company->id) }}"> Manage Company Details</a></li>


                </ul>
            </li>

            @endif



            @if($admin->user_role!='vendor')
            <!-- For Settings -->
            <li class="treeview @if(request()->segment(2) == 'employees' ||  request()->segment(2) == 'roles' || request()->segment(2) == 'subadmins') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-cog"></i> <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ route('admin.subadmins.index') }}"> Manage Sub Admin</a></li>

                    <li><a href="{{ route('admin.roles.index') }}"> Manage Employee Role</a></li>
                    <li><a href="{{ route('admin.employees.index') }}"> Manage Employees</a></li>

                </ul>
            </li>

            @endif


            <!--    @if($admin->user_role!='vendor')
            
 <li class="treeview @if(request()->segment(2) == 'employees' ||  request()->segment(2) == 'roles' || request()->segment(2) == 'subadmins') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-cog"></i> <span>Import Excel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
            <li><a href="{{ url('admin/upload_products') }}"> Products</a></li>

            
                            </ul>
            </li>

            @endif
 -->


            <!-- For Settings -->
            <li class="treeview @if(request()->segment(2) == 'sliders') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ url('admin/user/'.$user->id.'/edit') }}"> Profile</a></li>

                </ul>
            </li>








        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== 