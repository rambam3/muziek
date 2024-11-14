<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AlbumsTableSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albums')->insert([[
            'name' => 'Abbey Road',
            'year' => 1969,
            'times_sold' => 12
        ],
        [
            'name' => 'Let It Bleed',
            'year' => 1969,
            'times_sold' => 10
        ],
        [
            'name' => 'Pet Sounds',
            'year' => 1966,
            'times_sold' => 8
        ],
        [
            'name' => 'The Dark Side of the Moon',
            'year' => 1973,
            'times_sold' => 15
        ],
        [
            'name' => 'The White Album',
            'year' => 1968,
            'times_sold' => 14
        ]
    ]);
    }
}
