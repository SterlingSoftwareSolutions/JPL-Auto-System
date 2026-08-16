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
        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->dropForeign(['signed_by']);
        });

        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->dropIndex(['signed_by']);
        });

        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->string('signed_by', 191)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('build_signoff_logs', function (Blueprint $table) {
            // NOTE: Reverting this will fail if the table contains non-integer strings in signed_by
            $table->unsignedBigInteger('signed_by')->nullable()->change();
        });

        Schema::table('build_signoff_logs', function (Blueprint $table) {
            $table->foreign('signed_by')->references('id')->on('users')->nullOnDelete();
        });
    }
};
