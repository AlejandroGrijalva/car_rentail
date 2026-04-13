<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\DriversController;
use App\Http\Controllers\Api\Loyalty_LevelsController;
use App\Http\Controllers\Api\PaymentsController;
use App\Http\Controllers\Api\RentalController;

Route::resource('/users', UsersController::class);
Route::resource('/brands', BrandsController::class);
Route::resource('/cars', CarsController::class);
Route::resource('/drivers', DriversController::class);
Route::resource('/loyalty-levels', Loyalty_LevelsController::class);
Route::resource('/payments', PaymentsController::class);
Route::resource('/rentals', RentalController::class);
