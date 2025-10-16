<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceitemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


// user routes
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// user routes
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('destroy/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

// laptop routes
Route::prefix('laptops')->group(function () {
    Route::get('/', [LaptopController::class, 'index'])->name('laptops.index');
    Route::get('/create', [LaptopController::class, 'create'])->name('laptops.create');
    Route::post('/', [LaptopController::class, 'store'])->name('laptops.store');
    Route::get('/{id}', [LaptopController::class, 'edit'])->name('laptops.edit');
    Route::post('/{id}', [LaptopController::class, 'update'])->name('laptops.update');
    Route::get('destroy/{id}', [LaptopController::class, 'destroy'])->name('laptops.destroy');
});

// service items routes
Route::prefix('serviceitems')->group(function () {
    Route::get('/', [ServiceitemController::class, 'index'])->name('serviceitems.index');
    Route::get('/create', [ServiceitemController::class, 'create'])->name('serviceitems.create');
    Route::post('/', [ServiceitemController::class, 'store'])->name('serviceitems.store');
    Route::get('/{id}', [ServiceitemController::class, 'edit'])->name('serviceitems.edit');
    Route::post('/{id}', [ServiceitemController::class, 'update'])->name('serviceitems.update');
    Route::get('destroy/{id}', [ServiceitemController::class, 'destroy'])->name('serviceitems.destroy');
});


// service routes
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/{id}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/{id}', [ServiceController::class, 'update'])->name('services.update');
});