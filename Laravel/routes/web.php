<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;

Route::get('/{vue_capture?}', function() {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/', function () {
    return view('app');
});

Route::get('task1/{customerId}', [CustomerController::class, 'index'])->name('home');

Route::get('task2/{userId}', [UserController::class, 'index'])->name('garage');

Route::post('/garage/{userId}/set-active-car', [CarController::class, 'setActiveCar'])->name('setActiveCar');
