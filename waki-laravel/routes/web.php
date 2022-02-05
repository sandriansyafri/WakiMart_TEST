<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;




Route::middleware(['guest'])->group(function () {
    Route::get('login', LoginController::class)->name('login');
    Route::get('register', RegisterController::class)->name('register');

    Route::post('login', [LoginController::class, 'store']);
    Route::post('register', [RegisterController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('data/branch', [BranchController::class, 'data'])->name('branch.data');
    Route::resource('branch', BranchController::class)->except('create', 'edit');
});
