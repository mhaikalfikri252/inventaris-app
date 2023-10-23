<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriteOffController;
use App\Http\Controllers\EmployeeController;
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
        Route::resource('city', CityController::class);
        Route::resource('facility', FacilityController::class);
        Route::resource('user', UserController::class);
        Route::resource('employee', EmployeeController::class);
    });

    Route::get('/writeoff', [WriteOffController::class, 'index'])->name('writeoff.index');

    Route::resource('asset', AssetController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('borrow', BorrowController::class);

    Route::get('borrow/create/{id}', [BorrowController::class, 'create_byid'])->name('create.borrow.byid');
    Route::put('upload/letter/{id}', [BorrowController::class, 'upload'])->name('upload.borrow.letter');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('print/asset/qrcode/{id}', [AssetController::class, 'print_asset_qrcode'])->name('print.asset.qrcode');
    Route::get('print/inventory/qrcode/{id}', [InventoryController::class, 'print_inventory_qrcode'])->name('print.inventory.qrcode');
    Route::get('print/borrow/letter/{id}', [BorrowController::class, 'print_borrow_letter'])->name('print.borrow.letter');
});

//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

require __DIR__ . '/auth.php';
