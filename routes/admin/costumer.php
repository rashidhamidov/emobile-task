<?php


use App\Http\Controllers\Admin\CostumerController;
use App\Http\Controllers\Admin\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/costumer', [CostumerController::class, 'index'])->name('admin_costumer');
Route::get('/costumer/create', [CostumerController::class, 'create'])->name('admin_costumer_create');
Route::post('/costumer/store', [CostumerController::class, 'store'])->name('admin_costumer_store');
Route::get('/costumer/edit/{id}', [CostumerController::class, 'edit'])->name('admin_costumer_edit');
Route::post('/costumer/update/{id}', [CostumerController::class, 'update'])->name('admin_costumer_update');
Route::get('/costumer/destroy/{id}', [CostumerController::class, 'destroy'])->name('admin_costumer_destroy');


Route::get('/costumer/trip/all', function () {
    return redirect()->route('admin_costumer');
})->name('admin_trip');
Route::get('/costumer/trip/{id}', [TripController::class, 'index'])->name('admin_costumer_trip');
Route::get('/trip/create/{id}', [TripController::class, 'create'])->name('admin_trip_create');
Route::post('/trip/store/{id}', [TripController::class, 'store'])->name('admin_trip_store');
Route::get('/trip/edit/{id}', [TripController::class, 'edit'])->name('admin_trip_edit');
Route::post('/trip/update/{id}', [TripController::class, 'update'])->name('admin_trip_update');
Route::get('/trip/destroy/{id}', [TripController::class, 'destroy'])->name('admin_trip_destroy');

