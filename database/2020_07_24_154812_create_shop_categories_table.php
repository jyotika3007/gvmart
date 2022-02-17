<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('category_name');
            $table->string('status')->default('1');
            $table->timestamps();
        });

        Schema::table('registered_shops', function (Blueprint $table) {
            $table->bigInteger('category_ids');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_categories');
    }
}
