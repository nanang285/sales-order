<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Homepages\VissionMissionController;
use App\Http\Controllers\Admin\Homepages\ProjectController;
use App\Http\Controllers\Admin\Homepages\ServiceController;
use App\Http\Controllers\Admin\Homepages\AboutUsController;
use App\Http\Controllers\Admin\Homepages\ClientController;
use App\Http\Controllers\Admin\Homepages\FooterController;
use App\Http\Controllers\Admin\Homepages\GaleryController;
use App\Http\Controllers\Admin\Homepages\PromoController;
use App\Http\Controllers\Admin\Homepages\AboutController;
use App\Http\Controllers\Admin\Homepages\TeamController;
use App\Http\Controllers\Ticket\PaymentEventController;
use App\Http\Controllers\Ticket\EventController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserController;


// admin.
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // admin.recruitment
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

    // admin.absen
    Route::prefix('absen')->name('absen.')->controller(AbsenController::class)->group(function () {
        Route::get('/{id}', 'detail')->name('detail');
        
    });

    // admin.attendace.
    Route::prefix('attendance')->name('attendance.')->controller(AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');        
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // admin.employees.
    Route::prefix('employees')->name('employees.')->controller(EmployeeController::class)->group(function () {
        Route::get('/', 'index')->name('index');  
        Route::post('/', 'store')->name('store');        
        Route::put('/{id}', 'update')->name('update');   
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // admin.about-us.
    Route::prefix('about-us')->name('about-us.')->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{id}', 'update')->name('update');
        Route::post('/', 'store')->name('store');;

    });

    // admin.visi-misi.
    Route::prefix('visi-misi')->name('visi-misi.')->controller(VissionMissionController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{id}', 'update')->name('update');
        Route::post('/', 'store')->name('store');;

    });
    
    // admin.payments.
    Route::prefix('payments')->name('payments.')->controller(PaymentEventController::class)->group(function () {
        // Route::get('/', 'index')->name('index');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // admin.events.
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

    // admin.homepages.
    Route::prefix('homepages')->name('homepages.')->group(function () {

        // admin.homepages.promo.
        Route::prefix('promo')->name('promo.')->controller(PromoController::class)->group(function () {
            Route::get('/', 'index')->name('index');  
            Route::post('/', 'store')->name('store');        
            Route::put('/{id}', 'update')->name('update');   
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.service.
        Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.about.
        Route::prefix('about')->name('about.')->controller(AboutController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/{id}', 'update')->name('update');
            Route::post('/', 'store')->name('store');;

        });

        // admin.homepages.our-team
        Route::prefix('our-team')->name('our-team.')->controller(TeamController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.project.  
        Route::prefix('project')->name('project.')->controller(ProjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.galery
        Route::prefix('galery')->name('galery.')->controller(GaleryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::patch('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.client.
        Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // admin.homepages.footer.
        Route::prefix('footer')->name('footer.')->controller(FooterController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/{id}', 'update')->name('update');
            Route::post('/', 'store')->name('store');        
        });
    });

});
