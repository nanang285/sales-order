<?php

use Illuminate\Support\Facades\Route;

use App\Https\Controllers\Events\EventsController;

Route::prefix('events-zmi')->name('events-zmi.')->controller(EventsController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('recruitment')->name('recruitment.')->controller(RecruitmentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::get('/{uuid}', 'edit')->name('edit');
        Route::get('/search', 'searchByName')->name('search');
        Route::post('/AdminStore', 'AdminStore')->name('AdminStore');
        Route::post('/{uuid}/{stage}', 'updateStage')->name('updateStage');
        Route::put('/update', 'update')->name('update');
        Route::delete('/{uuid}', 'destroy')->name('destroy');
    });
});