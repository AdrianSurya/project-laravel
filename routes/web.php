<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeranController;


Route::resource('cast', CastController::class);
Route::resource('film', FilmController::class);
Route::resource('genre', GenreController::class);
Route::resource('peran', PeranController::class);
Route::get('/film/{film}', [FilmController::class, 'show'])->name('film.show');

