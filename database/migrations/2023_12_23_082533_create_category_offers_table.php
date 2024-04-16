<?php
// database/migrations/YYYY_MM_DD_create_category_offers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryOffersTable extends Migration
{
    public function up()
    {
        Schema::create('category_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('offer_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_offers');
    }
}
