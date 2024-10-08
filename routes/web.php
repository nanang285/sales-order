<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Homepages\AboutController;
use App\Http\Controllers\Admin\Homepages\ProjectController;
use App\Http\Controllers\Admin\Homepages\GaleryController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Ticket\EventController;
use App\Http\Controllers\Ticket\PaymentEventController;

use Illuminate\Support\Facades\Route;
use App\Exports\RecruitmentExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/admin/recruitment/export', function () {
    $fileName = 'Recruitment_Report_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
    return Excel::download(new RecruitmentExport, $fileName);
})->name('admin.recruitment.export');

Route::get('/success/{token}', function ($token) {
    if (session()->get('valid_token') !== $token) {
        abort(403);
    }

    return view('recruitment/recruitment-success', ['token' => $token]);
})->name('success');

Route::get('/member/dashboard', function () {
    return view('member/dashboard');
})->name('/member.dashboard');

Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
    Route::post('/', 'store')->name('store');
    Route::get('/', 'index')->name('index');
});

Route::get('/', [HomeController::class, 'index'])->name('');
Route::get('/about-me', [AboutController::class, 'AboutIndex'])->name('aboutme');
Route::get('/portfolio', [ProjectController::class, 'PortofolioIndex'])->name('portofolio');
Route::get('/documentation', [GaleryController::class, 'DocIndex'])->name('documentation');
Route::post('recruitment-store', [RecruitmentController::class, 'store'])->name('recruitment.store');

Route::get('/events', [EventController::class, 'list'])->name('events');
Route::get('/events/{slug}', [EventController::class, 'detail'])->name('detail-event');

Route::post('/payment-event/store', [PaymentEventController::class, 'store'])->name('payment-event.store');
Route::post('/payment-event/freepayment', [PaymentEventController::class, 'freepayment'])->name('payment-event.freepayment');
Route::get('event/invoice/{kode}', [EventController::class, 'invoice'])->name('event.invoice');
Route::get('event/ticket/{kode}', [EventController::class, 'showTicket'])->name('event.ticket');
Route::get('/events/filter', [EventController::class, 'filterByCategory']);

Route::get('/transaksi/{external_id}', [PaymentEventController::class, 'show'])->name('transaksi.show');
// Route::get('/invoice', [PaymentEventController::class, 'failed'])->name('invoice.gagal');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/recruitment.php';
