<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SuppliersImport;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table before import
        DB::table('suppliers')->truncate();

        // Path to the Excel file (relative to the project root)
        $excelPath = database_path('seeders/data/car.xlsx');

        // Import suppliers – the SuppliersImport class extracts the supplier name.
        Excel::import(new SuppliersImport, $excelPath);
    }
}
