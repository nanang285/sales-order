<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('');
Route::get('/about-me', [AboutController::class, 'AboutIndex'])->name('aboutme');
Route::get('/portfolio', [ProjectController::class, 'PortofolioIndex'])->name('portofolio');
Route::get('/documentation', [GaleryController::class, 'DocIndex'])->name('documentation');

Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/', 'index')->name('index');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/recruitment.php';


