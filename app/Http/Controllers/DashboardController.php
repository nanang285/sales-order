<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel recruitments
        $recruitments = Recruitment::all();

        // Menghitung jumlah data recruitments
        $recruitmentCount = Recruitment::count();

        // Menghitung jumlah gagal di setiap tahap berdasarkan kegagalan di tahap terakhir
        $failedStage1 = Recruitment::where('stage1', false)
                        ->where('stage2', false)
                        ->where('stage3', false)
                        ->where('stage4', false)
                        ->count();

        $failedStage2 = Recruitment::where('stage1', true)
                        ->where('stage2', false)
                        ->where('stage3', false)
                        ->where('stage4', false)
                        ->count();

        $failedStage3 = Recruitment::where('stage1', true)
                        ->where('stage2', true)
                        ->where('stage3', false)
                        ->where('stage4', false)
                        ->count();

        $failedStage4 = Recruitment::where('stage1', true)
                        ->where('stage2', true)
                        ->where('stage3', true)
                        ->where('stage4', false)
                        ->count();

        // Menghitung jumlah yang berhasil (semua stage bernilai true)
        $successStage = Recruitment::where('stage1', true)
                        ->where('stage2', true)
                        ->where('stage3', true)
                        ->where('stage4', true)
                        ->count();

        $breadcrumbTitle = 'Dashboard';

        return view('admin.dashboard', compact(
            'recruitments', 
            'recruitmentCount', 
            'failedStage1', 
            'failedStage2', 
            'failedStage3', 
            'failedStage4', 
            'successStage', 
            'breadcrumbTitle'
        ));
    }


    public function redirect()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('member.dashboard');
        }
    }
}
