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
        Schema::create('vehicle_build_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_station_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('section');
            $table->string('station');
            $table->string('title');
            $table->json('ppe')->nullable();
            $table->json('hazards')->nullable();
            $table->json('tools')->nullable();
            $table->json('materials')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_build_operations');
    }
};
