<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->longText('diagram_svg')->nullable()->after('order');
            $table->text('diagram_caption')->nullable()->after('diagram_svg');
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_build_operations', function (Blueprint $table) {
            $table->dropColumn(['diagram_svg', 'diagram_caption']);
        });
    }
};
