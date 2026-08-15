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
        $builds = \App\Models\VehicleModel::all();
        foreach ($builds as $build) {
            $bomParts = \App\Models\Part::with(['category', 'component', 'supplier'])->where('vehicle_id', $build->vehicle_id)->get();
            $buildPartsToInsert = [];
            $now = now();
            foreach ($bomParts as $bp) {
                $price = $bp->price ? (float)str_replace(['$', ','], '', $bp->price) : 0;
                $exists = \App\Models\VehicleBuildPart::where('vehicle_model_id', $build->id)->where('description', $bp->description)->exists();
                if (!$exists) {
                    $buildPartsToInsert[] = [
                        'vehicle_model_id' => $build->id,
                        'category' => $bp->category ? $bp->category->category_name : 'Uncategorized',
                        'component' => $bp->component ? $bp->component->component_name : 'N/A',
                        'description' => $bp->description,
                        'part_number' => $bp->part_number,
                        'price' => $price,
                        'supplier' => $bp->supplier ? $bp->supplier->business_name : 'N/A',
                        'status' => 'procurement',
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
            }
            if (!empty($buildPartsToInsert)) {
                \App\Models\VehicleBuildPart::insert($buildPartsToInsert);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
