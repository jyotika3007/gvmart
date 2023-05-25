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


    // Company Detail
    Route::get('companyDetail','CmsController@companyDetail');
    
    
    //User Dashboard
    Route::get('userProfile/{userid}','UserDashboardController@userProfile');
    Route::post('addToCart','UserDashboardController@productAddToCart');
    Route::get('userCart/{userid}','UserDashboardController@userCartProducts');
    Route::post('addToWishlist','UserDashboardController@productAddToWishlist');
    Route::get('userWishlist/{userid}','UserDashboardController@userWishlistProducts');
    Route::get('userOrdersList/{userid}','UserDashboardController@getUserOrdersList');
    Route::post('removeFromWishlist','UserDashboardController@removeFromWishlist');
    Route::post('removeFromCart','UserDashboardController@removeFromCart');
    Route::patch('updateUserProfile/{user_id}','UserDashboardController@updateUserProfile');
    

});