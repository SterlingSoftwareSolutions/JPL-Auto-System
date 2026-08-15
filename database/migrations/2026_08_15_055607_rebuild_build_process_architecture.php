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
        Schema::disableForeignKeyConstraints();

        // 1. Drop existing build process tables
        Schema::dropIfExists('vehicle_build_step_statuses');
        Schema::dropIfExists('vehicle_build_steps');
        Schema::dropIfExists('vehicle_build_operations');
        Schema::dropIfExists('vehicle_build_stations');

        // 2. Core Template Tables (tied to Vehicle)
        Schema::create('vehicle_build_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->string('section_name')->nullable();
            $table->string('name');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('vehicle_build_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_station_id')->constrained()->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('title');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('vehicle_build_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained()->cascadeOnDelete();
            $table->text('label');
            $table->string('type')->nullable(); // null (instruction), 'keypoint', 'critical', 'ok'
            $table->text('keypoint_text')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 3. Properties and Items Tables
        Schema::create('ppes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_class')->nullable();
            $table->timestamps();
        });

        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('part_number')->nullable();
            $table->timestamps();
        });

        // 4. Pivot Tables for Operations
        Schema::create('operation_ppe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->foreignId('ppe_id')->constrained()->cascadeOnDelete();
        });

        Schema::create('operation_tool', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->foreignId('tool_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity')->default(1);
        });

        Schema::create('operation_material', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->foreignId('material_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity')->default(1);
        });

        Schema::create('operation_hazards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->text('hazard');
            $table->text('control');
            $table->timestamps();
        });

        // 5. Dynamic Templates for QC and Sign-offs
        Schema::create('operation_qc_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->text('specification');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('operation_signoffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
            $table->string('role');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 6. Live Build Process Tables (tied to VehicleModel - specific car instance)
        Schema::create('build_step_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_build_step_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_completed')->default(false);
            $table->string('image_path')->nullable();
            $table->foreignId('completed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            $table->unique(['vehicle_model_id', 'vehicle_build_step_id'], 'model_step_unique');
        });

        Schema::create('build_qc_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('operation_qc_check_id')->constrained('operation_qc_checks')->cascadeOnDelete();
            $table->enum('status', ['pass', 'fail'])->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('logged_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('logged_at')->nullable();
            $table->timestamps();
            
            $table->unique(['vehicle_model_id', 'operation_qc_check_id'], 'model_qc_unique');
        });

        Schema::create('build_signoff_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('operation_signoff_id')->constrained('operation_signoffs')->cascadeOnDelete();
            $table->foreignId('signed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->longText('signature_data')->nullable(); // Base64 or image path
            $table->timestamp('signed_at')->nullable();
            $table->timestamps();
            
            $table->unique(['vehicle_model_id', 'operation_signoff_id'], 'model_signoff_unique');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('build_signoff_logs');
        Schema::dropIfExists('build_qc_logs');
        Schema::dropIfExists('build_step_logs');
        Schema::dropIfExists('operation_signoffs');
        Schema::dropIfExists('operation_qc_checks');
        Schema::dropIfExists('operation_hazards');
        Schema::dropIfExists('operation_material');
        Schema::dropIfExists('operation_tool');
        Schema::dropIfExists('operation_ppe');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('tools');
        Schema::dropIfExists('ppes');
        Schema::dropIfExists('vehicle_build_steps');
        Schema::dropIfExists('vehicle_build_operations');
        Schema::dropIfExists('vehicle_build_stations');

        Schema::enableForeignKeyConstraints();
    }
};
