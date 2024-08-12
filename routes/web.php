<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecruitmentController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('index');
});

Route::get('/recruitment', function () {
    return view('recruitment');
});

Route::get('/datatables', function () {
    return view('datatables');
})->name('datatables');

Route::get('/recruitment-success', function () {
    return view('recruitment-success');
})->name('success');


Route::get('/recruitment', function () {
    return view('recruitment');
})->name('recruitment');

Route::get('documentation', [GaleryController::class, 'DocIndex'])->name('documentation');

Route::view('/checkrecruitment', 'checkrecruitment')->name('checkrecruitment');
Route::post('/admin/recruitment', [RecruitmentController::class, 'store'])->name('recruitment.store');
Route::post('/checkrecruitment', [RecruitmentController::class, 'searchByEmail'])->name('checkrecruitment.search');

Route::get('/portofolio', [ProjectController::class, 'PortofolioIndex'])->name('portofolio');
Route::get('/tentang-kami', [AboutController::class, 'AboutIndex'])->name('tentang-kami');


Route::prefix('auth')->group(function () {
    Route::get('/admin/login', function () {
        return view('admin.login');
    });
    Route::get('/forgot-password', function () {
        return view('forgot-password');
    });

    Route::get('/reset-password', function () {
        return view('reset-password');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('member.dashboard');
        }
    })->name('dashboard');

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    
    
    Route::get('/member/dashboard', function () {
        return view('member.dashboard.index');
    })->name('member.dashboard');
});

Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/user', function () { 
        return view('admin.user.index'); 
    })->name('admin.user');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');

    Route::get('/admin/recruitment', [RecruitmentController::class, 'index'])->name('admin.recruitment');
    Route::get('/admin/recruitment/add', [RecruitmentController::class, 'add'])->name('recruitment.add');
    Route::post('/admin/recruitment/store', [RecruitmentController::class, 'Adminstore'])->name('admin.recruitment.store');
    Route::get('/admin/recruitment/{uuid}', [RecruitmentController::class, 'edit'])->name('recruitment.edit');
    Route::post('/admin/recruitment/update/', [RecruitmentController::class, 'update'])->name('recruitment.update');
    Route::delete('/admin/recruitment/{uuid}', [RecruitmentController::class, 'destroy'])->name('recruitment.destroy');
    Route::post('/admin/recruitment/{uuid}/{stage}', [RecruitmentController::class, 'updateStage'])->name('recruitment.updateStage');
    Route::get('/admin/recruitment/search', [RecruitmentController::class, 'searchByName'])->name('recruitment.search');

    // Homepages
    Route::get('/admin/homepages/popup', [PromoController::class, 'index'])->name('promo');
    Route::get('/admin/homepages/popup/create', [PromoController::class, 'create'])->name('promo.create');
    Route::put('/admin/homepages/popup/{id}', [PromoController::class, 'update'])->name('promo.update');
    Route::post('/admin/homepages/popup', [PromoController::class, 'store'])->name('promo.store');

    Route::get('/admin/homepages/service', [ServiceController::class, 'index'])->name('service');
    Route::post('/admin/homepages/service', [ServiceController::class, 'store'])->name('service.store');
    Route::put('/admin/homepages/service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/admin/homepages/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/admin/homepages/about', [AboutController::class, 'index'])->name('about');
    Route::put('/admin/homepages/about/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('/admin/homepages/project', [ProjectController::class, 'index'])->name('project');
    Route::post('/admin/homepages/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/admin/homepages/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/homepages/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/admin/homepages/galery', [GaleryController::class, 'index'])->name('galery');
    Route::post('/admin/homepages/galery', [GaleryController::class, 'store'])->name('galery.store');
    Route::put('/admin/homepages/galery/{id}', [GaleryController::class, 'update'])->name('galery.update');
    Route::delete('/admin/homepages/galery/{id}', [GaleryController::class, 'destroy'])->name('galery.destroy');

    Route::get('/admin/homepages/client', [ClientController::class, 'index'])->name('client');
    Route::post('/admin/homepages/client', [ClientController::class, 'store'])->name('client.store');
    Route::put('/admin/homepages/client/{id}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/admin/homepages/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/admin/homepages/footer', [FooterController::class, 'index'])->name('footer');
    Route::put('/admin/homepages/footer/{id}', [FooterController::class, 'update'])->name('footer.update');

});

Route::resource('users', UserController::class);
Route::resource('', HomeController::class);

require __DIR__ . '/auth.php';


