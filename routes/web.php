<?php
use App\Http\Controllers\RecruitmentControllerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\ServiceSectionController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\LatestProjectController;
use App\Http\Controllers\GalerySectionController;
use App\Http\Controllers\ClientSectionController;
use App\Http\Controllers\FooterSectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecruitmentController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('index');
});

Route::get('/recruitment', function () {
    return view('recruitment');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
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

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    })
        ->name('admin.dashboard')
        ->middleware('admin');
    
    Route::get('/member/dashboard', function () {
        return view('member.dashboard.index');
    })->name('member.dashboard');
});

Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/user', function () { 
        return view('admin.user.index'); 
    })->name('admin.user');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');

    Route::get('/admin/recruitment', [RecruitmentController::class, 'index'])->name('recruitment');

    // Homepages
    Route::get('/admin/promo', [PromoController::class, 'index'])->name('promo');
    Route::get('/admin/promo/create', [PromoController::class, 'create'])->name('promo.create');
    Route::post('/admin/promo', [PromoController::class, 'store'])->name('promo.store');
    Route::get('/admin/promo/edit', [PromoController::class, 'edit'])->name('promo.edit');
    Route::put('/admin/promo/{id}', [PromoController::class, 'update'])->name('promo.update');

    Route::get('/admin/hero', [HeroSectionController::class, 'index'])->name('hero');
    Route::get('/admin/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/admin/hero/{id}', [HeroSectionController::class, 'update'])->name('hero.update');
    
    Route::get('/admin/service', [ServiceSectionController::class, 'index'])->name('service');
    Route::get('/admin/service/create', [ServiceSectionController::class, 'create'])->name('service.create');
    Route::post('/admin/service', [ServiceSectionController::class, 'store'])->name('service.store');
    Route::get('/admin/service/edit', [ServiceSectionController::class, 'edit'])->name('service.edit');
    Route::put('/admin/service/{id}', [ServiceSectionController::class, 'update'])->name('service.update');
    Route::delete('/admin/service/{id}', [ServiceSectionController::class, 'destroy'])->name('service.destroy');

    Route::get('/admin/about', [AboutSectionController::class, 'index'])->name('about');
    Route::get('/admin/about/edit', [AboutSectionController::class, 'edit'])->name('about.edit');
    Route::put('/admin/about/{id}', [AboutSectionController::class, 'update'])->name('about.update');

    Route::get('/admin/project', [LatestProjectController::class, 'index'])->name('project');
    Route::get('/admin/project/create', [LatestProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/project', [LatestProjectController::class, 'store'])->name('project.store');
    Route::put('/admin/project/edit', [LatestProjectController::class, 'edit'])->name('project.edit');
    Route::put('/admin/project/{id}', [LatestProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/project/{id}', [LatestProjectController::class, 'destroy'])->name('project.destroy');
    
    Route::get('/admin/galery', [GalerySectionController::class, 'index'])->name('galery');
    Route::get('/admin/galery/create', [GalerySectionController::class, 'create'])->name('galery.create');
    Route::post('/admin/galery', [GalerySectionController::class, 'store'])->name('galery.store');
    Route::put('/admin/galery/edit', [GalerySectionController::class, 'edit'])->name('galery.edit');
    Route::put('/admin/galery/{id}', [GalerySectionController::class, 'update'])->name('galery.update');
    Route::delete('/admin/galery/{id}', [GalerySectionController::class, 'destroy'])->name('galery.destroy');

    Route::get('/admin/client', [ClientSectionController::class, 'index'])->name('client');
    Route::get('/admin/galery/create', [ClientSectionController::class, 'create'])->name('client.create');
    Route::post('/admin/client', [ClientSectionController::class, 'store'])->name('client.store');
    Route::put('/admin/client/edit', [ClientSectionController::class, 'edit'])->name('client.edit');
    Route::put('/admin/client/{id}', [ClientSectionController::class, 'update'])->name('client.update');
    Route::delete('/admin/client/{id}', [ClientSectionController::class, 'destroy'])->name('client.destroy');

    Route::get('/admin/footer', [FooterSectionController::class, 'index'])->name('footer');
    Route::put('/admin/footer/edit', [FooterSectionController::class, 'edit'])->name('footer.edit');
    Route::put('/admin/footer/{id}', [FooterSectionController::class, 'update'])->name('footer.update');
    // Homepages

});

Route::resource('users', UserController::class);
Route::resource('', HomeController::class);

require __DIR__ . '/auth.php';


