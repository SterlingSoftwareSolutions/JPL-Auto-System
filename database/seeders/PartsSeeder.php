<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartsImport;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the parts table before import
        DB::table('parts')->truncate();

        // Path to the Excel file (relative to the project root)
        $excelPath = database_path('seeders/data/car.xlsx');

        // Import parts – the PartsImport class maps rows to Part models.
        Excel::import(new PartsImport, $excelPath);
    }
}
