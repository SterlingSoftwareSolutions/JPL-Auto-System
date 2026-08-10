<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Reads suppliers from car.csv and inserts unique suppliers
     * into the suppliers table.
     */
    public function run(): void
    {
        $csvPath = base_path('car.csv');

        if (!file_exists($csvPath)) {
            $this->command->error('car.csv not found in project root!');
            return;
        }

        $handle = fopen($csvPath, 'r');

        if ($handle === false) {
            $this->command->error('Unable to open car.csv!');
            return;
        }

        $suppliers = [];
        $header = true;

        while (($row = fgetcsv($handle)) !== false) {

            // Skip CSV header
            if ($header) {
                $header = false;
                continue;
            }

            // Make sure the row has at least 6 columns
            while (count($row) < 6) {
                $row[] = '';
            }

            // Supplier is column 6
            $supplier = trim($row[5]);

            // Skip empty suppliers
            if ($supplier === '') {
                continue;
            }

            // Skip possible summary/footer values
            if (
                strtolower($supplier) === 'supplier' ||
                stripos($supplier, 'PROJECT COST') !== false
            ) {
                continue;
            }

            $suppliers[$supplier] = $supplier;
        }

        fclose($handle);

        $inserted = 0;

        foreach ($suppliers as $supplier) {

            $exists = DB::table('suppliers')
                ->where('business_name', $supplier)
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('suppliers')->insert([
                'business_name' => $supplier,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $inserted++;
        }

        $this->command->info(
            "✔ Suppliers inserted: {$inserted}"
        );

        $this->command->info(
            "✔ Unique suppliers found: " . count($suppliers)
        );

        $this->command->info(
            '🎉 SupplierSeeder completed successfully!'
        );
    }
}