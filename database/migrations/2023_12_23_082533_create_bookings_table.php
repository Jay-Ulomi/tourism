<?php
// database/migrations/YYYY_MM_DD_create_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('destination_id');
            $table->integer('number_people');
            $table->timestamp('booking_date')->default(now());
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('destination_id')->references('id')->on('destinations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
