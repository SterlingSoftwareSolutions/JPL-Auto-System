<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processTemplate = config('build_process');
        if (!$processTemplate) return;
        
        if (\App\Models\VehicleBuildStation::whereNull('vehicle_model_id')->count() > 0) {
            $this->command->info('Global build process is already seeded.');
            return;
        }

        foreach ($processTemplate as $stationIndex => $stationData) {
            $station = \App\Models\VehicleBuildStation::create([
                'vehicle_model_id' => null,
                'name' => $stationData['name'],
                'order' => $stationIndex + 1,
            ]);

            foreach ($stationData['ops'] as $opIndex => $opData) {
                $operation = $station->operations()->create([
                    'code' => $opData['code'],
                    'section' => $opData['section'],
                    'station' => $opData['station'],
                    'title' => $opData['title'],
                    'ppe' => $opData['ppe'] ?? [],
                    'hazards' => $opData['hazards'] ?? [],
                    'tools' => $opData['tools'] ?? [],
                    'materials' => $opData['materials'] ?? [],
                    'vehicle_model_id' => null,
                    'order' => $opIndex + 1,
                ]);

                foreach ($opData['steps'] as $stepIndex => $stepData) {
                    $operation->steps()->create([
                        'vehicle_model_id' => null,
                        'label' => $stepData['label'],
                        'warn' => $stepData['warn'] ?? null,
                        'order' => $stepIndex + 1,
                    ]);
                }
            }
        }
        
        $this->command->info('Global build process seeded successfully.');
    }
}
