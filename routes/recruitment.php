<?php

use App\Http\Controllers\RecruitmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('recruitment')->name('recruitment.')->group(function () {
    
    Route::get('/', function () {
        return view('recruitment/recruitment');
    })->name('index');

    Route::get('/checkrecruitment', function () {
        return view('recruitment/check-recruitment');
    })->name('checkrecruitment');

    Route::post('/', [RecruitmentController::class, 'store'])->name('store');
    
    Route::post('/checkrecruitment', [RecruitmentController::class, 'searchByEmail'])->name('search');
});
