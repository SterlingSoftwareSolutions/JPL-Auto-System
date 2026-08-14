<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure vehicle with ID = 1 exists
        if (!DB::table('vehicles')->where('id', 1)->exists()) {
            DB::table('vehicles')->insert([
                'id' => 1,
                'name' => 'Default Vehicle',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('vehicle_specifications')
            ->whereNull('vehicle_id')
            ->update(['vehicle_id' => 1]);

        DB::table('supplier_vehicle')
            ->whereNull('vehicle_id')
            ->update(['vehicle_id' => 1]);

        DB::table('vehicle_information')
            ->whereNull('vehicle_id')
            ->update(['vehicle_id' => 1]);
            

        DB::table('parts')
            ->whereNull('vehicle_id')
            ->update(['vehicle_id' => 1]);
    }
}