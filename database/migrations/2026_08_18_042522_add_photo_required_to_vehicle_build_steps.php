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
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->boolean('photo_required')->default(false)->after('keypoint_text');
            $table->string('photo_label')->nullable()->after('photo_required');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->dropColumn('photo_required');
            $table->dropColumn('photo_label');
        });
    }
};
