<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartComponentsImport;

class PartComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table before import
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('part_components')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Path to the Excel file (relative to the project root)
        $excelPath = database_path('seeders/data/car.xlsx');

        // Import part components – the PartComponentsImport class extracts the component name.
        Excel::import(new PartComponentsImport, $excelPath);
    }
}
