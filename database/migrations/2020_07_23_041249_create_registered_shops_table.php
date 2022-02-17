<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_name');
            $table->string('shop_name');
            $table->string('category');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->bigInteger('pincode');
            $table->string('email')->nullable();
            $table->string('contact');
            $table->string('alternate_contact')->nullable();
            $table->string('shop_code');
            $table->string('registration_date');
            $table->string('activation_date')->nullabla();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registered_shops');
    }
}
