<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicleId = (int) env('BUILD_SEED_VEHICLE_ID', 1);

        $information = [
            // Core
            ['item_number' => '1', 'label' => 'Vehicle Make', 'variant1' => 'FORD', 'variant2' => '-'],
            ['item_number' => '2', 'label' => 'Vehicle Model', 'variant1' => 'MUSTANG', 'variant2' => '-'],
            ['item_number' => '3', 'label' => 'Body Shape (NSW Body Code/Shape)', 'variant1' => 'COUPE', 'variant2' => '-'],
            ['item_number' => '4', 'label' => 'Number of Side Doors', 'variant1' => '2', 'variant2' => '-'],
            ['item_number' => '5', 'label' => 'Number of Rear Doors', 'variant1' => '0', 'variant2' => '-'],
            ['item_number' => '6', 'label' => 'Vehicle Category', 'variant1' => 'MA (passenger car — 2-door coupé)', 'variant2' => '-'],
            
            // Exterior Dimensions
            ['item_number' => '7', 'label' => 'Length', 'variant1' => '4,613 mm (181.6")', 'variant2' => '-'],
            ['item_number' => '8', 'label' => 'Width', 'variant1' => '~1,801 mm (70.9")', 'variant2' => '-'],
            ['item_number' => '9', 'label' => 'Track, Front', 'variant1' => '1,476 mm (58.1" — V8 spec)', 'variant2' => '-'],
            ['item_number' => '10', 'label' => 'Track, Rear', 'variant1' => '1,476 mm (58.1" — V8 spec)', 'variant2' => '-'],
            ['item_number' => '11', 'label' => 'Wheel Base', 'variant1' => '2,743 mm (108.0")', 'variant2' => '-'],
            ['item_number' => '12', 'label' => 'Overhang, Front + Rear (combined)', 'variant1' => '~1,869 mm total (Length - Wheelbase)', 'variant2' => '-'],
            
            // Interior Dimensions
            ['item_number' => '13', 'label' => 'Head Room, Front', 'variant1' => '950 mm (37.4")', 'variant2' => '-'],
            ['item_number' => '14', 'label' => 'Head Room, Rear', 'variant1' => '~875 mm (34.4") - est.', 'variant2' => '-'],
            ['item_number' => '15', 'label' => 'Hip Room, Front', 'variant1' => '1,389 mm (54.7")', 'variant2' => '-'],
            ['item_number' => '16', 'label' => 'Hip Room, Rear', 'variant1' => '~865 mm (34") - est.', 'variant2' => '-'],
            
            // Weight
            ['item_number' => '17', 'label' => 'Curb / Tare Weight', 'variant1' => '~1,450–1,500 kg — estimate*', 'variant2' => '-'],
            ['item_number' => '18', 'label' => 'Unladen Mass', 'variant1' => '~1,450–1,500 kg — estimate*', 'variant2' => '-'],
            ['item_number' => '19', 'label' => 'Gross Weight (GVM)', 'variant1' => 'TBC — pending engineering calculation', 'variant2' => '-']
        ];

        foreach ($information as $info) {
            \Illuminate\Support\Facades\DB::table('vehicle_information')->updateOrInsert(
                [
                    'vehicle_id' => $vehicleId,
                    'item_number' => $info['item_number']
                ],
                [
                    'label' => $info['label'],
                    'variant1' => $info['variant1'],
                    'variant2' => $info['variant2'],
                    'updated_at' => now(),
                    // created_at is only set on insert by updateOrInsert if we don't supply it directly, 
                    // but we can manually merge it if we wanted. updateOrInsert doesn't do timestamps automatically for the insert side.
                ]
            );
        }
    }
}
