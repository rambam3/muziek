<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            [
                'title' => 'motion',
                'singer' => 'sleepy hallow',
            ],
            [
                'title' => 'N.Y State of Mind',
                'singer' => 'Nas',
            ],
            [
                'title' => 'no suburban',
                'singer' => 'sheff g',
            ],
            [
                'title' => 'shibuya',
                'singer' => 'ski mask the slump god',
            ],
            [
                'title' => 'hot one',
                'singer' => 'denzel curry',
            ]
        ]);

    }
}
