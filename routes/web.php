<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BorrowController;
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
    return view('auth/landing-page');
});

Route::get('/login', function () {
    return view('auth/login')->name('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'prevent.back.history'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:Admin'])->group(function () {

        Route::get('/admin/asset', [ReportController::class, 'index_asset'])->name('admin.asset.index');
        Route::get('/admin/writeoff', [ReportController::class, 'index_writeoff'])->name('admin.writeoff.index');
        Route::get('/admin/inventory', [ReportController::class, 'index_inventory'])->name('admin.inventory.index');
        Route::get('/admin/borrow', [ReportController::class, 'index_borrow'])->name('admin.borrow.index');

        Route::delete('/admin/asset/{id}', [ReportController::class, 'destroy_asset'])->name('admin.asset.destroy');
        Route::delete('/admin/inventory/{id}', [ReportController::class, 'destroy_inventory'])->name('admin.inventory.destroy');
        Route::delete('/admin/borrow/{id}', [ReportController::class, 'destroy_borrow'])->name('admin.borrow.destroy');

        Route::resource('city', CityController::class);
        Route::resource('facility', FacilityController::class);
        Route::resource('user', UserController::class);
    });

    Route::middleware(['role:User'])->group(function () {
        Route::get('/writeoff', [WriteOffController::class, 'index'])->name('writeoff.index');

        Route::resource('asset', AssetController::class);
        Route::resource('inventory', InventoryController::class);
        Route::resource('borrow', BorrowController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('print/asset/qrcode/{id}', [AssetController::class, 'print_asset_qrcode'])->name('print.asset.qrcode');
Route::get('print/inventory/qrcode/{id}', [InventoryController::class, 'print_inventory_qrcode'])->name('print.inventory.qrcode');
Route::get('print/borrow/letter/{id}', [BorrowController::class, 'print_borrow_letter'])->name('print.borrow.letter');

//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

require __DIR__ . '/auth.php';
