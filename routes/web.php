<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/{index}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{index}/edit', [SongController::class, 'edit'])->name('songs.edit');
