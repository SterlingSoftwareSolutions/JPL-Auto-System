<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartCategoriesImport;

class PartCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table before import
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('part_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $excelPath = database_path('seeders/data/car.xlsx');

        // Import categories – the PartCategoriesImport class extracts the category name.
        Excel::import(new PartCategoriesImport, $excelPath);
    }
}
