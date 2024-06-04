<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user_center', [AccessController::class, 'index'])->name('user_center');
    Route::get('/add_user', [AccessController::class, 'adduser'])->name('add_user');
    Route::post('/store_user', [AccessController::class, 'create'])->name('store_user');
    Route::delete('/destroy_user/{id}', [AccessController::class, 'destroy'])->name('destroy_user');
    Route::get('/users/{id}/edit', [AccessController::class, 'edit'])->name('edit_user');
    Route::put('/users/{id}', [AccessController::class, 'update'])->name('update_user');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::post('/store_inventory', [InventoryController::class, 'store'])->name('store_inventory');
});

require __DIR__ . '/auth.php';
