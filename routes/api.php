<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FingerprintController;

Route::post('/set-absensi', [FingerprintController::class, 'handleData']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/post-absensi', [\App\Http\Controllers\FingerprintController::class, 'handleData']);