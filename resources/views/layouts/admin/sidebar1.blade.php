<?php
    $shop = "";
    if($admin->user_role=='vendor'){
        $shop = DB::table('registered_shops')->where('user_id',$admin->id)->first();
    }


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
            <li class="header">HOME</li>
            <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Home</a></li>

            @if($admin->user_role!='vendor')

            <li class="header">Company</li>
            <li class="treeview @if(request()->segment(2) == 'company_detail') active @endif">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Company</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <?php
                $company = DB::table('company_details')->first();
                ?>
                <ul class="treeview-menu">
                    @if(!empty($company))
                    <li><a href="{{ route('admin.company_detail.edit',$company->id) }}"><i class="fa fa-circle-o"></i> Company Details</a></li>
                    @else
                    <li><a href="{{ route('admin.company_detail.create') }}"><i class="fa fa-circle-o"></i> Company Details</a></li>
                    @endif
                </ul>
            </li>

            @endif

            @if($admin->user_role!='vendor')
            <li class="header">SLIDERS</li>
            <li class="treeview @if(request()->segment(2) == 'sliders') active @endif">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Sliders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.sliders.index') }}"><i class="fa fa-circle-o"></i> List Sliders</a></li>
                    <li><a href="{{ route('admin.sliders.create') }}"><i class="fa fa-circle-o"></i> Create Slider</a></li>
                </ul>
            </li>
            @endif

            @if($admin->user_role!='vendor')
            <li class="header">SHOPS</li>
            <li class="treeview @if(request()->segment(2) == 'registered_shops') active @endif">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Shop</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.registered_shops.index') }}"><i class="fa fa-circle-o"></i> Registered Shops</a></li>
                    <li><a href="{{ route('admin.registered_shops.create') }}"><i class="fa fa-circle-o"></i> Add New Shop</a></li>
                    <li><a href="{{ route('admin.registered_shops.requested') }}"><i class="fa fa-circle-o"></i> Requested Shop</a></li>
                    <li><a href="{{ route('admin.registered_shops.banned') }}"><i class="fa fa-circle-o"></i> Banned Shop</a></li>
                    <li class="@if(request()->segment(2) == 'brands') active @endif">
                        <a href="#">
                            <i class="fa fa-tag"></i> <span>Shop Categories</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.shop_categories.index') }}"><i class="fa fa-circle-o"></i> List Categories</a></li>
                            <li><a href="{{ route('admin.shop_categories.create') }}"><i class="fa fa-plus"></i> Create Category</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if((!empty($shop) && $shop->category=='Product Based')  || $admin->user_role!='vendor')
            <li class="header">SELL</li>
            <li class="treeview @if(request()->segment(2) == 'products' || request()->segment(2) == 'attributes' || request()->segment(2) == 'brands' || request()->segment(2) == 'offers') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> List products</a></li>
                    <li><a href="{{ route('admin.products.create') }}"><i class="fa fa-plus"></i> Create product</a></li>
                    <!-- <li class="@if(request()->segment(2) == 'attributes') active @endif">
                        <a href="#">
                            <i class="fa fa-gear"></i> <span>Attributes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.attributes.index') }}"><i class="fa fa-circle-o"></i> List attributes</a></li>
                            <li><a href="{{ route('admin.attributes.create') }}"><i class="fa fa-plus"></i> Create attribute</a></li>
                        </ul>
                    </li> -->
                    <li class="@if(request()->segment(2) == 'brands') active @endif">
                        <a href="#">
                            <i class="fa fa-tag"></i> <span>Brands</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.brands.index') }}"><i class="fa fa-circle-o"></i> List brands</a></li>
                            <li><a href="{{ route('admin.brands.create') }}"><i class="fa fa-plus"></i> Create brand</a></li>
                        </ul>
                    </li>
                </ul>
            </li> 
            <li class="treeview @if(request()->segment(2) == 'categories') active @endif">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> List categories</a></li>
                    <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-plus"></i> Create category</a></li>
                </ul>
            </li>
            <!-- <li class="treeview @if(request()->segment(2) == 'customers' || request()->segment(2) == 'addresses') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Offers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.offers.index') }}"><i class="fa fa-circle-o"></i> List offers</a></li>

                    <li><a href="{{ route('admin.offers.create') }}"><i class="fa fa-plus"></i> Create offer</a></li>
                    
                
            </ul>
        </li> -->

         <li class="treeview @if(request()->segment(2) == 'customers' || request()->segment(2) == 'addresses') active @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Customers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.customers.index') }}"><i class="fa fa-circle-o"></i> List customers</a></li>

                     @if($admin->user_role!='vendor')
                   <!--  <li><a href="{{ route('admin.customers.create') }}"><i class="fa fa-plus"></i> Create customer</a></li>
                    <li class="@if(request()->segment(2) == 'addresses') active @endif">
                        <a href="#"><i class="fa fa-map-marker"></i> Addresses
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{ route('admin.addresses.index') }}"><i class="fa fa-circle-o"></i> List addresses</a></li>
                        <li><a href="{{ route('admin.addresses.create') }}"><i class="fa fa-plus"></i> Create address</a></li>
                    </ul>
                </li> -->
                @endif
                
            </ul>
        </li>

        <li class="header">ORDERS</li>
        <li class="treeview @if(request()->segment(2) == 'orders') active @endif">
            <a href="#">
                <i class="fa fa-money"></i> <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-circle-o"></i> List orders</a></li>
            </ul>
        </li>

       


        @endif
        @if($admin->user_role!='vendor')
        <li class="treeview @if(request()->segment(2) == 'order-statuses') active @endif">
            <a href="#">
                <i class="fa fa-anchor"></i> <span>Order Statuses</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.order-statuses.index') }}"><i class="fa fa-circle-o"></i> List order statuses</a></li>
                <li><a href="{{ route('admin.order-statuses.create') }}"><i class="fa fa-plus"></i> Create order status</a></li>
            </ul>
        </li>
        @endif

          <li class="header">Complaints</li>
        <li class="treeview @if(request()->segment(2) == 'complaints') active @endif">
            <a href="#">
                <i class="fa fa-file"></i> <span>Complaints</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.complaints.index') }}"><i class="fa fa-"></i> Customer complaints</a></li>
            </ul>
        </li>


 @if($admin->user_role!='vendor')

        <li class="header">BLOGS</li>

        <li class="treeview @if(request()->segment(2) == 'blogs') active @endif">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Blogs</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.blogs.index') }}"><i class="fa fa-circle-o"></i> List Blogs</a></li>
                <li><a href="{{ route('admin.blogs.create') }}"><i class="fa fa-circle-o"></i> Create Blog</a></li>
            </ul>
        </li>
        @endif

         @if($admin->user_role!='vendor')

        <li class="header">TESTIMONIALS</li>

        <li class="treeview @if(request()->segment(2) == 'testimonials') active @endif">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Testimonials</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.testimonials.index') }}"><i class="fa fa-circle-o"></i> List Testimonials</a></li>
                <li><a href="{{ route('admin.testimonials.create') }}"><i class="fa fa-circle-o"></i> Create Testimonial</a></li>
            </ul>
        </li>

        @endif



<!--         

@if((!empty($shop) && $shop->category=='Service Based') || $admin->user_role!='vendor')
        <li class="header">SERVICE BOOKINGS</li>
        <li class="treeview @if(request()->segment(2) == 'bookings') active @endif">
            <a href="#">
                <i class="fa fa-money"></i> <span>Bookings</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.bookings.index') }}"><i class="fa fa-circle-o"></i> List bookings</a></li>
            </ul>
        </li>
        @endif -->

 @if($admin->user_role=='vendor')
 <li class="header">SETTINGS</li>
        <li class="treeview @if(request()->segment(2) == 'settings') active @endif">
            <a href="#">
                <i class="fa fa-cog"></i> <span>Settings</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.registered_shops.edit', $shop->id) }}"><i class="fa fa-circle-o"></i> Profile</a></li>
            </ul>
        </li>
 @endif

 @if($admin->user_role!='vendor')        
        <!-- <li class="header">DELIVERY</li>
        <li class="treeview @if(request()->segment(2) == 'couriers') active @endif">
            <a href="#">
                <i class="fa fa-truck"></i> <span>Couriers</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.couriers.index') }}"><i class="fa fa-circle-o"></i> List couriers</a></li>
                <li><a href="{{ route('admin.couriers.create') }}"><i class="fa fa-plus"></i> Create courier</a></li>
            </ul>
        </li> -->

        <li class="header">CMS</li>
        <li class="treeview @if(request()->segment(2) == 'cms') active @endif">
            <a href="#">
                <i class="fa fa-edit"></i> <span>CMS</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.cms.index') }}"><i class="fa fa-circle-o"></i> Add Content</a></li>

            </ul>
        </li>

        @endif

        @if( $user->user_role!='vendor')
        <li class="header">CONFIG</li>
        <li class="treeview @if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') active @endif">
            <a href="#">
                <i class="fa fa-star"></i> <span>Subadmin</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.subadmins.index') }}"><i class="fa fa-circle-o"></i> List Subadmins</a></li>
                <li><a href="{{ route('admin.subadmins.create') }}"><i class="fa fa-plus"></i> Create Subadmin</a></li>
                <!-- 
                <li class="@if(request()->segment(2) == 'roles') active @endif">
                    <a href="#">
                        <i class="fa fa-star-o"></i> <span>Roles</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-circle-o"></i> List roles</a></li>
                    </ul>
                </li>

                <li class="@if(request()->segment(2) == 'permissions') active @endif">
                    <a href="#">
                        <i class="fa fa-star-o"></i> <span>Permissions</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-circle-o"></i> List permissions</a></li>
                    </ul>
                </li>
                 -->
            </ul>
        </li>
        
       <!--  <li class="treeview @if(request()->segment(2) == 'countries' || request()->segment(2) == 'provinces') active @endif">
            <a href="#">
                <i class="fa fa-flag"></i> <span>Countries</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.countries.index') }}"><i class="fa fa-circle-o"></i> List</a></li>
            </ul>
        </li> -->
        
        @endif
        
    </ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- ===============================================