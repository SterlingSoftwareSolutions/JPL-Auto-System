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
     *  1. part_categories  – adds Shell & Brakes (new), keeps existing ones
     *  2. part_components  – adds every component found in CSV
     *  3. parts            – adds every part row (skips Cost/total/empty rows)
     *
     * Rules applied:
     *  - Empty Category / Component cells inherit the value from the row above
     *    (carry-forward / fill-down logic).
     *  - "Cost", "PROJECT COST TO DATE" and blank rows are skipped.
     *  - Paid & Estimates columns are ignored (no DB columns for them).
     *  - supplier stored as plain text; upload_part_image left null.
     *  - price stored as raw string (e.g. " $139.00 ").
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
            'Brakes',          // new – not in CategorySeeder
            'Wheels & Tyres',
            'Interior',
            'Exterior',
            'Shell',           // new – mapped from CSV "Shell"
        ];

        foreach ($requiredCategories as $name) {
            DB::table('part_categories')->updateOrInsert(
                ['category_name' => $name],
                ['category_name' => $name, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        // Build a lookup map: category_name => id
        $categoryMap = DB::table('part_categories')
            ->pluck('id', 'category_name')
            ->toArray();

        $this->command->info('✔ Categories ready (' . count($categoryMap) . ' total)');

        // ------------------------------------------------------------------ //
        // STEP 2 – Parse CSV and collect unique components per category
        // ------------------------------------------------------------------ //

        /**
         * Normalise the raw "category" value from the CSV header rows
         * like "Power Plant (Budget $15,000)" => "Power Plants"
         */
        $normaliseCategoryName = function (string $raw): string {
            $raw = trim($raw);
            $map = [
                'Shell'      => 'Shell',
                'Labour'     => 'Labour',
                'Parts'      => null,   // generic header – skip
                'Power Plant' => 'Power Plants',
                'Suspension' => 'Suspension',
                'Brakes'     => 'Brakes',
                'Wheels'     => 'Wheels & Tyres',
                'Interior'   => 'Interior',
                'Exterior'   => 'Exterior',
            ];

            foreach ($map as $keyword => $resolved) {
                if (stripos($raw, $keyword) !== false) {
                    return $resolved ?? '';
                }
            }

            return $raw;
        };

        // Read CSV
        $handle = fopen($csvPath, 'r');
        $rows   = [];
        $header = true;

        while (($line = fgetcsv($handle)) !== false) {
            if ($header) { $header = false; continue; } // skip header row
            $rows[] = $line;
        }
        fclose($handle);

        // Carry-forward pass – fill empty Category & Component cells
        $lastCategory  = '';
        $lastComponent = '';

        $parsedRows = [];

        foreach ($rows as $row) {
            // Pad row to at least 9 columns
            while (count($row) < 9) {
                $row[] = '';
            }

            [$rawCategory, $rawComponent, $description, $partNumber, $price, $supplier] = $row;

            $rawCategory  = trim($rawCategory);
            $rawComponent = trim($rawComponent);
            $description  = trim($description);
            $partNumber   = trim($partNumber);
            $price        = trim($price);
            $supplier     = trim($supplier);

            // Normalise category name from CSV budget-header rows
            $normCategory = $rawCategory !== '' ? $normaliseCategoryName($rawCategory) : '';

            // Carry-forward
            if ($normCategory !== '') {
                $lastCategory = $normCategory;
            }
            if ($rawComponent !== '') {
                $lastComponent = $rawComponent;
            }

            // ---- Skip rows that are not real parts ----

            // Skip blank description rows
            if ($description === '') {
                continue;
            }

            // Skip "Cost" summary rows
            if (strtolower($description) === 'cost') {
                continue;
            }

            // Skip "PROJECT COST TO DATE" footer
            if (stripos($description, 'PROJECT COST') !== false) {
                continue;
            }

            // Skip rows that have no resolved category yet
            if ($lastCategory === '') {
                continue;
            }

            $parsedRows[] = [
                'category'    => $lastCategory,
                'component'   => $lastComponent,
                'description' => $description,
                'part_number' => $partNumber,
                'price'       => $price,
                'supplier'    => $supplier,
            ];
        }

        // ------------------------------------------------------------------ //
        // STEP 3 – Collect unique components and insert into part_components
        // ------------------------------------------------------------------ //

        // Gather unique (category, component) pairs
        $uniqueComponents = [];
        foreach ($parsedRows as $r) {
            $key = $r['category'] . '|||' . $r['component'];
            if ($r['component'] !== '' && !isset($uniqueComponents[$key])) {
                $uniqueComponents[$key] = [
                    'category'  => $r['category'],
                    'component' => $r['component'],
                ];
            }
        }

        foreach ($uniqueComponents as $uc) {
            $catId = $categoryMap[$uc['category']] ?? null;

            if ($catId === null) {
                $this->command->warn("  ⚠ Unknown category '{$uc['category']}' for component '{$uc['component']}' – skipping");
                continue;
            }

            DB::table('part_components')->updateOrInsert(
                [
                    'component_name' => $uc['component'],
                    'category_id'    => $catId,
                ],
                [
                    'component_name' => $uc['component'],
                    'category_id'    => $catId,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]
            );
        }

        // Rebuild component lookup: "component_name|||category_id" => id
        $componentRows = DB::table('part_components')->get();
        $componentMap  = [];
        foreach ($componentRows as $cr) {
            $componentMap[$cr->component_name . '|||' . $cr->category_id] = $cr->id;
        }

        $this->command->info('✔ Components ready (' . count($componentMap) . ' total)');

        // ------------------------------------------------------------------ //
        // STEP 4 – Insert parts
        // ------------------------------------------------------------------ //

        $inserted = 0;
        $skipped  = 0;

        foreach ($parsedRows as $r) {
            $catId = $categoryMap[$r['category']] ?? null;

            if ($catId === null) {
                $this->command->warn("  ⚠ Skipping part '{$r['description']}' – category '{$r['category']}' not found");
                $skipped++;
                continue;
            }

            $compKey = $r['component'] . '|||' . $catId;
            $compId  = $componentMap[$compKey] ?? null;

            if ($compId === null) {
                $this->command->warn("  ⚠ Skipping part '{$r['description']}' – component '{$r['component']}' not found for category '{$r['category']}'");
                $skipped++;
                continue;
            }

            DB::table('parts')->insert([
                'category_id'       => $catId,
                'component_id'      => $compId,
                'description'       => $r['description'],
                'part_number'       => $r['part_number'] ?: 'N/A',
                'price'             => $r['price'] ?: '0',
                'supplier'          => $r['supplier'] ?: 'N/A',
                'upload_part_image' => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

            $inserted++;
        }

        $this->command->info("✔ Parts inserted: {$inserted}");
        if ($skipped > 0) {
            $this->command->warn("  ⚠ Parts skipped: {$skipped}");
        }

        $this->command->info('🎉 CarDataSeeder completed successfully!');
    }
}
