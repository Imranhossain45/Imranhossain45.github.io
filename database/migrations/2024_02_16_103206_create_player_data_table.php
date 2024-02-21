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
        Schema::create('player_data', function (Blueprint $table) {
            $table->id();
            $table->json('criketer_data')->nullable();
            $table->longText('criketer_profile')->nullable();
            $table->json('footballer_data')->nullable();
            $table->longText('footballer_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_data');
    }
};
