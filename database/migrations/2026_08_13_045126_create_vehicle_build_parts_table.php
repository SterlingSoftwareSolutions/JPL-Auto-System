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
        Schema::create('vehicle_build_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained('vehicle_models')->cascadeOnDelete();
            $table->string('category');
            $table->string('component');
            $table->string('description')->nullable();
            $table->string('part_number')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('supplier')->nullable();
            $table->string('status')->default('procurement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_build_parts');
    }
};
