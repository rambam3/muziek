<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Route::get('/songs/create', [SongController::class, 'create'])->name('create');
// Route::get('/songs', [SongController::class, 'index'])->name('index');
// Route::get('/songs/{index}', [SongController::class, 'show'])->name('show');
// Route::get('/songs/{index}/edit', [SongController::class, 'edit'])->name('edit');
// Route::post('/songs', [SongController::class, 'store'])->name('store');

Route::resource('songs', SongController::class);
Route::resource('bands', BandController::class);
Route::resource('albums', AlbumController::class);

