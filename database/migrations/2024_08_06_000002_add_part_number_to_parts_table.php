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
        // Add part_number column (string, not nullable) to parts table
        Schema::table('parts', function (Blueprint $table) {
            if (!Schema::hasColumn('parts', 'part_number')) {
                $table->string('part_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parts', function (Blueprint $table) {
            if (Schema::hasColumn('parts', 'part_number')) {
                $table->dropColumn('part_number');
            }
        });
    }
};
?>
