<?php
// database/migrations/YYYY_MM_DD_create_historical_sites_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricalSitesTable extends Migration
{
    public function up()
    {
        Schema::create('historical_sites', function (Blueprint $table) {
            $table->id();
            $table->string('history_name');
            $table->string('history_image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historical_sites');
    }
}
