<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/set-absensi', [\App\Http\Controllers\AbsenController::class, 'handleData']);

Route::prefix('zmi/user')->group(function () {
    Route::get('/show', [\App\Http\Controllers\UserController::class, 'index']);
    Route::post('/add', [\App\Http\Controllers\UserController::class, 'store']);
    Route::put('/edit/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
});
