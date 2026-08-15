<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            if (!Schema::hasColumn('vehicle_build_operations', 'station')) {
                $table->string('station')->nullable()->after('title');
            }
        });

        Schema::table('operation_qc_checks', function (Blueprint $table) {
            if (!Schema::hasColumn('operation_qc_checks', 'expected_value')) {
                $table->text('expected_value')->nullable()->after('specification');
            }
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->dropColumn('station');
        });
        Schema::table('operation_qc_checks', function (Blueprint $table) {
            $table->dropColumn('expected_value');
        });
    }
};
