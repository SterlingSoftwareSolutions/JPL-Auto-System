<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use App\Models\VehicleBuildStation;
use App\Models\VehicleBuildOperation;
use App\Models\VehicleBuildStep;
use App\Models\Ppe;
use App\Models\OperationSignoff;
use App\Models\Tool;
use App\Models\Material;
use App\Models\OperationHazard;
use App\Models\OperationQcCheck;

class BuildProcessSeeder extends Seeder
{
    public function run(): void
    {
        // Target the first vehicle (JPL 478). Adjust if needed.
        $vehicle = Vehicle::first();
        if (!$vehicle) {
            $this->command->warn('No vehicles found. Please create a vehicle first.');
            return;
        }

        $this->command->info("Seeding build process for vehicle: {$vehicle->name} (ID: {$vehicle->id})");

        // Clear existing master template data for this vehicle (vehicle_model_id = null)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        VehicleBuildStation::where('vehicle_id', $vehicle->id)->each(function($station) {
            $station->operations()->each(function($op) {
                $op->steps()->delete();
                $op->hazards()->delete();
                $op->qcChecks()->delete();
                $op->signoffs()->delete();
                $op->ppes()->detach();
                $op->tools()->detach();
                $op->materials()->detach();
                $op->delete();
            });
            $station->delete();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Load ops.json from project root
        $opsPath = base_path('ops.json');
        if (!file_exists($opsPath)) {
            $this->command->error('ops.json not found at project root.');
            return;
        }

        $ops = json_decode(file_get_contents($opsPath), true);
        if (!$ops) {
            $this->command->error('Failed to parse ops.json.');
            return;
        }

        // Group by section
        $sections = [];
        foreach ($ops as $op) {
            $section = $op['section'] ?? '00';
            if (!isset($sections[$section])) {
                $sections[$section] = [];
            }
            $sections[$section][] = $op;
        }

        ksort($sections);

        // Section name map from the HTML
        $sectionNames = [
            '01' => 'New Shell Receiving & Inspection',
            '02' => 'ADR Structural Modification',
            '03' => 'Front Suspension (IFS) Install',
            '04' => 'Rear Suspension & Driveline Mounts',
            '05' => 'Brake & Fuel Systems',
            '06' => 'Drivetrain & Engine Bay Install',
            '07' => 'Electrical & Wiring',
            '08' => 'Body & Paint',
            '09' => 'Interior and External Trim',
            '10' => 'Final Assembly, Alignment & Audit',
        ];

        $stationOrder = 0;
        foreach ($sections as $sectionId => $sectionOps) {
            $stationName = $sectionNames[$sectionId] ?? ("Section {$sectionId}");
            $station = VehicleBuildStation::create([
                'vehicle_id'      => $vehicle->id,
                'section_name'    => $sectionId,
                'name'            => $stationName,
                'order'           => $stationOrder++,
            ]);

            $opOrder = 0;
            foreach ($sectionOps as $opData) {
                $operation = VehicleBuildOperation::create([
                    'vehicle_build_station_id' => $station->id,
                    'code'                      => $opData['opNo'] ?? null,
                    'title'                     => $opData['title'] ?? '',
                    'station'                   => $opData['station'] ?? null,
                    'order'                     => $opOrder++,
                    'next_operation'            => $opData['next'] ?? null,
                    'diagram_svg'               => $opData['diagramSvg'] ?? null,
                    'diagram_caption'           => $opData['diagramCaption'] ?? null,
                ]);

                // PPE
                if (!empty($opData['ppe'])) {
                    foreach ($opData['ppe'] as $ppeName) {
                        $ppe = Ppe::firstOrCreate(['name' => $ppeName]);
                        $operation->ppes()->attach($ppe->id);
                    }
                }

                // Tools
                if (!empty($opData['tools'])) {
                    foreach ($opData['tools'] as $toolName) {
                        $tool = Tool::firstOrCreate(['name' => $toolName]);
                        $operation->tools()->attach($tool->id, ['quantity' => 1]);
                    }
                }

                // Materials
                if (!empty($opData['materials'])) {
                    foreach ($opData['materials'] as $materialName) {
                        $material = Material::firstOrCreate(['name' => $materialName]);
                        $operation->materials()->attach($material->id, ['quantity' => 1]);
                    }
                }

                // Hazards
                if (!empty($opData['hazards'])) {
                    foreach ($opData['hazards'] as $haz) {
                        OperationHazard::create([
                            'vehicle_build_operation_id' => $operation->id,
                            'hazard'  => $haz[0] ?? '',
                            'control' => $haz[1] ?? '',
                        ]);
                    }
                }

                // QC checks
                if (!empty($opData['qc'])) {
                    $qcOrder = 0;
                    foreach ($opData['qc'] as $qc) {
                        OperationQcCheck::create([
                            'vehicle_build_operation_id' => $operation->id,
                            'specification'               => $qc[0] ?? '',
                            'expected_value'              => $qc[1] ?? '',
                            'order'                       => $qcOrder++,
                        ]);
                    }
                }

                // Steps — format: [label, keypoint_text, image_path, image_caption]
                if (!empty($opData['steps'])) {
                    $stepOrder = 0;
                    foreach ($opData['steps'] as $step) {
                        VehicleBuildStep::create([
                            'vehicle_build_operation_id' => $operation->id,
                            'label'                       => $step[0] ?? '',
                            'keypoint_text'               => ($step[1] !== null && $step[1] !== '') ? $step[1] : null,
                            'image_path'                  => $step[2] ?? null,
                            'image_caption'               => $step[3] ?? null,
                            'type'                        => null,
                            'order'                       => $stepOrder++,
                        ]);
                    }
                }

                // Sign-offs
                OperationSignoff::create([
                    'vehicle_build_operation_id' => $operation->id,
                    'role'                       => 'Operator',
                    'order'                      => 0,
                ]);
                OperationSignoff::create([
                    'vehicle_build_operation_id' => $operation->id,
                    'role'                       => 'QC sign-off',
                    'order'                      => 1,
                ]);
            }
            $this->command->info("  Section {$sectionId} — {$stationName}: " . count($sectionOps) . " operations seeded.");
        }

        $this->command->info("✓ Build process seeded successfully for vehicle ID {$vehicle->id}.");
    }
}
