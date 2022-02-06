<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\TvShowController;
use App\Http\Controllers\Admin\EpisodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() {
        return Inertia::render('Admin/Index');
    })->name('index');

    Route::resource('movies', MovieController::class);
    Route::resource('tv-shows', TvShowController::class);
    Route::resource('tv-shows/{tv-show}/seasons', SeasonController::class);
    Route::resource('tv-shows/{tv-show}/seasons/{tv-show}/episodes', EpisodeController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('casts', CastController::class);
    Route::resource('tags', TagController::class);
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
