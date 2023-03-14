<?php


use App\Http\Controllers\Admin\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/city', [CityController::class, 'index'])->name('admin_city');
Route::get('/city/fetchCities', [CityController::class, 'fetchCities'])->name('admin_city_fetch');
Route::get('/city/create', [CityController::class, 'create'])->name('admin_city_create');
Route::post('/city/store', [CityController::class, 'store'])->name('admin_city_store');
Route::get('/city/edit/{id}', [CityController::class, 'edit'])->name('admin_city_edit');
Route::post('/city/update', [CityController::class, 'update'])->name('admin_city_update');

Route::get('/city/destroy/{id}', [CityController::class, 'destroy'])->name('admin_city_destroy');
