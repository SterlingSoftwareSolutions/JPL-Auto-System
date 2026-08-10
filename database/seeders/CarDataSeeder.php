<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Reads car.csv from the project root and seeds:
     *  1. part_categories
     *  2. part_components
     *  3. parts
     *
     * Supplier handling:
     *  - Supplier names are read from the Supplier column.
     *  - Supplier ID is resolved from the suppliers table.
     *  - If a part has no supplier, supplier_id is NULL.
     *  - If a supplier name does not exist in suppliers table,
     *    supplier_id is NULL and a warning is displayed.
     */
    public function run(): void
    {
        $csvPath = base_path('car.csv');

        if (!file_exists($csvPath)) {
            $this->command->error('car.csv not found in project root!');
            return;
        }

        // ------------------------------------------------------------------ //
        // STEP 1 – Ensure all required categories exist
        // ------------------------------------------------------------------ //

        $requiredCategories = [
            'Body',
            'Labour',
            'Power Plants',
            'Suspension',
            'Brakes',
            'Wheels & Tyres',
            'Interior',
            'Exterior',
            'Shell',
        ];

        foreach ($requiredCategories as $name) {
            DB::table('part_categories')->updateOrInsert(
                [
                    'category_name' => $name,
                ],
                [
                    'category_name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Build category lookup
        // category_name => id
        $categoryMap = DB::table('part_categories')
            ->pluck('id', 'category_name')
            ->toArray();

        $this->command->info(
            '✔ Categories ready (' . count($categoryMap) . ' total)'
        );

        // ------------------------------------------------------------------ //
        // STEP 2 – Category normalisation
        // ------------------------------------------------------------------ //

        $normaliseCategoryName = function (string $raw): string {
            $raw = trim($raw);

            $map = [
                'Shell' => 'Shell',
                'Labour' => 'Labour',
                'Parts' => null,
                'Power Plant' => 'Power Plants',
                'Suspension' => 'Suspension',
                'Brakes' => 'Brakes',
                'Wheels' => 'Wheels & Tyres',
                'Interior' => 'Interior',
                'Exterior' => 'Exterior',
            ];

            foreach ($map as $keyword => $resolved) {
                if (stripos($raw, $keyword) !== false) {
                    return $resolved ?? '';
                }
            }

            return $raw;
        };

        // ------------------------------------------------------------------ //
        // STEP 3 – Read CSV
        // ------------------------------------------------------------------ //

        $handle = fopen($csvPath, 'r');

        if ($handle === false) {
            $this->command->error('Unable to open car.csv!');
            return;
        }

        $rows = [];
        $header = true;

        while (($line = fgetcsv($handle)) !== false) {

            // Skip CSV header
            if ($header) {
                $header = false;
                continue;
            }

            $rows[] = $line;
        }

        fclose($handle);

        // ------------------------------------------------------------------ //
        // STEP 4 – Parse CSV with carry-forward logic
        // ------------------------------------------------------------------ //

        $lastCategory = '';
        $lastComponent = '';

        $parsedRows = [];

        foreach ($rows as $row) {

            // Make sure row has at least 9 columns
            while (count($row) < 9) {
                $row[] = '';
            }

            [
                $rawCategory,
                $rawComponent,
                $description,
                $partNumber,
                $price,
                $supplier
            ] = $row;

            $rawCategory = trim($rawCategory);
            $rawComponent = trim($rawComponent);
            $description = trim($description);
            $partNumber = trim($partNumber);
            $price = trim($price);
            $supplier = trim($supplier);

            // Normalise category
            $normCategory = '';

            if ($rawCategory !== '') {
                $normCategory = $normaliseCategoryName($rawCategory);
            }

            // Carry forward category
            if ($normCategory !== '') {
                $lastCategory = $normCategory;
            }

            // Carry forward component
            if ($rawComponent !== '') {
                $lastComponent = $rawComponent;
            }

            // -------------------------------------------------------------- //
            // Skip invalid rows
            // -------------------------------------------------------------- //

            // Skip blank description rows
            if ($description === '') {
                continue;
            }

            // Skip Cost rows
            if (strtolower($description) === 'cost') {
                continue;
            }

            // Skip PROJECT COST TO DATE
            if (stripos($description, 'PROJECT COST') !== false) {
                continue;
            }

            // Skip rows before category is identified
            if ($lastCategory === '') {
                continue;
            }

            // -------------------------------------------------------------- //
            // Add parsed row
            // -------------------------------------------------------------- //

            $parsedRows[] = [
                'category' => $lastCategory,
                'component' => $lastComponent,
                'description' => $description,
                'part_number' => $partNumber,
                'price' => $price,
                'supplier' => $supplier,
            ];
        }

        $this->command->info(
            '✔ CSV rows parsed: ' . count($parsedRows)
        );

        // ------------------------------------------------------------------ //
        // STEP 5 – Collect unique components
        // ------------------------------------------------------------------ //

        $uniqueComponents = [];

        foreach ($parsedRows as $r) {

            $key = $r['category'] . '|||' . $r['component'];

            if (
                $r['component'] !== '' &&
                !isset($uniqueComponents[$key])
            ) {
                $uniqueComponents[$key] = [
                    'category' => $r['category'],
                    'component' => $r['component'],
                ];
            }
        }

        // ------------------------------------------------------------------ //
        // STEP 6 – Insert components
        // ------------------------------------------------------------------ //

        foreach ($uniqueComponents as $uc) {

            $catId = $categoryMap[$uc['category']] ?? null;

            if ($catId === null) {

                $this->command->warn(
                    "⚠ Unknown category '{$uc['category']}' " .
                    "for component '{$uc['component']}' – skipping"
                );

                continue;
            }

            DB::table('part_components')->updateOrInsert(
                [
                    'component_name' => $uc['component'],
                    'category_id' => $catId,
                ],
                [
                    'component_name' => $uc['component'],
                    'category_id' => $catId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // ------------------------------------------------------------------ //
        // STEP 7 – Build component lookup
        // ------------------------------------------------------------------ //

        $componentRows = DB::table('part_components')->get();

        $componentMap = [];

        foreach ($componentRows as $cr) {

            $componentMap[
                $cr->component_name . '|||' . $cr->category_id
            ] = $cr->id;
        }

        $this->command->info(
            '✔ Components ready (' . count($componentMap) . ' total)'
        );

        // ------------------------------------------------------------------ //
        // STEP 8 – Build supplier lookup
        // ------------------------------------------------------------------ //

        /**
         * Supplier lookup:
         *
         * business_name => supplier_id
         */
        $supplierMap = [];

        $suppliers = DB::table('suppliers')->get();

        foreach ($suppliers as $supplier) {

            $supplierName = strtolower(trim($supplier->business_name));

            if ($supplierName !== '') {
                $supplierMap[$supplierName] = $supplier->id;
            }
        }

        $this->command->info(
            '✔ Suppliers available (' . count($supplierMap) . ' total)'
        );

        // ------------------------------------------------------------------ //
        // STEP 9 – Insert parts
        // ------------------------------------------------------------------ //

        $inserted = 0;
        $skipped = 0;
        $noSupplier = 0;
        $missingSupplier = 0;

        foreach ($parsedRows as $r) {

            // -------------------------------------------------------------- //
            // Category
            // -------------------------------------------------------------- //

            $catId = $categoryMap[$r['category']] ?? null;

            if ($catId === null) {

                $this->command->warn(
                    "⚠ Skipping part '{$r['description']}' – " .
                    "category '{$r['category']}' not found"
                );

                $skipped++;

                continue;
            }

            // -------------------------------------------------------------- //
            // Component
            // -------------------------------------------------------------- //

            $compKey = $r['component'] . '|||' . $catId;

            $compId = $componentMap[$compKey] ?? null;

            if ($compId === null) {

                $this->command->warn(
                    "⚠ Skipping part '{$r['description']}' – " .
                    "component '{$r['component']}' not found for " .
                    "category '{$r['category']}'"
                );

                $skipped++;

                continue;
            }

            // -------------------------------------------------------------- //
            // Supplier
            // -------------------------------------------------------------- //

            $supplierId = null;

            if ($r['supplier'] !== '') {

                $supplierName = strtolower(trim($r['supplier']));

                $supplierId = $supplierMap[$supplierName] ?? null;

                if ($supplierId === null) {

                    $this->command->warn(
                        "⚠ Supplier '{$r['supplier']}' not found " .
                        "for part '{$r['description']}'"
                    );

                    $missingSupplier++;
                }

            } else {

                $noSupplier++;
            }

            // -------------------------------------------------------------- //
            // Insert part
            // -------------------------------------------------------------- //

            DB::table('parts')->insert([
                'category_id' => $catId,
                'component_id' => $compId,
                'supplier_id' => $supplierId,
                'description' => $r['description'],
                'part_number' => $r['part_number'] ?: 'N/A',
                'price' => $r['price'] ?: '0',
                'upload_part_image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $inserted++;
        }

        // ------------------------------------------------------------------ //
        // STEP 10 – Summary
        // ------------------------------------------------------------------ //

        $this->command->info('');
        $this->command->info('==========================================');
        $this->command->info('        CarDataSeeder Summary');
        $this->command->info('==========================================');

        $this->command->info(
            "✔ Parts inserted: {$inserted}"
        );

        $this->command->info(
            "✔ Parts without supplier: {$noSupplier}"
        );

        $this->command->info(
            "✔ Parts with missing supplier record: {$missingSupplier}"
        );

        if ($skipped > 0) {
            $this->command->warn(
                "⚠ Parts skipped: {$skipped}"
            );
        }

        $this->command->info(
            '🎉 CarDataSeeder completed successfully!'
        );
    }
}