<?php

use App\Http\Controllers\API\v1\Orders\UserCartsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1\CDs\CDsController;
use App\Http\Controllers\API\v1\Orders\OrdersController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/cds', CDsController::class);
Route::apiResource('/orders', OrdersController::class);

Route::get('/carts', [UserCartsController::class, 'index'])->name('carts.index');
Route::get('/carts/{id}', [UserCartsController::class, 'show'])->name('carts.show');