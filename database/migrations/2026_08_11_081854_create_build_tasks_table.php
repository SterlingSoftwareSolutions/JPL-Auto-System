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
        Schema::create('build_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('track');
            $table->string('phase');
            $table->string('label');
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
        Schema::dropIfExists('build_tasks');
    }
};
