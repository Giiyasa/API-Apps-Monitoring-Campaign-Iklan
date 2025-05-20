<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MasterProdukController;
use App\Http\Controllers\Api\MasterResearchController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//produk
Route::post('/produk', [MasterProdukController::class, 'store']);
Route::get('/produk', [MasterProdukController::class, 'index']);
Route::get('/produk/{produk}', [MasterProdukController::class, 'show']);
Route::delete('/produk/{produk_id}', [MasterProdukController::class, 'destroy']);
Route::put('/produk/{id}', [MasterProdukController::class, 'update']);

//Research
Route::post('/research', [MasterResearchController::class, 'store']);
Route::get('/research', [MasterResearchController::class, 'index']);
Route::get('/research/{research}', [MasterResearchController::class, 'show']);
Route::delete('/research/{research_id}', [MasterResearchController::class, 'destroy']);
Route::put('/research/{id}', [MasterResearchController::class, 'update']);

//logging
Route::post('/logging', [MasterResearchController::class, 'store']);
Route::get('/logging', [MasterResearchController::class, 'index']);
Route::get('/logging/{logging}', [MasterResearchController::class, 'show']);