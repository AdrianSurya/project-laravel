<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'login')->name('login.login');
    Route::post('authenticate', 'authenticate')->name('login.authenticate');
    Route::post('logout', 'logout')->name('login.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/user', 'user')->name('dashboard.user');
    Route::post('/dashboard/admin', 'admin')->name('dashboard.admin');
});




Route::resource('cast', CastController::class);
Route::resource('film', FilmController::class);
Route::resource('genre', GenreController::class);
Route::get('/film/{film}', [FilmController::class, 'show'])->name('film.show');

Route::post('/film/{film}/peran', [PeranController::class, 'create'])->name('peran.store');
Route::get('/film/peran/store/{id}', [PeranController::class, 'index'])->name('peran.create');

