<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('operation_qc_checks', function (Blueprint $table) {
            // 0-based step index this QC card should appear after.
            // NULL = ungated (appears at end under "Final verification").
            $table->unsignedInteger('after_step')->nullable()->after('order');
        });
    }

    public function down(): void
    {
        Schema::table('operation_qc_checks', function (Blueprint $table) {
            $table->dropColumn('after_step');
        });
    }
};
