<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        // 1. Remove vehicle_model_id from master template tables (they don't belong there)
        $masterTables = [
            'vehicle_build_stations',
            'vehicle_build_operations',
            'vehicle_build_steps',
            'operation_qc_checks',
            'operation_signoffs',
        ];

        foreach ($masterTables as $table) {
            if (Schema::hasColumn($table, 'vehicle_model_id')) {
                Schema::table($table, function (Blueprint $t) {
                    $t->dropForeign(['vehicle_model_id']);
                    $t->dropColumn('vehicle_model_id');
                });
            }
        }

        // 2. Add vehicle_id to all live log tables (for fast cross-vehicle reporting)
        if (!Schema::hasColumn('build_step_logs', 'vehicle_id')) {
            Schema::table('build_step_logs', function (Blueprint $table) {
                $table->foreignId('vehicle_id')
                      ->nullable()
                      ->after('id')
                      ->constrained('vehicles')
                      ->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('build_qc_logs', 'vehicle_id')) {
            Schema::table('build_qc_logs', function (Blueprint $table) {
                $table->foreignId('vehicle_id')
                      ->nullable()
                      ->after('id')
                      ->constrained('vehicles')
                      ->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('build_signoff_logs', 'vehicle_id')) {
            Schema::table('build_signoff_logs', function (Blueprint $table) {
                $table->foreignId('vehicle_id')
                      ->nullable()
                      ->after('id')
                      ->constrained('vehicles')
                      ->nullOnDelete();
            });
        }

        // 3. Add diagram_image_path to vehicle_build_operations (for real image upload)
        if (!Schema::hasColumn('vehicle_build_operations', 'diagram_image_path')) {
            Schema::table('vehicle_build_operations', function (Blueprint $table) {
                $table->string('diagram_image_path')->nullable()->after('diagram_caption');
            });
        }

        // 4. Create build_operation_notes table
        if (!Schema::hasTable('build_operation_notes')) {
            Schema::create('build_operation_notes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
                //$table->foreignId('vehicle_model_id')->constrained('vehicle_models')->cascadeOnDelete();
                $table->foreignId('vehicle_model_id')->nullable()->constrained('vehicle_models')->cascadeOnDelete();
                $table->foreignId('vehicle_build_operation_id')->constrained('vehicle_build_operations')->cascadeOnDelete();
                // Per-build work sequence job photo (does NOT go back to master)
                $table->string('diagram_image_path')->nullable();
                $table->text('notes')->nullable();
                $table->foreignId('logged_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();

                $table->unique(
                    ['vehicle_model_id', 'vehicle_build_operation_id'],
                    'build_op_notes_unique'
                );
            });
        }

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('build_operation_notes');

        foreach (['build_step_logs', 'build_qc_logs', 'build_signoff_logs'] as $table) {
            if (Schema::hasColumn($table, 'vehicle_id')) {
                Schema::table($table, function (Blueprint $t) {
                    $t->dropForeign(['vehicle_id']);
                    $t->dropColumn('vehicle_id');
                });
            }
        }

        if (Schema::hasColumn('vehicle_build_operations', 'diagram_image_path')) {
            Schema::table('vehicle_build_operations', function (Blueprint $table) {
                $table->dropColumn('diagram_image_path');
            });
        }

        Schema::enableForeignKeyConstraints();
    }
};
