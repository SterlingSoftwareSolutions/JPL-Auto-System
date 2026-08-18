<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->string('data_entry_label')->nullable()->after('photo_label');
            $table->string('data_entry_spec')->nullable()->after('data_entry_label');
            $table->string('data_entry_unit')->nullable()->after('data_entry_spec');
        });

        Schema::table('build_step_logs', function (Blueprint $table) {
            $table->string('data_entry_value')->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->dropColumn(['data_entry_label', 'data_entry_spec', 'data_entry_unit']);
        });

        Schema::table('build_step_logs', function (Blueprint $table) {
            $table->dropColumn('data_entry_value');
        });
    }
};
