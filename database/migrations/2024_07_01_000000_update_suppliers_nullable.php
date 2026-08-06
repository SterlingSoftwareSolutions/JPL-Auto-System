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
        // Ensure doctrine/dbal is installed for column modifications.
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('country')->nullable()->change();
            $table->string('contact_name')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->boolean('trade_account')->default(false)->nullable()->change();
            $table->boolean('supplier_crm')->nullable()->change();
            $table->string('crm_url')->nullable()->change();
            $table->string('crm_username')->nullable()->change();
            $table->string('crm_password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('country')->nullable(false)->change();
            $table->string('contact_name')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->boolean('trade_account')->default(false)->nullable(false)->change();
            $table->boolean('supplier_crm')->nullable(false)->change();
            $table->string('crm_url')->nullable(false)->change();
            $table->string('crm_username')->nullable(false)->change();
            $table->string('crm_password')->nullable(false)->change();
        });
    }
};
