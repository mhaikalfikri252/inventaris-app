<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
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

    // Route::controller(FacilityController::class)->prefix('facility')->group(function () {
    //     Route::get('', 'index')->name('facility.index');
    //     Route::get('create', 'create')->name('facility.create');
    //     Route::post('store', 'store')->name('facility.store');
    //     Route::get('edit/{id}', 'edit')->name('facility.update');
    //     Route::get('destroy/{id}', 'destroy')->name('facility.destroy');
    // });

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('city', CityController::class);
        Route::resource('facility', FacilityController::class);
    });

    Route::middleware(['role:user'])->group(function () {
        Route::resource('aset', AsetController::class);
    });
});


//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


require __DIR__ . '/auth.php';
