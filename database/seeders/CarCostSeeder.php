<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarCostSeeder extends Seeder
{
    /**
     * Inserts the "Cost" summary rows from car.csv that were skipped
     * in the original CarDataSeeder.
     *
     * Each Cost row represents the running total cost for a section.
     * The category_id and component_id are resolved from the carry-forward
     * logic of the CSV (last non-empty category/component before each Cost row).
     *
     * CSV Cost rows (traced with carry-forward):
     *  Row 28  → Shell         / Complete Shell            → $26,737.40
     *  Row 36  → Labour        / Phatt Audio               → $24,810.00
     *  Row 56  → Power Plants  / Sterring Column           → $19,625.86
     *  Row 69  → Suspension    / Front Suspension          → $5,687.00
     *  Row 74  → Brakes        / Twin Master Cylinder      → $2,678.00
     *  Row 78  → Wheels&Tyres  / Tyres                     → $553.24
     *  Row 141 → Interior      / Boot Lock Latch           → $6,495.59
     *  Row 197 → Exterior      / Seals and Weather Strip.  → $2,994.00
     */
    public function run(): void
    {
        // Resolve IDs dynamically so this seeder works regardless of
        // the exact auto-increment values assigned during seeding.
        $catId = fn(string $name) => DB::table('part_categories')
            ->where('category_name', $name)->value('id');

        $compId = fn(string $name, int $categoryId) => DB::table('part_components')
            ->where('component_name', $name)
            ->where('category_id', $categoryId)
            ->value('id');

        $costRows = [
            [
                'category'    => 'Shell',
                'component'   => 'Complete Shell',
                'price'       => '$26,737.40',
            ],
            [
                'category'    => 'Labour',
                'component'   => 'Phatt Audio',       // last component in Labour section
                'price'       => '$24,810.00',
            ],
            [
                'category'    => 'Power Plants',
                'component'   => 'Sterring Column',   // last component in Power Plant section
                'price'       => '$19,625.86',
            ],
            [
                'category'    => 'Suspension',
                'component'   => 'Front Suspension',
                'price'       => '$5,687.00',
            ],
            [
                'category'    => 'Brakes',
                'component'   => 'Twin Master Cylinder',
                'price'       => '$2,678.00',
            ],
            [
                'category'    => 'Wheels & Tyres',
                'component'   => 'Tyres',
                'price'       => '$553.24',
            ],
            [
                'category'    => 'Interior',
                'component'   => 'Boot Lock Latch',   // last component in Interior section
                'price'       => '$6,495.59',
            ],
            [
                'category'    => 'Exterior',
                'component'   => 'Seals and Weather Stripping',
                'price'       => '$2,994.00',
            ],
        ];

        $inserted = 0;
        $skipped  = 0;

        foreach ($costRows as $row) {
            $resolvedCatId  = $catId($row['category']);
            $resolvedCompId = $resolvedCatId ? $compId($row['component'], $resolvedCatId) : null;

            if (!$resolvedCatId || !$resolvedCompId) {
                $this->command->warn(
                    "  ⚠ Skipping Cost row for '{$row['category']} / {$row['component']}' – IDs not found"
                );
                $skipped++;
                continue;
            }

            // Avoid duplicating if already inserted
            $exists = DB::table('parts')
                ->where('category_id',  $resolvedCatId)
                ->where('component_id', $resolvedCompId)
                ->where('description', 'Cost')
                ->exists();

            if ($exists) {
                $this->command->warn("  ⚠ Cost row for '{$row['category']}' already exists – skipping duplicate");
                $skipped++;
                continue;
            }

            DB::table('parts')->insert([
                'category_id'       => $resolvedCatId,
                'component_id'      => $resolvedCompId,
                'description'       => 'Cost',
                'part_number'       => 'N/A',
                'price'             => $row['price'],
                'supplier_id'       => null,
                'upload_part_image' => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

            $this->command->info("  ✔ Inserted Cost row: {$row['category']} → {$row['price']}");
            $inserted++;
        }

        $this->command->info("✔ Cost rows inserted: {$inserted}");
        if ($skipped > 0) {
            $this->command->warn("  ⚠ Cost rows skipped: {$skipped}");
        }

        $this->command->info('🎉 CarCostSeeder completed!');
    }
}
