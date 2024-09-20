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
    protected $user;
    protected $isAdmin;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->isAdmin = $this->user->role === 'admin';
    }

    public function index(Request $request)
    {
        $isAdmin = $this->isAdmin;
        
        $selectedMonth = $this->getSelectedMonth($request->input('month'));
        $daysInMonth = $selectedMonth->daysInMonth;

        $absens = $this->getAbsensForMonth($selectedMonth);
        $employees = Employee::orderBy('name')->get();
        $recruitments = Recruitment::all();
        $recruitmentCount = Recruitment::count();

        $breadcrumbTitle = 'Dashboard';

        return view('admin.dashboard', compact('isAdmin', 'recruitments', 'recruitmentCount', 'breadcrumbTitle', 'absens', 'employees', 'selectedMonth', 'daysInMonth'));
    }

    public function redirect()
    {
        return redirect()->route('admin.dashboard');
    }

    private function getSelectedMonth($month): Carbon
    {
        return $month ? Carbon::parse($month) : now();
    }

    private function getAbsensForMonth(Carbon $selectedMonth)
    {
        return Absen::whereYear('date', $selectedMonth->year)
            ->whereMonth('date', $selectedMonth->month)
            ->get();
    }
}
