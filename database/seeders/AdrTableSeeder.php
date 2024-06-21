<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adr')->insert([
            [
                'adrtext' => '01/00',
                'title' => 'Reversing Lamps',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '02/01',
                'title' => 'Side Door Latches and Hinges',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '03/04',
                'title' => 'Seats and Seat Anchorages',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '03/04',
                'title' => 'Seats and Seat Anchorages',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '04/06',
                'title' => 'Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '04/06',
                'title' => 'Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '04/06',
                'title' => 'Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '05/06',
                'title' => 'Anchorages for Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '05/06',
                'title' => 'Anchorages for Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '05/06',
                'title' => 'Anchorages for Seatbelts',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '06/00',
                'title' => 'Direction Indicators',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '06/00',
                'title' => 'Direction Indicators',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adrtext' => '06/00',
                'title' => 'Direction Indicators',
                'compliancetext' => 'Full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
