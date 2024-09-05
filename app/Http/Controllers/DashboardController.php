<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel recruitments
        $recruitments = Recruitment::all();

        // Menghitung jumlah data recruitments
        $recruitmentCount = Recruitment::count();

        $breadcrumbTitle = 'Dashboard';

        return view('admin.dashboard', compact('recruitments', 'recruitmentCount', 'breadcrumbTitle'));
    }

    public function redirect()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('member.dashboard');
        }
    }
}
