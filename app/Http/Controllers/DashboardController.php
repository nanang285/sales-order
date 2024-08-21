<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recruitments = Recruitment::All();
        $breadcrumbTitle = 'Dashboard';
        return view('admin.dashboard.index', compact('recruitments', 'breadcrumbTitle'));

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
