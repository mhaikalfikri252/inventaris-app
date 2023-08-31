<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;
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

    Route::middleware(['role:admin'])->group(function () {

        Route::get('/city/{id}/asset', [ReportController::class, 'index_asset'])->name('report.asset.index');
        Route::get('/city/{id}/writeoff', [ReportController::class, 'index_writeoff'])->name('report.writeoff.index');
        Route::get('/city/{id}/inventory', [ReportController::class, 'index_inventory'])->name('report.inventory.index');
        Route::get('/city/{id}/lending', [ReportController::class, 'index_lending'])->name('report.lending.index');

        Route::get('/asset/{id}/show', [ReportController::class, 'show_asset'])->name('report.asset.show');
        Route::get('/inventory/{id}/show', [ReportController::class, 'show_inventory'])->name('report.inventory.show');
        Route::get('/lending/{id}/show', [ReportController::class, 'show_lending'])->name('report.lending.show');

        Route::delete('/asset/{id}/destroy', [ReportController::class, 'destroy_asset'])->name('report.asset.destroy');
        Route::delete('/inventory/{id}/destroy', [ReportController::class, 'destroy_inventory'])->name('report.inventory.destroy');
        Route::delete('/lending/{id}/destroy', [ReportController::class, 'destroy_lending'])->name('report.lending.destroy');

        Route::resource('city', CityController::class);
        Route::resource('facility', FacilityController::class);
        Route::resource('user', UserController::class);
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('/writeoff', [WriteOffController::class, 'index'])->name('writeoff.index');

        Route::resource('asset', AssetController::class);
        Route::resource('inventory', InventoryController::class);
        Route::resource('lending', LendingController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

require __DIR__ . '/auth.php';
