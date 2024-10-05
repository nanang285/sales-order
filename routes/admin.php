<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Homepages\VissionMissionController;
use App\Http\Controllers\Admin\Homepages\ProjectController;
use App\Http\Controllers\Admin\Homepages\ServiceController;
use App\Http\Controllers\Admin\Homepages\ClientController;
use App\Http\Controllers\Admin\Homepages\FooterController;
use App\Http\Controllers\Admin\Homepages\GaleryController;
use App\Http\Controllers\Admin\Homepages\PromoController;
use App\Http\Controllers\Admin\Homepages\AboutController;
use App\Http\Controllers\Admin\Homepages\AboutUsController;
use App\Http\Controllers\Admin\Homepages\TeamController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Events\PaymentEventController;

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

    Route::prefix('absen')->name('absen.')->controller(AbsenController::class)->group(function () {
        Route::get('/{id}', 'detail')->name('detail');
        
    });

    Route::prefix('attendance')->name('attendance.')->controller(AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');        
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('employees')->name('employees.')->controller(EmployeeController::class)->group(function () {
        Route::get('/', 'index')->name('index');  
        Route::post('/', 'store')->name('store');        
        Route::put('/{id}', 'update')->name('update');   
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('about-us')->name('about-us.')->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{id}', 'update')->name('update');
        Route::post('/', 'store')->name('store');;

    });

    Route::prefix('visi-misi')->name('visi-misi.')->controller(VissionMissionController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{id}', 'update')->name('update');
        Route::post('/', 'store')->name('store');;

    });
    
    // EVENTS
    Route::prefix('payments')->name('payments.')->controller(PaymentEventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        
    });

    Route::prefix('events')->name('events.')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/ticket', 'ticket')->name('ticket');
        Route::get('/payments', 'payments')->name('payments');
        Route::get('/add', 'add')->name('add');
        Route::put('/update/{slug}', 'update')->name('update');
        Route::delete('/delete/{slug}', 'destroy')->name('delete');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{slug}', 'edit')->name('edit');
        Route::get('/hapus/{slug}', 'delete')->name('hapus');
    });

    Route::prefix('homepages')->name('homepages.')->group(function () {

        Route::prefix('promo')->name('promo.')->controller(PromoController::class)->group(function () {
            Route::get('/', 'index')->name('index');  
            Route::post('/', 'store')->name('store');        
            Route::put('/{id}', 'update')->name('update');   
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

         Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('about')->name('about.')->controller(AboutController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/{id}', 'update')->name('update');
            Route::post('/', 'store')->name('store');;

        });

        Route::prefix('our-team')->name('our-team.')->controller(TeamController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('project')->name('project.')->controller(ProjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('galery')->name('galery.')->controller(GaleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('footer')->name('footer.')->controller(FooterController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/{id}', 'update')->name('update');
            Route::post('/', 'store')->name('store');        
        });
    });

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
        Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
        });
    });
});
