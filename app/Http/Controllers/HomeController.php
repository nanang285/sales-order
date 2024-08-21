<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\ServiceSection;
use App\Models\AboutSection;
use App\Models\LatestProject;
use App\Models\GalerySection;
use App\Models\ClientSection;
use App\Models\FooterSection;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'promoSection' => Promo::first(),
            'serviceSection' => ServiceSection::all(),
            'aboutSection' => AboutSection::first(),
            'latestProject' => LatestProject::all(),
            'galerySection' => GalerySection::all(),
            'clientSection' => ClientSection::all(),
            'footerSection' => FooterSection::first(),
        ];

        return view('index', $data);
    }
    
}