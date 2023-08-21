<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriteOffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('layouts.main-dashboard');
})->middleware(['auth', 'verified', 'prevent.back.history'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('city', CityController::class);
        Route::resource('facility', FacilityController::class);
    });

    Route::middleware(['role:user'])->group(function () {
        Route::resource('asset', AssetController::class);
        Route::resource('inventory', InventoryController::class);
        Route::resource('lending', LendingController::class);

        Route::get('/writeoff', [WriteOffController::class, 'index'])->name('writeoff.index');
    });
});


//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


require __DIR__ . '/auth.php';
