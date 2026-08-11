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
        $information = [
            [
                'item_number' => '1',
                'label' => 'Vehicle Make',
                'variant1' => 'FORD',
            ],
            [
                'item_number' => '2',
                'label' => 'Vehicle Model',
                'variant1' => 'MUSTANG',
            ],
            [
                'item_number' => '3',
                'label' => 'Body Shape (NSW Body Code/Shape)',
                'variant1' => 'COUPE',
            ],
            [
                'item_number' => '4',
                'label' => 'Number of Side Doors',
                'variant1' => '2',
            ],
            [
                'item_number' => '5',
                'label' => 'Number of Rear Doors',
                'variant1' => '0',
            ],
            [
                'item_number' => '6',
                'label' => 'Vehicle Category',
                'variant1' => 'MA (passenger car — 2-door coupé)',
            ],
        ];

        foreach ($information as $info) {
            \Illuminate\Support\Facades\DB::table('vehicle_information')->insert([
                'item_number' => $info['item_number'],
                'label' => $info['label'],
                'variant1' => $info['variant1'],
                'variant2' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
