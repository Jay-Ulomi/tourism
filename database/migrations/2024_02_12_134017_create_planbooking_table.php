<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanbookingTable extends Migration
{
    public function up()
    {
        Schema::create('planbooking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id');
            $table->integer('numberOfPeople'); // Add numberOfPeople column
            $table->decimal('totalPrice', 10, 2); // Add totalPrice column with 10 digits in total and 2 decimal places
            $table->dateTime('start_at'); // Add start_at column to store date and time
            $table->dateTime('end_at'); // Add end_at column to store date and time
            $table->string('booking_status')->default("pending");
            // Add any additional columns needed for the plan booking
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('planbooking');
    }
}
