<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// echo env('MAIL_ADMIN'); die;

Route::get('generate-pdf', 'Front\TestViewController@generatePDF');



Route::get('test', 'Front\TestViewController@getTestMail');

Route::get('/', 'Auth\LoginController@getlogin')->name('login');
Route::get('admin/login', 'Auth\LoginController@getlogin')->name('login');
Route::post('admin/login', 'Auth\LoginController@login')->name('admin.login');

Route::post('checkCustomerEmail', 'Front\AjaxController@checkCustomerEmail');
Route::post('sendEmailOtp', 'Front\AjaxController@sendEmailOtp');
Route::post('verifyOtp', 'Front\AjaxController@verifyOtp');


Route::get('forgot_password', 'Auth\ForgotPasswordController@forgot_password');
Route::post('reset_password', 'Auth\ForgotPasswordController@sendEmail');
Route::get('reset-password', 'Auth\ResetPasswordController@getResetPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@postResetPassword');


Route::namespace('Front')->group(function () {


    Route::get('customer/login', 'LoginController@getlogin');
    Route::post('customerLogin', 'LoginController@login');


    Route::post('selectPincode', 'TestViewController@selectPincode');
    Route::post('applyCoupon', 'TestViewController@applyCoupon');
    Route::post('getCouponDetail', 'TestViewController@getCouponDetail');
    Route::post('setDeliveryDate', 'TestViewController@setDeliveryDate');

    Route::get('remove_coupon', 'TestViewController@remove_coupon');


    Route::get('get-product_details-data/{id}', 'AjaxController@getProductDetailForQuickView');


    Route::get('order_status/{status}/{id}', 'TestViewController@changeOrderStatus');


    Route::get('blogDetail', 'TestViewController@blogDetail');


    Route::get('bill', 'TestViewController@bill');
    Route::get('faq', 'TestViewController@faq');
    Route::get('career', 'TestViewController@career');
    Route::get('connect_with_us', 'TestViewController@connectWithUs');
    Route::post('request_for_shop_registration', 'TestViewController@postShopRegistration');
    // Route::get('checkout', 'TestViewController@checkout');
    Route::get('dashboard', 'TestViewController@dashboard')->name('dashboard');

    Route::post('dashboard', 'TestViewController@updateAccount');
    Route::get('forgotPassword', 'TestViewController@forgotPassword');
    // Route::get('dashboard', 'TestViewController@myAddress')->name('myAddress');
    Route::get('myOrders', 'TestViewController@myOrders');
    Route::get('myOrder/{id}', 'CheckoutController@orderInvoice');
    Route::get('myBookings', 'TestViewController@myBookings');
    Route::get('myRewards', 'TestViewController@myRewards');
    Route::get('myWallet', 'TestViewController@myWallet');
    Route::get('myWishlist', 'TestViewController@myWishlist');
    Route::get('offers', 'TestViewController@offers');
    Route::get('orderPlaced', 'TestViewController@orderPlaced');
    Route::get('blogs', 'TestViewController@blogs');
    Route::get('policies', 'TestViewController@policies');
    Route::get('productDetail/{slug}', 'TestViewController@productDetail');
    Route::get('requestProduct', 'TestViewController@requestProduct');
    Route::get('products/{slug}', 'TestViewController@shopbyCategory');
    Route::get('brand/products/{slug}', 'TestViewController@shopbyBrand');
    Route::get('shop/{slug}', 'TestViewController@shopGrid');
    Route::get('shop-service/{slug}', 'TestViewController@shopService');
    Route::get('orderDetail/{id}', 'TestViewController@orderDetail');

    Route::get('customer/{id}/add_address', 'CustomerAddressController@addAddress');
    Route::post('customer/{id}/add_address', 'CustomerAddressController@store');

    Route::get('customer/edit_address/{id}', 'CustomerAddressController@editAddress');
    Route::post('customer/edit_address/{id}', 'CustomerAddressController@update');

    Route::post('service_query_submit', 'TestViewController@submitServiceQuery');


    Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('removeSession', 'CheckoutController@removeSession');
});


Route::namespace('Front')->group(function () {

    // Route::get('/', 'HomeController@old')->name('home');

    Route::group(['middleware' => ['auth', 'web']], function () {

        Route::namespace('Payments')->group(function () {
            Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
            Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
        });

        Route::namespace('Addresses')->group(function () {
            Route::resource('country.state', 'CountryStateController');
            Route::resource('state.city', 'StateCityController');
        });


        Route::get('accounts', 'AccountsController@index')->name('accounts');
        // Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
        Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
        Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
        Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
        Route::resource('customer.address', 'CustomerAddressController');
    });
    // Route::resource('cart', 'CartController');
    Route::get('wishlist', 'HomeController@getWishlist');
    Route::get('blog/{slug}', 'HomeController@getBlogDetail');
    Route::get('blogs', 'HomeController@getBlogs');
    Route::get('blogs/{tag}', 'HomeController@getTaggedBlogs');
    Route::post('blog-review/submitreview', 'HomeController@submitReview');
    Route::get('minicart', 'AjaxController@getMinicart');
    Route::post('add-to-wishlist', 'AjaxController@addToWishlist');
    Route::post('delete-wishlist-item', 'AjaxController@deleteWishlistItem');
    Route::post('remove-product', 'AjaxController@deleteSessionData');
    Route::post('update-cart', 'AjaxController@updateCart');
    Route::post('cart/delete-product/{id}', 'AjaxController@deleteSessionData');
    Route::post('postCheckout', 'CheckoutController@postCheckout');
    Route::post('delete-address', 'AjaxController@deleteAddress');

    Route::post('submit-product-review', 'ProductController@submitReview');
    Route::post('submit-newsletter', 'AjaxController@submitNewsletter');
    Route::post('contact-form-submit', 'AjaxController@submitContactForm');
    Route::post('getProductPrice', 'AjaxController@getProductPrice');

    Route::get('destroy-session', 'AjaxController@destroyCartSession');

    Route::get('user/invoice/{id}', 'AjaxController@getUserInvoice');


    Route::post('pay', 'PayController@pay');


    Route::get('payment-success', 'PayController@success');

    Route::get('contact_us', 'CmsController@getContact');

    Route::get('feedback', 'TestViewController@getFeedback');
    Route::post('feedback', 'AjaxController@submitFeedbackForm');

    Route::get('complaint', 'TestViewController@getComplaint');

    Route::get('about_us', 'CmsController@getAbout');
    Route::get('term_and_conditions', 'CmsController@getTNC');
    Route::get('privacy_policy', 'CmsController@getPrivacyPolicy');
    Route::get('return_policy', 'CmsController@getReturnPolicy');


    Route::get('cart', 'CartController@getCart');
    Route::post('add-to-cart', 'AjaxController@addTocart');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("searchedProducts", 'ProductController@search')->name('search.product');
    Route::get("product-detail/{product}", 'ProductController@show')->name('front.get.product');


    Route::get('search', 'AjaxController@getSearchResult');
    Route::post('sortBy', 'AjaxController@sortBy');


    Route::get('/redirect/{facebook}', 'SocialController@redirect');
    Route::get('/callback/{facebook}', 'SocialController@callback');


    Route::get('/redirect/{google}', 'SocialController@redirect');
    Route::get('/callback/{google}', 'SocialController@callback');
});


Route::namespace('Admin')->group(function () {
    //     Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    //     Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});











Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {



    Route::get('product_reviews', 'Admin\Products\ProductController@getReviews');
    Route::get('product_reviews/{id}', 'Admin\Products\ProductController@getReviewsDetail');
    Route::get('product_review/update_status/{id}', 'Admin\Products\ProductController@updateReviewsStatus');

    Route::namespace('Admin')->group(function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');

        Route::get('dump_data', 'Products\ProductController@getDump');

        Route::get('export_dump_data', 'Exports\ExportController@exportProductDump');

        Route::get('export_products', 'Exports\ExportController@export');

// print_r(1); die;



        Route::namespace('Attributes')->group(function () {
            Route::get('attribute-values/add/{attr_id}', 'AttributeValueController@create')->name('attribute-values.create');
            Route::post('attribute-values/store/{attr_id}', 'AttributeValueController@store')->name('attribute-values.store');
        });


        Route::namespace('Newsletters')->group(function () {

            Route::get('newsletters/index', 'NewsletterController@index');
            Route::get('newsleter/status/{id}/{status}', 'NewsletterController@update');

            Route::get('newsletter_posts/index', 'NewsletterPostController@index')->name('newsletter_posts.index');
            Route::get('newsletter_posts/create', 'NewsletterPostController@create');
            Route::post('newsletter_posts/store', 'NewsletterPostController@store');
            Route::get('newsletter_posts/{id}/edit', 'NewsletterPostController@edit');
            Route::post('newsletter_posts/{id}/update', 'NewsletterPostController@update');
            Route::get('newsletter_posts/{id}/send', 'NewsletterPostController@sendMail');
        });


        Route::namespace('Wishlists')->group(function () {

            Route::get('wishlist/index', 'WishlistController@index');
            Route::get('wishlist/{id}/show', 'WishlistController@show');
        });


        Route::namespace('Products')->group(function () {

            Route::get('updateProductBrand', 'ProductController@updateProductBrand');
            Route::get('variants/{product_id}', 'ProductController@variantsList');
            Route::get('colors/{product_id}', 'ProductController@colorsList');
            Route::get('colors/{product_id}/add', 'ProductController@addColorVariants');
            Route::get('colors/{product_id}/add-images/{color_id}', 'ProductController@addColorImages');
            Route::post('colors/{product_id}/store-image/{color_id}', 'ProductController@storeColorImages');
            Route::get('variants/{product_id}/add', 'ProductController@addVariants');
            Route::post('variants/{product_id}/store', 'ProductController@storeVariants');
            Route::post('colors/{product_id}/store', 'ProductController@storeColorVariants');
            Route::get('getSkuCode', 'ProductController@getSkuCode');
            Route::get('productVariants', 'ProductController@getAttributes');
            Route::get('deleteAttributes/{id}', 'ProductController@deleteAttributes');

            Route::get('inactive_products', 'ProductController@inactive_products');
            Route::get('out_stock_products', 'ProductController@out_stock_products');

            Route::get('vendor_products', 'ProductController@vendor_products');

            Route::post('getMoreFields', 'ProductController@getMoreFields');
            Route::get('delete_size/{id}', 'ProductController@deleteSize');

            Route::post('getProductDetail', 'ProductController@getDetail');
            Route::post('getMoreWeightFields', 'ProductController@getMoreWeightFields');
            Route::get('delete_weight/{id}', 'ProductController@deleteWeight');

            Route::get('search_products', 'ProductController@searchList')->name('products.search_products');

            Route::resource('products', 'ProductController');
            Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
            Route::get('remove-image-thumb/{src}', 'ProductController@removeThumbnail')->name('product.remove.thumb');
        });
        //Blogs
        Route::namespace('Blog')->group(function () {
            Route::resource('blogs', 'BlogController');
            Route::get('remove-image-product', 'BlogController@removeImage')->name('blog.remove.image');
            Route::get('remove-image-thumb', 'BlogController@removeThumbnail')->name('blog.remove.thumb');
        });
        //Sliders
        Route::namespace('Slider')->group(function () {

            Route::get('sliders/index', 'SliderController@index')->name('sliders.index');

            Route::get('slider/create', 'SliderController@create')->name('sliders.create');
            Route::get('slider/{id}/show', 'SliderController@create')->name('sliders.show');
            Route::post('slider/store', 'SliderController@store')->name('sliders.store');

            Route::get('slider/{id}/edit', 'SliderController@edit')->name('sliders.edit');
            Route::post('slider/{id}/update', 'SliderController@update')->name('sliders.update');

            Route::post('slider/{id}/delete', 'SliderController@destroy')->name('sliders.destroy');

            Route::get('search_sliders', 'SliderController@searchList')->name('sliders.search_slider');
        });


        //Banners
        Route::namespace('Banners')->group(function () {

            Route::get('banners/index', 'BannerController@index')->name('banners.index');

            Route::get('banner/create', 'BannerController@create')->name('banners.create');
            Route::get('banner/{id}/show', 'BannerController@create')->name('banners.show');
            Route::post('banner/store', 'BannerController@store')->name('banners.store');

            Route::get('banner/{id}/edit', 'BannerController@edit')->name('banners.edit');
            Route::post('banner/{id}/update', 'BannerController@update')->name('banners.update');

            Route::post('banner/{id}/delete', 'BannerController@destroy')->name('banners.destroy');

            Route::get('search_banners', 'BannerController@searchList')->name('banners.search_banners');
        });




        //Promocode
        Route::namespace('Promocodes')->group(function () {

            Route::get('promocodes/index', 'PromocodeController@index')->name('promocodes.index');

            Route::get('promocode/create', 'PromocodeController@create')->name('promocodes.create');
            Route::get('promocode/{id}/show', 'PromocodeController@create')->name('promocodes.show');
            Route::post('promocode/store', 'PromocodeController@store')->name('promocodes.store');

            Route::get('promocode/{id}/edit', 'PromocodeController@edit')->name('promocodes.edit');
            Route::post('promocode/{id}/update', 'PromocodeController@update')->name('promocodes.update');

            Route::post('promocode/{id}/delete', 'PromocodeController@destroy')->name('promocodes.destroy');

            Route::get('search_promocodes', 'PromocodeController@searchList')->name('promocodes.search_promocodes');
        });


        //Location
        Route::namespace('Locations')->group(function () {

            Route::get('locations/index', 'LocationController@index')->name('locations.index');

            Route::get('location/create', 'LocationController@create')->name('locations.create');
            Route::get('location/{id}/show', 'LocationController@create')->name('locations.show');
            Route::post('location/store', 'LocationController@store')->name('locations.store');

            Route::get('location/{id}/edit', 'LocationController@edit')->name('locations.edit');
            Route::post('location/{id}/update', 'LocationController@update')->name('locations.update');

            Route::post('location/{id}/delete', 'LocationController@destroy')->name('locations.destroy');

            Route::get('search_locations', 'LocationController@searchList')->name('locations.search_locations');
        });


        //Pincode
        Route::namespace('Pincodes')->group(function () {

            Route::get('pincodes/index', 'PincodeController@index')->name('pincodes.index');

            Route::get('pincode/create', 'PincodeController@create')->name('pincodes.create');
            Route::get('pincode/{id}/show', 'PincodeController@create')->name('pincodes.show');
            Route::post('pincode/store', 'PincodeController@store')->name('pincodes.store');

            Route::get('pincode/{id}/edit', 'PincodeController@edit')->name('pincodes.edit');
            Route::post('pincode/{id}/update', 'PincodeController@update')->name('pincodes.update');

            Route::post('pincode/{id}/delete', 'PincodeController@destroy')->name('pincodes.destroy');

            Route::get('search_pincodes', 'PincodeController@searchList')->name('pincodes.search_pincodes');
        });




        //Sliders
        Route::namespace('Offer')->group(function () {

            Route::get('offers/index', 'OfferController@index')->name('offers.index');

            Route::get('offer/create', 'OfferController@create')->name('offers.create');
            Route::get('offer/{id}/show', 'OfferController@create')->name('offers.show');
            Route::post('offer/store', 'OfferController@store')->name('offers.store');

            Route::get('offer/{id}/edit', 'OfferController@edit')->name('offers.edit');
            Route::post('offer/{id}/update', 'OfferController@update')->name('offers.update');

            Route::post('offer/{id}/delete', 'OfferController@destroy')->name('offers.destroy');
        });

        //Our Store
        Route::namespace('OurStore')->group(function () {
            Route::resource('our_store', 'OurStoreController');
        });




        //CMS
        Route::namespace('Cms')->group(function () {
            Route::resource('cms', 'CmsController');
        });
        //Company Detail;
        Route::namespace('CompanyDetail')->group(function () {
            // Route::resource('company_detail', 'CompanyDetailController');

            Route::get('company_detail/{id}/edit', 'CompanyDetailController@edit')->name('company_detail.edit');
            Route::post('company_detail/{id}/edit', 'CompanyDetailController@update')->name('company_detail.update');
        });
        //Testimonials
        Route::namespace('Testimonial')->group(function () {
            Route::resource('testimonials', 'TestimonialController');
            Route::get('remove-image-product', 'TestimonialController@removeImage')->name('testimonial.remove.image');
            Route::get('remove-image-thumb', 'TestimonialController@removeThumbnail')->name('testimonial.remove.thumb');
        });
        //RegisteredShop
        Route::namespace('RegisteredShops')->group(function () {
            Route::resource('registered_shops', 'RegisteredShopController');
            Route::get('requested', 'RegisteredShopController@getRequestedShops')->name('registered_shops.requested');
            Route::get('banned', 'RegisteredShopController@getBannedShops')->name('registered_shops.banned');
            Route::get('status-update/{id}', 'RegisteredShopController@updateShopStatus')->name('registered_shops.status-update');
            Route::get('status-ban/{id}', 'RegisteredShopController@banShopStatus')->name('registered_shops.status-ban');
            Route::get('remove-image-product', 'RegisteredShopController@removeImage')->name('registered_shops.remove.image');

            Route::get('remove-image-thumb', 'RegisteredShopController@removeThumbnail')->name('registered_shops.remove.thumb');

            Route::get('search_shops', 'RegisteredShopController@searchList')->name('shops.search_shops');
        });

        Route::namespace('Customers')->group(function () {
            Route::resource('customers', 'CustomerController');
            Route::resource('customers.addresses', 'CustomerAddressController');
            Route::get('customers_export', 'CustomerController@getCustomersData')->name('customers.export');
        });

        Route::namespace('Subadmin')->group(function () {
            Route::resource('subadmins', 'SubadminController');
        });

        Route::get('customer/compaints', 'ComplaintController@complaints')->name('complaints.index');
        Route::get('customer/compaints/{id}/edit', 'ComplaintController@adminReply')->name('complaints.edit');
        Route::post('customer/compaints/{id}/edit', 'ComplaintController@updateReply')->name('complaints.update');
        Route::post('customer/compaints/{id}/close', 'ComplaintController@statusClose')->name('complaints.destroy');

        Route::namespace('Categories')->group(function () {
            Route::get('sub_categories/{id}', 'CategoryController@getSubCategories');

            Route::resource('categories', 'CategoryController');
            Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
        });
        Route::namespace('Orders')->group(function () {
            Route::resource('orders', 'OrderController');
            Route::resource('order-statuses', 'OrderStatusController');
            Route::get('orders/{id}/invoice', 'OrderController@downloadInvoice')->name('orders.invoice.download');
            Route::get('pending_payments', 'OrderController@pendingPaymentOrders');
            Route::post('orders/status-update/{id}', 'OrderController@updateOrderStatus')->name('orders.status-update');
            Route::post('orders/update_payment_status', 'OrderController@update_payment_status');
            // Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            

            Route::get('order_request/{type}', 'OrderController@getOrdersRequest')->name('orders.order_request');
            Route::get('order_list/{order_type}', 'OrderController@getOrders')->name('orders.order_type');
            Route::get('online_transactions', 'OrderController@onlineTransactions')->name('online_transactions');


        });

        Route::namespace('Bookings')->group(function () {
            Route::resource('bookings', 'BookingController');
            Route::post('bookings/status-update/{id}', 'BookingController@updateBookingStatus')->name('bookings.status-update');
            // Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
        });

        Route::get('user/{id}/edit', 'HomeController@edit');
        Route::post('user/{id}/update', 'HomeController@update');


        Route::get('report/sales_report', 'Sales\SaleController@salesReport');
        Route::get('report/booked_product_sale', 'Sales\SaleController@bookedProductSale');
        Route::get('report/daily_product_sale', 'Sales\SaleController@dailyProductSale');
        Route::get('report/monthly_product_sale', 'Sales\SaleController@monthlyProductSale');


        Route::resource('addresses', 'Addresses\AddressController');
        Route::resource('countries', 'Countries\CountryController');
        Route::resource('countries.provinces', 'Provinces\ProvinceController');
        Route::resource('countries.provinces.cities', 'Cities\CityController');
        Route::resource('couriers', 'Couriers\CourierController');
        Route::resource('attributes', 'Attributes\AttributeController');


        // Route::resource('attributes.values', 'Attributes\AttributeValueController');
        Route::resource('brands', 'Brands\BrandController');
        Route::resource('apple_services', 'AppleService\AppleServiceController');
        Route::resource('shop_categories', 'ShopCategories\ShopCategoryController');

        // Route::get('search_services', 'AppleService\AppleServiceController')->name('apple_services.search_services');

        Route::get('search_complaints', 'ComplaintController@searchList')->name('complaints.search_complaints');
        Route::get('search_sliders', 'Slider\SliderController@searchList')->name('sliders.search_sliders');
        Route::get('search_blogs', 'Blog\BlogController@searchList')->name('blogs.search_blogs');
        Route::get('search_testimonials', 'Testimonial\TestimonialController@searchList')->name('testimonials.search_testimonials');

        Route::get('search_orders', 'Orders\OrderController@searchList')->name('customers.search_orders');
        Route::get('search_customers', 'Customers\CustomerController@searchList')->name('customers.search_customers');
        Route::get('search_subadmins', 'Subadmin\SubadminController@searchList')->name('subadmins.search_subadmins');
        Route::get('search_brands', 'Brands\BrandController@searchList')->name('brands.search_brands');
        Route::get('search_categories', 'Categories\CategoryController@searchList')->name('categories.search_categories');

        Route::get('notifications/{type}', 'Notifications\NotificationControllers@index');
        Route::get('orderslist/pending_orders', 'Notifications\NotificationControllers@pendingOrders');

        Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
        Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');


        Route::get('employees_list/{role}/{id}', 'EmployeeController@getEmployeesList');


        Route::post('upload_products_dump', 'Imports\ImportController@getProductDumpExcel');


        Route::get('upload_products', 'Imports\ImportController@getProductExcel');
        Route::post('upload_products', 'Imports\ImportController@importProduct');
        Route::post('upload_categories', 'Imports\ImportController@importCategory');
        Route::post('upload_brands', 'Imports\ImportController@importBrand');
        Route::post('upload_main_categories', 'Imports\ImportController@importProductCategory');


        Route::resource('employees', 'EmployeeController');
        Route::resource('roles', 'Roles\RoleController');
        // Route::resource('inventories', 'Inventories\InventoryController');



        //Sliders
        Route::namespace('Inventories')->group(function () {

            Route::get('inventories/index', 'InventoryController@index')->name('inventories.index');

            Route::get('inventory/create', 'InventoryController@create')->name('inventories.create');
            Route::get('inventory/{id}/show', 'InventoryController@show')->name('inventories.show');
            Route::post('inventory/store', 'InventoryController@store')->name('inventories.store');

            Route::get('inventory/{id}/edit', 'InventoryController@edit')->name('inventories.edit');
            Route::post('inventory/{id}/update', 'InventoryController@update')->name('inventories.update');

            Route::post('inventory/{id}/delete', 'InventoryController@destroy')->name('inventories.destroy');

            Route::post('getMoreStockFields', 'InventoryController@getMoreStockFields');
            Route::get('deleteStock/{id}', 'InventoryController@deleteStock');

            Route::post('checkBillNo', 'InventoryController@checkBillNo');
        });

        Route::get('inventories', 'Inventories\InventoryController@searchList')->name('inventories.search_inventory');
        Route::resource('permissions', 'Permissions\PermissionController');
    });
});



Auth::routes();

Route::get('/home', 'Front\HomeController@old')->name('home');
