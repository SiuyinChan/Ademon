<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        {
            if(DB::table('users')->count() === 0) {
                DB::table('users')->insert([
                    'name' => 'test',
                    'email' => 'test@gmail.com',
                    'phone' => '1234567890',
                    'nickname' => 'test',
                    'password' => Hash::make('password'),
                ]);
            } else {
                echo "Table users is not empty, therefore not seeding.";
            }
        }
    }
}
