<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Employee;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';

        $selectedMonth = $request->input('month') ? Carbon::parse($request->input('month')) : now();
        $daysInMonth = $selectedMonth->daysInMonth;

        $absens = Absen::filterByMonth($selectedMonth)->get();

        // Ambil data karyawan
        $employees = Employee::orderBy('name');
        if ($request->filled('search')) {
            $employees = $employees->searchByName($request->input('search'));
        }
        $employees = $employees->get();

        // Ambil data rekrutmen
        $recruitments = Recruitment::all();
        if ($request->filled('searchRecruitment')) {
            $recruitments = Recruitment::search($request->input('searchRecruitment'))->get();
        }

        $recruitmentCount = $recruitments->count();

        $failedStages = [
            'Administrasi' => [],
            'Test Project' => [],
            'Interview' => [],
            'Offering' => [],
        ];

        foreach ($recruitments as $recruitment) {
            if ($recruitment->failed_stage) {
                if (array_key_exists($recruitment->failed_stage, $failedStages)) {
                    $failedStages[$recruitment->failed_stage][] = $recruitment->name;
                }
            }
        }

        $stage1Count = Recruitment::where('stage1', 1)->count();
        $stage2Count = Recruitment::where('stage2', 1)->count();
        $stage3Count = Recruitment::where('stage3', 1)->count();
        $stage4Count = Recruitment::where('stage4', 1)->count();

        $totalFailed = count($failedStages['Administrasi']) + count($failedStages['Test Project']) + count($failedStages['Interview']) + count($failedStages['Offering']);

        $totalSuccess = Recruitment::where('stage4', 1)->count();

        $breadcrumbTitle = 'Dashboard';

        return view(
            'admin.dashboard',
            compact(
                'isAdmin',
                'recruitments',
                'recruitmentCount',
                'breadcrumbTitle',
                'absens',
                'employees',
                'selectedMonth',
                'daysInMonth',
                'stage1Count',
                'stage2Count',
                'stage3Count',
                'stage4Count',
                'failedStages',
                'totalFailed', // Total data gagal
                'totalSuccess', // Total data sukses
            ),
        );
    }

    public function redirect()
    {
        return redirect()->route('admin.dashboard');
    }
}
