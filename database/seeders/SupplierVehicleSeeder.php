<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($supplierId = 2; $supplierId <= 23; $supplierId++) {
            $data[] = [
                'supplier_id' => $supplierId,
                'vehicle_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('supplier_vehicle')->insert($data);
    }
}