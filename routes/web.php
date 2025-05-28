<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;


Route::resource('cast', CastController::class);
Route::resource('film', FilmController::class);
Route::resource('genre', GenreController::class);
