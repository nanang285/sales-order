<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Absen;
use App\Models\User;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        // Ambil bulan dari request, jika tidak ada gunakan bulan ini sebagai default
        $month = $request->input('month');
        $selectedMonth = $month ? Carbon::parse($month) : now();
        $daysInMonth = $selectedMonth->daysInMonth; // Mengambil jumlah hari dalam bulan

        // Ambil data absensi berdasarkan bulan yang dipilih
        $absens = Absen::whereYear('date', $selectedMonth->year)
            ->whereMonth('date', $selectedMonth->month)
            ->get();

        // Mengambil semua data user
        $employees = Employee::all();

        $recruitments = Recruitment::All();

        // Menghitung jumlah data recruitments
        $recruitmentCount = Recruitment::count();

        // Menghitung jumlah gagal di setiap tahap berdasarkan kegagalan di tahap terakhir
        $failedStage1 = Recruitment::where('stage1', false)->where('stage2', false)->where('stage3', false)->where('stage4', false)->count();

        $failedStage2 = Recruitment::where('stage1', true)->where('stage2', false)->where('stage3', false)->where('stage4', false)->count();

        $failedStage3 = Recruitment::where('stage1', true)->where('stage2', true)->where('stage3', false)->where('stage4', false)->count();

        $failedStage4 = Recruitment::where('stage1', true)->where('stage2', true)->where('stage3', true)->where('stage4', false)->count();

        $successStage = Recruitment::where('stage1', true)->where('stage2', true)->where('stage3', true)->where('stage4', true)->count();

        $breadcrumbTitle = 'Dashboard';

        return view('admin.dashboard', compact('recruitments', 'recruitmentCount', 'failedStage1', 'failedStage2', 'failedStage3', 'failedStage4', 'successStage', 'breadcrumbTitle', 'absens', 'employees', 'selectedMonth', 'daysInMonth'));
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
