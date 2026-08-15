<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\VehicleBuildOperation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update OP-201
        VehicleBuildOperation::where('code', 'OP-201')
            ->update(['title' => 'Rear Parcel Shelf Brace — Fabrication & Weld-In (ADR Seatbelt Mounting).']);

        // Update OP-010
        VehicleBuildOperation::where('code', 'OP-010')
            ->update(['title' => 'Front K-Member, Shock Tower Saddle & Frame Rail Preparation (Section 03).']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert OP-201
        VehicleBuildOperation::where('code', 'OP-201')
            ->update(['title' => 'Rear Parcel Shelf Install — Weld-In (ADR Seatbelt Mounting).']);

        // Revert OP-010
        VehicleBuildOperation::where('code', 'OP-010')
            ->update(['title' => 'Front K-Member, Shock Tower Saddle & Frame Rail Preparation.']);
    }
};
