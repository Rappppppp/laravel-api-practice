<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\API\v1\CDs\CDsController;
use App\Http\Controllers\API\v1\Orders\OrdersController;
use App\Http\Controllers\API\v1\Orders\UserCartsController;
use App\Http\Controllers\API\v1\StarWars\StarWarsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/cds', CDsController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/orders', OrdersController::class);

Route::get('/carts', [UserCartsController::class, 'index'])->name('carts.index');
Route::get('/carts/{id}', [UserCartsController::class, 'show'])->name('carts.show');

Route::get('/starwars', [StarWarsController::class, 'index'])->name('starwars.index');
Route::get('/starwars/{id}', [StarWarsController::class, 'show'])->name('starwars.show');