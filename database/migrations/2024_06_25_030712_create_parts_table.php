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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('description');

              // Foreign keys
              $table->unsignedBigInteger('category_id');
              $table->unsignedBigInteger('component_id');

              // Set up the foreign key constraints
              $table->foreign('category_id')->references('id')->on('part_categories')->onDelete('cascade');
              $table->foreign('component_id')->references('id')->on('part_components')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
