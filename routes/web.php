<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MovieController;

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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware([ 'auth' ])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [ListController::class, 'show'])->name('dashboard');
        Route::post('/{imdbID}', [ListController::class, 'markAsViewed'])->name('dashboard');
    });

    Route::prefix('/search')->group(function () {
        Route::get('/', [SearchController::class, 'show'])->name('search');
        Route::post('/', [SearchController::class, 'search'])->name('search');
    });

    Route::prefix('/movie')->group(function () {
        Route::post('/get', [MovieController::class, 'getUserList']);
        // Route::post('/get/{id}', [MovieController::class, 'read']); für später = gesamte übersicht über den film mit allen daten
        Route::post('/store', [MovieController::class, 'create']);
    });
});
