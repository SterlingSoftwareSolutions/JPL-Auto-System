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
            $table->string('image_path')->nullable()->after('keypoint_text');
            $table->text('image_caption')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_build_steps', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'image_caption']);
        });
    }
};
