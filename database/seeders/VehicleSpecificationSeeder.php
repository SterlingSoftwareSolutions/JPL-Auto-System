<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Engine' => [
                ['description' => 'Ford 5.0L "Coyote" naturally aspirated V8 engine', 'value' => null],
                ['description' => '6-speed transmission - automatic or manual, to customer specification', 'value' => null],
                ['description' => 'Haltech programmable engine management system (ECU) for precision tuning and diagnostics', 'value' => null],
            ],
            'Exterior' => [
                ['description' => 'Length', 'value' => '4,613 mm (181.6")'],
                ['description' => 'Width', 'value' => '~1,801 mm (70.9")'],
                ['description' => 'Track, Front', 'value' => '1,476 mm (58.1" — V8 spec)'],
                ['description' => 'Track, Rear', 'value' => '1,476 mm (58.1" — V8 spec)'],
                ['description' => 'Wheel Base', 'value' => '2,743 mm (108.0")'],
                ['description' => 'Overhang, Front + Rear (combined)', 'value' => '~1,869 mm total (Length – Wheelbase)'],
            ],
            'Interior' => [
                ['description' => 'Head Room, Front', 'value' => '950 mm (37.4")'],
                ['description' => 'Head Room, Rear', 'value' => '~875 mm (34.4") - est.'],
                ['description' => 'Hip Room, Front', 'value' => '1,389 mm (54.7")'],
                ['description' => 'Hip Room, Rear', 'value' => '~865 mm (34") - est.'],
            ],
            'Weight' => [
                ['description' => 'Curb / Tare Weight', 'value' => '~1,450–1,500 kg — estimate*'],
                ['description' => 'Unladen Mass', 'value' => '~1,450–1,500 kg — estimate*'],
                ['description' => 'Gross Weight (GVM)', 'value' => 'TBC — pending engineering calculation'],
            ],
            'Features' => [
                ['description' => 'Vintage Air climate control system', 'value' => null],
                ['description' => 'Push-button start and keyless entry', 'value' => null],
            ],
            'Safety' => [
                ['description' => '4-wheel Wilwood disc brakes with hydroboost', 'value' => null],
                ['description' => 'Integrated 6-point roll cage', 'value' => null],
            ],
            'Other' => [
                ['description' => 'Fully adjustable coilover suspension', 'value' => null],
                ['description' => 'Custom stainless steel dual exhaust system', 'value' => null],
            ],
        ];

        foreach ($categories as $categoryName => $specs) {
            $categoryId = \Illuminate\Support\Facades\DB::table('specification_categories')->insertGetId([
                'name' => $categoryName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($specs as $spec) {
                \Illuminate\Support\Facades\DB::table('vehicle_specifications')->insert([
                    'category_id' => $categoryId,
                    'description' => $spec['description'],
                    'value' => $spec['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
