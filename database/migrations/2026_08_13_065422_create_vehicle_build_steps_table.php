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
        Schema::create('vehicle_build_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained()->cascadeOnDelete();
            $table->text('label');
            $table->text('warn')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->string('image_path')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_build_steps');
    }
};
