<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');

            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_secret_key')->nullable();
            $table->string('google_client_id')->nullable();
            $table->string('google_secret_key')->nullable();
            $table->string('google_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linked_in_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
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
        Schema::dropIfExists('company_details');
    }
}
