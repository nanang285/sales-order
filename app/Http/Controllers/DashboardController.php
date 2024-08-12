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
}
