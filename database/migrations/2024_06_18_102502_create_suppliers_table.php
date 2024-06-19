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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('upload_image')->nullable();
            $table->string('business_name');
            $table->string('business_web')->nullable();
            $table->string('country');
            $table->string('contact_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->boolean('trade_account')->default(false);
            $table->string('trade_agreement_pdf')->nullable();
            $table->boolean('supplier_crm');
            $table->string('crm_url')->nullable();
            $table->string('crm_username')->nullable();
            $table->string('crm_password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
