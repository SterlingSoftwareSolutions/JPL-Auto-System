<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\SpecificationCategory;
use App\Models\VehicleSpecification;

class VehicleSpecificationSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'POWERTRAIN & DRIVETRAIN' => [
                ['description' => 'Ford 5.0L \"Coyote\" naturally aspirated V8 engine', 'value' => ''],
                ['description' => '6-speed transmission - automatic or manual, to customer specification', 'value' => ''],
                ['description' => 'Haltech programmable engine management system (ECU) for precision tuning and diagnostics', 'value' => ''],
            ],
            'CHASSIS & ARCHITECTURE' => [
                ['description' => 'Independent front and rear suspension for modern ride, handling and control', 'value' => ''],
                ['description' => 'Purpose-engineered chassis dimensions and geometry (full specification available on request)', 'value' => ''],
            ],
            'COACHWORK & STYLING' => [
                ['description' => 'Fully bespoke exterior trim, paint and colourway - customer-specified', 'value' => ''],
                ['description' => 'Electric, colour-matched exterior mirrors', 'value' => ''],
                ['description' => 'Integrated reverse camera and front/rear parking sensor housings', 'value' => ''],
            ],
            'CABIN & CRAFTSMANSHIP' => [
                ['description' => 'Fully bespoke interior trim, materials and colourway - customer-specified', 'value' => ''],
                ['description' => 'Digital instrumentation integrated within the original gauge cluster housing', 'value' => ''],
                ['description' => 'Premium infotainment system', 'value' => ''],
                ['description' => 'Premium sound system', 'value' => ''],
                ['description' => 'Power windows', 'value' => ''],
                ['description' => 'Climate-controlled air conditioning', 'value' => ''],
            ],
            'TECHNOLOGY & CONVENIENCE' => [
                ['description' => 'Modern infotainment and connectivity suite', 'value' => ''],
                ['description' => 'Reverse camera with front and rear parking sensors', 'value' => ''],
                ['description' => 'Electric exterior mirrors', 'value' => ''],
                ['description' => 'Full customer customisation program across interior and exterior specification', 'value' => ''],
            ],
            'SAFETY & DRIVER ASSISTANCE' => [
                ['description' => 'Wilwood high-performance disc brakes with ABS, four-wheel', 'value' => ''],
                ['description' => 'Traction control system', 'value' => ''],
                ['description' => 'Three-point seatbelts throughout', 'value' => ''],
                ['description' => 'Reverse camera and front/rear parking sensors', 'value' => ''],
            ],
            'BESPOKE BUILD PROGRAM' => [
                ['description' => 'Every 478 is a ground-up, exclusive commission - no two builds alike', 'value' => ''],
                ['description' => 'Complete customer authority over exterior and interior trim, colour and specification', 'value' => ''],
                ['description' => 'Individually numbered, hand-built production run', 'value' => ''],
            ],
        ];

        // Target a specific vehicle ID if provided, otherwise fallback to the first vehicle.
        $vehicleId = env('BUILD_SEED_VEHICLE_ID', 1);
        $vehicle = Vehicle::find($vehicleId) ?? Vehicle::first();

        if (!$vehicle) {
            $this->command->warn('No vehicles found. Please create a vehicle first.');
            return;
        }

        // Clear existing specs for this vehicle
        VehicleSpecification::where('vehicle_id', $vehicle->id)->delete();

        foreach ($categories as $categoryName => $specs) {
            $category = SpecificationCategory::firstOrCreate(['name' => $categoryName]);

            foreach ($specs as $specData) {
                VehicleSpecification::create([
                    'vehicle_id' => $vehicle->id,
                    'category_id' => $category->id,
                    'description' => $specData['description'],
                    'value' => $specData['value'],
                ]);
            }
        }
        
        $this->command->info("Vehicle specifications seeded successfully for vehicle ID {$vehicle->id}.");
    }
}