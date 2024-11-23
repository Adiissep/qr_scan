<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ScanController;
use App\Models\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('salam', function () {
    return response()->json([
        'status' => 'succes',
        'message' => 'salam dari Dunia',
    ]);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);  
    Route::get('scan', [ScanController::class, 'index']);
    Route::get('scan/{id}', [ScanController::class, 'show']);
    Route::post('scan', [ScanController::class, 'store']);
    Route::put('scan/{id}', [ScanController::class, 'update']);
    Route::delete('scan/{id}', [ScanController::class, 'destroy']);
});