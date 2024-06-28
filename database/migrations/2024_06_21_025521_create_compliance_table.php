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
        Schema::create('compliance', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('compliancetext');
            $table->foreignId('adr_id')->constrained('adr'); // Ensure 'adr' table exists
            $table->foreignId('evidence_type_id')->nullable()->constrained('evidence_type')->nullable(); // Ensure 'evidence_types' table exists
            $table->foreignId('ece_number_id')->nullable()->constrained('ece_number')->nullable(); // Ensure 'ece_numbers' table exists
            $table->foreignId('supporting_document_id')->nullable()->constrained('supporting_documents')->nullable(); // Ensure 'supporting_documents' table exists
            $table->foreignId('supporting_images_id')->nullable()->constrained('supporting_images')->nullable(); // Ensure 'supporting_images' table exists
            $table->foreignId('component_details_id')->nullable()->constrained('components_details')->nullable(); // Ensure 'component_details' table exists
            $table->foreignId('system_status_id')->nullable()->constrained('system_status'); // Ensure 'system_statuses' table exists
            $table->foreignId('adr_requirements_id')->constrained('adr_requirments')->nullable(); // Ensure 'adr_requirements' table exists
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliance');
    }
};
