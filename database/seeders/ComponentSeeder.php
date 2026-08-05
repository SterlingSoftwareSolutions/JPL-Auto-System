<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            ['component_name' => 'Complete Shell', 'category_id' => 1],
            ['component_name' => 'Fabrication - Kenmer', 'category_id' => 2],
            ['component_name' => 'Fabrication - FabRAIcations', 'category_id' => 2],
            ['component_name' => 'Engine', 'category_id' => 3],
            ['component_name' => 'Transmission', 'category_id' => 3],
            ['component_name' => 'Rear Suspension', 'category_id' => 4],
            ['component_name' => 'Front Suspension', 'category_id' => 4],
            ['component_name' => 'Wheels', 'category_id' => 5],
            ['component_name' => 'Tyres', 'category_id' => 5],
            ['component_name' => 'Switches', 'category_id' => 6],
            ['component_name' => 'Seats', 'category_id' => 6],
            ['component_name' => 'Glass', 'category_id' => 7],
            ['component_name' => 'Seals and Weather Stripping', 'category_id' => 7],
        ];

        foreach ($components as $component) {
            DB::table('part_components')->insert([
                'component_name' => $component['component_name'],
                'category_id' => $component['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
