<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::controller(RoomController::class)->prefix('room')->group(function () {
    //     Route::get('', 'index')->name('room.index');
    //     Route::get('create', 'create')->name('room.create');
    //     Route::post('store', 'store')->name('room.store');
    //     Route::get('edit/{id}', 'edit')->name('room.edit');
    //     Route::get('destroy/{id}', 'destroy')->name('room.destroy');
    // });

    Route::resource('item', ItemController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('room', RoomController::class);
});

require __DIR__ . '/auth.php';
