<?php

use Illuminate\Support\Facades\Route;

Route::get("/",[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
Route::get("/admin",[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin_home');
