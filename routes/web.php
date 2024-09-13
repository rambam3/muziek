<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/songs/create', [SongController::class, 'create'])->name('create');
Route::get('/songs', [SongController::class, 'index'])->name('index');
Route::get('/songs/{index}', [SongController::class, 'show'])->name('show');
Route::get('/songs/{index}/edit', [SongController::class, 'edit'])->name('edit');
