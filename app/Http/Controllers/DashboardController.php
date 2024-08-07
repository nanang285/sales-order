<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recruitment = Recruitment::All();
        return view('dashboard.index');
    }
}
