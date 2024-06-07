<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('planbooking', function (Blueprint $table) {
            $table->json('activities')->nullable(); // Add a JSON column for activities
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planbooking', function (Blueprint $table) {
            //
        });
    }
};
