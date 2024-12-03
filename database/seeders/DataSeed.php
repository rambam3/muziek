<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Band;
use App\Models\Album;
use App\Models\Song;




class DataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RollingStones = Band::create([
            'name' => 'The Rolling Stones',
            'genre' => 'Rock',
            'founded' => 1962,
            'active_till' => 'heden'
        ]);
        $LinkinPark = Band::create([
            'name' => 'Linkin Park',
            'genre' => 'Rock',
            'founded' => 1996,
            'active_till' => 2017
        ]);
        $Metallica = Band::create([
            'name' => 'Metallica',
            'genre' => 'Metal',
            'founded' => 1981,
            'active_till' => 'heden'
        ]);
        $Queen = Band::create([
            'name' => 'Queen',
            'genre' => 'Rock',
            'founded' => 1970,
            'active_till' => 1991
        ]);
        $Nirvana = Band::create([
            'name' => 'Nirvana',
            'genre' => 'Rock',
            'founded' => 1987,
            'active_till' => 1994
        ]);
        $MasterOfPuppets = Album::create([
            'name' => 'Master of Puppets',
            'year' => 1986,
            'times_sold' => 1000000,
            'band_id' => $Metallica->id
        ]);
        $InUtero = Album::create([
            'name' => 'In Utero',
            'year' => 1993,
            'times_sold' => 500000,
            'band_id' => $Nirvana->id
        ]);
        $HybridTheory = Album::create([
            'name' => 'Hybrid Theory',
            'year' => 2000,
            'times_sold' => 10000000,
            'band_id' => $LinkinPark->id
        ]);
        $AKindOfMagic = Album::create([
            'name' => 'A Kind of Magic',
            'year' => 1986,
            'times_sold' => 5000000,
            'band_id' => $Queen->id
        ]);
        $StickyFingers = Album::create([
            'name' => 'Sticky Fingers',
            'year' => 1971,
            'times_sold' => 5000000,
            'band_id' => $RollingStones->id
        ]);
        $MasterOfPuppets = Song::create([
            'title' => 'Master of Puppets',
            'singer' => 'James Hetfield'
        ]);
        $Battery = Song::create([
            'title' => 'Battery',
            'singer' => 'James Hetfield'
        ]);
        $TheUnforgiven = Song::create([
            'title' => 'The Unforgiven',
            'singer' => 'James Hetfield'
        ]);
        $EnterSandman = Song::create([
            'title' => 'Enter Sandman',
            'singer' => 'James Hetfield'
        ]);
        $SmellsLikeTeenSpirit = Song::create([
            'title' => 'Smells Like Teen Spirit',
            'singer' => 'Kurt Cobain'
        ]);
        $ComeAsYouAre = Song::create([
            'title' => 'Come As You Are',
            'singer' => 'Kurt Cobain'
        ]);

    }
}
