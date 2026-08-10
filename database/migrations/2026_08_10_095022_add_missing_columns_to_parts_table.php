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
        Schema::table('parts', function (Blueprint $table) {
            $table->string('part_number')->nullable()->after('description');
            $table->string('price')->nullable()->after('part_number');
            $table->string('supplier')->nullable()->after('price');
            $table->string('upload_part_image')->nullable()->after('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parts', function (Blueprint $table) {
            $table->dropColumn(['part_number', 'price', 'supplier', 'upload_part_image']);
        });
    }
};

