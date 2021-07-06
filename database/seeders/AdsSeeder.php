<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            if (DB::table('ads')->count() === 0) {
                DB::table('ads')->insert([
                        [
                            'title' => 'Ralph Lauren Bob',
                            'category_id' => 1,
                            'user_id' => 1,
                            'description' => 'Ralph Lauren\'s signature embroidered Pony accents the front of this cotton chino bucket hat.',
                            'price' => '50€',
                            'image' => json_encode(['testImage1.jpeg']),
                            'condition' => 'Very good',
                            'city' => 'Berlin',
                        ],
                        [
                            'title' => 'Patagonia Retro Pile Fleece Jacket',
                            'category_id' => 2,
                            'user_id' => 1,
                            'description' => 'Made with 100% recycled polyester double-sided shearling fleece.',
                            'price' => '100€',
                            'image' => json_encode(['testImage2.jpeg']),
                            'condition' => 'Good',
                            'city' => 'Lyon',
                        ],
                        [
                            'title' => 'Herman Miller Lounge Chair',
                            'category_id' => 3,
                            'user_id' => 1,
                            'description' => 'High back, relaxed pitch, and comes with its own pillowy headrest.',
                            'price' => '2995€',
                            'image' => json_encode(['testImage3.jpeg']),
                            'condition' => 'Good',
                            'city' => 'London',
                        ],
                        [
                            'title' => 'Tesla Model X',
                            'category_id' => 4,
                            'user_id' => 1,
                            'description' => 'The highest performing SUV ever built',
                            'price' => '104,490€',
                            'image' => json_encode(['testImage4.jpeg']),
                            'condition' => 'Very good',
                            'city' => 'New York',
                        ],
                    ]
                );
            } else {
                echo "Table ads is not empty, therefore not seeding.";
            }
        }
    }
}
