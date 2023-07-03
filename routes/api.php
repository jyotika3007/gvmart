<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {

    
    
    // Auth Routes
    Route::post('login','AuthController@postLogin');
    Route::post('register','AuthController@postRegister');
    Route::post('verifyOtp','AuthController@verifyOtp');
    Route::post('resetPassword','AuthController@resetPassword');
    Route::post('forgotPassword','AuthController@forgotPassword');
    
    
    // Honme Page routes
    Route::get('home_products','HomeController@home_products');
    Route::get('home_main','HomeController@home_main');
    Route::get('categoriesList','HomeController@categories');


    //Categorywise Products Api
    Route::get('categoryProducts/{id}','CategoryProductController@index');
    Route::get('productVariants','CategoryProductController@getVariants');


    // Product Detail
    Route::get('productDetail/{id}','ProductController@index');
    Route::get('reviewsList/{product_id}','ProductController@getAllReviews');
    Route::post('addReview','ProductController@storeProductReview');


    // Company Detail
    Route::get('companyDetail','CmsController@companyDetail');
    Route::get('pageDetail','CmsController@getCmsDetail');

    
    // Offers Api
    Route::get('offersList','OfferController@getAllOffers');

    
    // Our Stores aPI
    Route::get('ourStores','OurStoreController@getOurStoresList');


    // Apple services Detail
    Route::get('appleServices','AppleServiceController@getAppleServices');
    Route::get('appleServicesDetail/{id}','AppleServiceController@getAppleServiceDetail');
    
    
    // States & Cities API
    Route::get('statesList','UserDashboardController@getAllStates');
    Route::get('citiesList/{state_id}','UserDashboardController@getAllCities');
    
    
    //User Dashboard
    Route::get('userProfile/{userid}','UserDashboardController@userProfile');
    Route::get('userSavedAddress/{userid}','UserDashboardController@getUsersSavedAddresses');
    Route::post('storeUserAddress/{userid}','UserDashboardController@postUserAddress');
    Route::post('addToCart','UserDashboardController@productAddToCart');
    Route::get('userCart/{userid}','UserDashboardController@userCartProducts');
    Route::post('addToWishlist','UserDashboardController@productAddToWishlist');
    Route::get('userWishlist/{userid}','UserDashboardController@userWishlistProducts');
    Route::get('userOrdersList/{userid}','UserDashboardController@getUserOrdersList');
    Route::post('removeFromWishlist','UserDashboardController@removeFromWishlist');
    Route::post('removeFromCart','UserDashboardController@removeFromCart');
    Route::patch('updateUserProfile/{user_id}','UserDashboardController@updateUserProfile');
    Route::get('orderDetail/{order_id}','UserDashboardController@getOrderDetail');
    Route::get('ordersList/{user_id}','UserDashboardController@getOrdersList');
    
    
    // Route::post('checkout/{user_id}',function(){ echo 1; });
    Route::post('checkout/{user_id}','CheckoutController@checkout');
    
    
    Route::get('cartRelatedItems','UserDashboardController@getCartRelatedItems');
    Route::get('compareProduct/{product_id}','CompareProductsController@getcomparedProductDetail');
    Route::get('compareProductsList','CompareProductsController@getCompareProductsList');
    
    Route::post('get_payment_link','CheckoutController@getPaymentLink');
    Route::post('ThankYou/User', 'CheckoutController@getPaymentResponse');
    Route::get('ThankYou/test', 'CheckoutController@generateRequestKey');
    Route::post('updateOrderStatus','UserDashboardController@updateOrderStatus');

    
});