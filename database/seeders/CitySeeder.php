<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if(DB::table('cities')->count() === 0) {
            DB::table('cities')->insert([
                ['city_name' => 'Berlin',],
                ['city_name' => 'Lyon',],
                ['city_name' => 'London',],
                ['city_name' => 'New York',],
            ]);
        } else {
            echo "Table cities is not empty, therefore not seeding.";
        }
    }
}
