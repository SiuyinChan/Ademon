<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if(DB::table('categories')->count() === 0) {
            DB::table('categories')->insert([
                ['name' => 'Accessories',],
                ['name' => 'Clothes',],
                ['name' => 'Home',],
                ['name' => 'Vehicles',],
            ]);
        } else {
            echo "Table categories is not empty, therefore not seeding.";
        }
    }
}
