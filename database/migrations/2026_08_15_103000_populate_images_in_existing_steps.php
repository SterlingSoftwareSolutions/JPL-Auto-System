<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleBuildOperation;
use App\Models\VehicleBuildStep;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $opsPath = base_path('ops.json');
        
        if (file_exists($opsPath)) {
            $opsData = json_decode(file_get_contents($opsPath), true);
            
            if (is_array($opsData)) {
                foreach ($opsData as $op) {
                    $opNo = $op['opNo'] ?? null;
                    if (!$opNo) continue;

                    // Find all operations with this op code (both master and prototype)
                    $operations = VehicleBuildOperation::where('code', $opNo)->get();

                    if (isset($op['steps']) && is_array($op['steps'])) {
                        foreach ($op['steps'] as $index => $stepArray) {
                            $label = $stepArray[0] ?? '';
                            $imagePath = $stepArray[2] ?? null;
                            $imageCaption = $stepArray[3] ?? null;

                            if ($imagePath || $imageCaption) {
                                // Update all steps across master and prototypes that match the label
                                foreach ($operations as $operation) {
                                    $stepRecord = VehicleBuildStep::where('vehicle_build_operation_id', $operation->id)
                                        ->where('label', $label)
                                        ->first();

                                    if ($stepRecord) {
                                        $stepRecord->update([
                                            'image_path' => $imagePath,
                                            'image_caption' => $imageCaption
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reverse action needed for data population
    }
};
