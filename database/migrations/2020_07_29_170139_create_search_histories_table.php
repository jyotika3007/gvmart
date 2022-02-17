<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('product_id');
            $table->bigInteger('max_click')->default('0');
            $table->timestamps();
        });

        Schema::table('registered_shops', function (Blueprint $table) {
            $table->string('click_count')->default('0');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('click_count')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_histories');
    }
}
