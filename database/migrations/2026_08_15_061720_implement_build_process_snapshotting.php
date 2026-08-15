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
        Schema::table('vehicle_build_stations', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id')->nullable()->change();
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('operation_qc_checks', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('operation_signoffs', function (Blueprint $table) {
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_build_stations', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id')->nullable(false)->change();
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('operation_qc_checks', function (Blueprint $table) {
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });

        Schema::table('operation_signoffs', function (Blueprint $table) {
            $table->dropForeign(['vehicle_model_id']);
            $table->dropColumn('vehicle_model_id');
        });
    }
};
