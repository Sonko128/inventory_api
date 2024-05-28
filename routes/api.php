<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StocksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\SuppliersController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/stocks', [StocksController::class, 'store']);
Route::get('/stocks', [StocksController::class, 'index']);
Route::delete('/stocks/{id}', [StocksController::class, 'destory']);
Route::get('/supplier', [SuppliersController::class, 'index']);
Route::post('/supplier', [SuppliersController::class, 'store']);
Route::patch('/supplier/{id}', [SuppliersController::class, 'update']);
Route::delete('/supplier/{id}', [SuppliersController::class, 'destroy']);
Route::post('/sales',[StocksController::class, 'store']);
Route::get('/sales',[StocksController::class, 'index']);
