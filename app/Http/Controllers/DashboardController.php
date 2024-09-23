<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Employee;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';
        
        $selectedMonth = $request->input('month') ? Carbon::parse($request->input('month')) : now();
        $daysInMonth = $selectedMonth->daysInMonth;
    
        $absens = Absen::filterByMonth($selectedMonth)->get();
        
        $employees = Employee::orderBy('name');
        if ($request->filled('search')) {
            $employees = $employees->searchByName($request->input('search'));
        }
        $employees = $employees->get();
    
        $recruitments = Recruitment::all();
        if ($request->filled('searchRecruitment')) {
            $recruitments = Recruitment::search($request->input('searchRecruitment'))->get();
        }
        $recruitmentCount = $recruitments->count();
    
        $breadcrumbTitle = 'Dashboard';
    
        return view('admin.dashboard', compact('isAdmin', 'recruitments', 'recruitmentCount', 'breadcrumbTitle', 'absens', 'employees', 'selectedMonth', 'daysInMonth'));
    }
    

    public function redirect() {
        return redirect()->route('admin.dashboard');
    }
}
