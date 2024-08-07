<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\ServiceSection;
use App\Models\AboutSection;
use App\Models\LatestProject;
use App\Models\GalerySection;
use App\Models\ClientSection;
use App\Models\FooterSection;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index() : View
    {
        $promoSection = Promo::first();
        $serviceSection = ServiceSection::All();
        $aboutSection = AboutSection::first();
        $latestProject = LatestProject::All();
        $galerySection = GalerySection::All();
        $clientSection = ClientSection::All();
        $footerSection = FooterSection::first();
        return view('index', compact('promoSection', 'serviceSection', 'aboutSection', 'latestProject', 'galerySection', 'clientSection', 'footerSection'));
    }
}