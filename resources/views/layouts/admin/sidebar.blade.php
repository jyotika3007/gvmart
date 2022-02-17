<?php
    $shop = "";
    if($admin->user_role=='vendor'){
        $shop = DB::table('registered_shops')->where('user_id',$admin->id)->first();
    }

                $company = DB::table('company_details')->first();

// var_dump($admin); die;

?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('storage/logos/user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

<style type="text/css">
    .side-menu, .side-menu:hover{
        background-color: #333752 !important; 
        margin-bottom: 5px;
    }


</style>

            <!-- For Home -->
            <!-- <li class="header">DASHBOARD</li> -->
            <li><a href="{{ route('admin.dashboard') }}" class="side-menu"> <i class="fa fa-dashboard"></i> Dashboard</a></li>



            <!-- For Catalogs -->
<li class="treeview @if(request()->segment(2) == 'brands' || request()->segment(2) == 'pincodes' || request()->segment(2) == 'location' || request()->segment(2) == 'categories' || request()->segment(2) == 'products' || request()->segment(2) == 'products_reviews' || request()->segment(2) == 'shop_categories' || request()->segment(2) == 'registered_shops' || request()->segment(2) == 'vendor_products' || request()->segment(2) == 'inactive_products') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-th-large"></i> <span>Catalogs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     @if($admin->user_role!='vendor')
                    <li><a href="{{ route('admin.shop_categories.index') }}"> <i class="fa fa-circle-o"></i> Manage Shop Categories</a></li>
                    <li><a href="{{ route('admin.registered_shops.index') }}"> <i class="fa fa-circle-o"></i> Manage Shops</a></li>
            <li><a href="{{ route('admin.brands.index') }}"> <i class="fa fa-circle-o"></i> Manage Brands</a></li>
           
            <li><a href="{{ route('admin.pincodes.index' )}}"> <i class="fa fa-circle-o"></i> Manage Pincode</a></li>
            <li><a href="{{ route('admin.locations.index') }}"> <i class="fa fa-circle-o"></i> Manage Location</a></li>
            
            <li><a href="{{ route('admin.categories.index') }}"> <i class="fa fa-circle-o"></i> Manage Categories</a></li>
            @endif
            <li><a href="{{ route('admin.products.index') }}"> <i class="fa fa-circle-o"></i> Manage Products</a></li>
             @if($admin->user_role!='vendor')
            <li><a href="{{ url('admin/inactive_products') }}"> <i class="fa fa-circle-o"></i> Inactive Products</a></li>
            @endif
            <li><a href="{{ url('admin/out_stock_products') }}"> <i class="fa fa-circle-o"></i> Out Stock Products</a></li>
             
            <li><a href="{{ url('admin/dump_data') }}"> <i class="fa fa-circle-o"></i> Products Excel</a></li>
            
            @if($admin->user_role!='vendor')
            <li><a href="{{ url('admin/product_reviews') }}"> <i class="fa fa-circle-o"></i> Manage Products Reviews</a></li>
            <li><a href="{{ url('admin/vendor_products') }}"> <i class="fa fa-circle-o"></i> New Vendors Products </a></li>
            @endif
                </ul>
            </li>




            <!-- For Sales -->
<li class="treeview @if(request()->segment(2) == 'orders') active @endif">
                <a href="#" class="side-menu">
                    <i class="  fa fa-ambulance"></i> <span>Sales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.orders.index') }}"> <i class="fa fa-circle-o"></i> Orders</a></li>
                    <li><a href="{{ url('admin/pending_payments') }}"> <i class="fa fa-circle-o"></i>Pending Online Payments</a></li>
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
                    <li><a href="{{ route('admin.inventories.index') }}"> <i class="fa fa-circle-o"></i> Manage Inventory</a></li>
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
                    <li><a href="{{ url('admin/report/sales_report') }}"> <i class="fa fa-circle-o"></i> View Sales Report</a></li>
            <li><a href="{{ url('admin/report/daily_product_sale') }}"> <i class="fa fa-circle-o"></i> Manage Products Report</a></li>
            <li><a href="{{ url('admin/report/booked_product_sale') }}"> <i class="fa fa-circle-o"></i> Booked Products Report</a></li>
            
                </ul>
            </li>





            <!-- For Customers -->
<li class="treeview @if(request()->segment(2) == 'customers' || request()->segment(2) == 'complaints') active @endif">
                <a href="#" class="side-menu">
                    <i class="fa fa-user"></i> <span>Customers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.customers.index') }}"> <i class="fa fa-circle-o"></i> Manage Customers</a></li>
                     @if($admin->user_role!='vendor')
                    <li><a href="{{ route('admin.complaints.index') }}"> <i class="fa fa-circle-o"></i> Manage Feedback</a></li>
                    <li><a href="{{ url('admin/wishlist/index') }}"> <i class="fa fa-circle-o"></i> Manage Wishlist</a></li>
                    <li><a href="{{ url('admin/newsletters/index') }}"> <i class="fa fa-circle-o"></i> Newsletter Subscribers</a></li>
                    <li><a href="{{ url('admin/newsletter_posts/index') }}"> <i class="fa fa-circle-o"></i> Newsletter Posts</a></li>
                    @endif
            
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
                    <!-- <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-circle-o"></i> Manage Category Discount</a></li> -->
            <li><a href="{{ route('admin.promocodes.index') }}"> <i class="fa fa-circle-o"></i> Manage Promocode</a></li>
            
                </ul>
            </li>
            @endif



<!-- For Online Transactions -->
<li><a href="{{ route('admin.online_transactions') }}" class="side-menu"> <i class="fa fa-money"></i> Online Transcations</a></li>
            
 
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
                    <li><a href="{{ route('admin.sliders.index') }}"> <i class="fa fa-circle-o"></i>Manage Sliders</a></li>
            <li><a href="{{ route('admin.banners.index') }}"> <i class="fa fa-circle-o"></i> Manage Banners</a></li>
            <li><a href="{{ route('admin.testimonials.index') }}"> <i class="fa fa-circle-o"></i> Manage Testimonial</a></li>
            <li><a href="{{ route('admin.cms.index') }}"> <i class="fa fa-circle-o"></i> Manage CMS</a></li>
            <li><a href="{{ route('admin.company_detail.edit',$company->id) }}"> <i class="fa fa-circle-o"></i> Manage Company Details</a></li>
                    
            
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
                    
            <li><a href="{{ route('admin.subadmins.index') }}"> <i class="fa fa-circle-o"></i>Manage Sub Admin</a></li>

            <li><a href="{{ route('admin.roles.index') }}"> <i class="fa fa-circle-o"></i>Manage Employee Role</a></li>
            <li><a href="{{ route('admin.employees.index') }}"> <i class="fa fa-circle-o"></i>Manage Employees</a></li>
            
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
                    
            <li><a href="{{ url('admin/upload_products') }}"> <i class="fa fa-circle-o"></i>Products</a></li>

            
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
                    
            <li><a href="{{ url('admin/user/'.$user->id.'/edit') }}"> <i class="fa fa-circle-o"></i> Profile</a></li>
            
                            </ul>
            </li>






     
        
    </ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== 