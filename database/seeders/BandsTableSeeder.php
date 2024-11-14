<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bands')->insert([[
            'name' => 'The Beatles',
            'genre' => 'Rock',
            'founded' => 1960,
            'active_till' => 1970,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'The Rolling Stones',
            'genre' => 'Rock',
            'founded' => 1962,
            'active_till' => 'heden',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'The Beach',
            'genre' => 'Rock',
            'founded' => 1961,
            'active_till' => 1966,
            'created_at' => now(),
            'updated_at' => now()
        ],
    ]);
    }
}
