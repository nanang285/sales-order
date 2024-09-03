<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $breadcrumbTitle = 'Profil';

        return view('admin.absensi.index', [
            'breadcrumbTitle' => $breadcrumbTitle,
        ]);
    }
}
