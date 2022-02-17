<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToCompanyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_details', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('testimonials', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('sliders', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });

        Schema::table('cms', function (Blueprint $table) {
            $table->bigInteger('user_id');
        }); 

        Schema::table('wishlists', function (Blueprint $table) {
            $table->bigInteger('user_shop_id');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('inventories', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->bigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_details', function (Blueprint $table) {
            //
        });
    }
}
