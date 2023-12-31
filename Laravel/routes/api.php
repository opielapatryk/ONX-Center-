<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomercarController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Vue


//Cars

//create
Route::post('/cars/create', [CarController::class,'store']);
//update
Route::put('/cars/update', [CarController::class,'edit']);
//delete
Route::delete('/cars/delete', [CarController::class,'delete']);
//get
Route::get('/cars/{request}', [CarController::class,'read']);
//get all
Route::get('/cars', [CarController::class,'index']);

//Cars

//Customers

//create
Route::post('/customers/create', [CustomerController::class,'store']);
//update
Route::put('/customers/update', [CustomerController::class,'edit']);
//delete
Route::delete('/customers/delete', [CustomerController::class,'delete']);
//delete with id
Route::delete('/customer/destroy/{id}', [CustomerController::class,'destroy']);
//get
Route::get('/customer/{request}', [CustomerController::class,'read']);
//get all
Route::get('/customers', [CustomerController::class,'index']);

//Customers

//Employees

//create
Route::post('/employees/create', [EmployeeController::class,'store']);
//update
Route::put('/employees/update', [EmployeeController::class,'edit']);
//delete
Route::delete('/employees/delete', [EmployeeController::class,'delete']);
//get
Route::get('/employees/{request}', [EmployeeController::class,'read']);
//get all
Route::get('/employees', [EmployeeController::class,'index']);

//Employees

//Orders
Route::get('/orders', [OrderController::class,'index']);
Route::post('/orders/create', [OrderController::class,'store']);
Route::put('/orders/update', [OrderController::class,'edit']);

//Orders

//CustomerCars
Route::get('/customercar', [CustomercarController::class,'index']);
Route::post('/customercar/create', [CustomercarController::class,'store']);
Route::put('/customercar/update', [CustomercarController::class,'edit']);


//CustomerCars
