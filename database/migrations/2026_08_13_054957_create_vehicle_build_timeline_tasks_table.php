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
        Schema::create('vehicle_build_timeline_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();
            $table->string('track')->nullable();
            $table->string('phase')->nullable();
            $table->string('label')->nullable();
            $table->decimal('cost', 10, 2)->default(0);
            $table->integer('start')->default(1);
            $table->integer('dur')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_build_timeline_tasks');
    }
};
