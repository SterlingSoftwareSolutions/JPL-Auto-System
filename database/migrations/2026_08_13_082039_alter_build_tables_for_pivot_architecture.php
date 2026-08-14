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
        // 1. Alter stations table
        Schema::table('vehicle_build_stations', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable()->change();
        });

        // 2. Alter operations table
        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->nullOnDelete();
        });

        // 3. Alter steps table
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->nullOnDelete();
            $table->dropColumn(['is_completed', 'image_path']);
        });

        // 4. Create statuses table
        Schema::create('vehicle_build_step_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_build_step_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_completed')->default(false);
            $table->string('image_path')->nullable();
            $table->timestamps();
            
            // Unique constraint: A vehicle can only have one status record per step
            $table->unique(['vehicle_model_id', 'vehicle_build_step_id'], 'model_step_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_build_step_statuses');

        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->boolean('is_completed')->default(false);
            $table->string('image_path')->nullable();
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('vehicle_build_stations', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable(false)->change();
        });
    }
};
