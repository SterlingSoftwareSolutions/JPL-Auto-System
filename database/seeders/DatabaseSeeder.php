<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SuppliersSeeder;
use Database\Seeders\PartCategoriesSeeder;
use Database\Seeders\PartComponentsSeeder;
use Database\Seeders\PartsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SuppliersSeeder::class,
            PartCategoriesSeeder::class,
            PartComponentsSeeder::class,
            PartsSeeder::class,
        ]);
    }
}
