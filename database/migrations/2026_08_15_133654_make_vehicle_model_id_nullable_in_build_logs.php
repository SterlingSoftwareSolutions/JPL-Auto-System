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
        Schema::table('build_step_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable()->change();
        });
        Schema::table('build_qc_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable()->change();
        });
        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable()->change();
        });
        // Schema::table('build_operation_notes', function (Blueprint $table) {
        //     $table->unsignedBigInteger('vehicle_model_id')->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // To reverse, we'd have to make them non-nullable, but only if there are no null rows.
        // It's safer not to automatically enforce non-nullable without cleaning up data first.
        Schema::table('build_step_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable(false)->change();
        });
        Schema::table('build_qc_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable(false)->change();
        });
        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_model_id')->nullable(false)->change();
        });
        // Schema::table('build_operation_notes', function (Blueprint $table) {
        //     $table->unsignedBigInteger('vehicle_model_id')->nullable(false)->change();
        // });
    }
};
