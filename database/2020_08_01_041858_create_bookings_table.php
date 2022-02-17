<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('shop_id');
            $table->string('shop_name');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->bigInteger('customer_contact');
            $table->string('customer_house_no')->nullable();
            $table->string('customer_mohalla')->nullable();
            $table->string('customer_near_by')->nullable();
            $table->string('customer_city');
            $table->string('customer_state');
            $table->bigInteger('customer_pincode')->nullable();
            $table->string('customer_service_query');
            $table->string('requirement');
            $table->string('booking_date');
            $table->string('booking_status')->default('Pending');
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
        Schema::dropIfExists('bookings');
    }
}
