<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('India');
            $table->string('pincode')->nullable();
            $table->string('driving_licence')->nullable();
            $table->string('adhaar_front')->nullable();
            $table->string('adhaar_back')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('voter_id')->nullable();
            $table->string('passport_size_photo')->nullable();
            $table->string('others')->nullable();
            $table->string('monthly_salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
