<?php

use App\Http\Controllers\Admin\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/car', [CarController::class, 'index'])->name('admin_car');
Route::get('/car/fetchCars', [CarController::class, 'fetchCars'])->name('admin_car_fetch');
Route::get('/car/create', [CarController::class, 'create'])->name('admin_car_create');
Route::post('/car/store', [CarController::class, 'store'])->name('admin_car_store');
Route::get('/car/edit/{id}', [CarController::class, 'edit'])->name('admin_car_edit');
Route::post('/car/update', [CarController::class, 'update'])->name('admin_car_update');

Route::get('/car/destroy/{id}', [CarController::class, 'destroy'])->name('admin_car_destroy');
