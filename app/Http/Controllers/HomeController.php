<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\HeroSection;
use App\Models\ServiceSection;
use App\Models\AboutSection;
use App\Models\LatestProject;
use App\Models\GalerySection;
use App\Models\ClientSection;
use App\Models\FooterSection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index() : View
    {
        $promoSection = Promo::first();
        $heroSection = HeroSection::first();
        $serviceSection = ServiceSection::All();
        $aboutSection = AboutSection::first();
        $latestProject = LatestProject::All();
        $galerySection = GalerySection::All();
        $clientSection = ClientSection::All();
        $footerSection = FooterSection::first();
        return view('index', compact('promoSection','heroSection', 'serviceSection', 'aboutSection', 'latestProject', 'galerySection', 'clientSection', 'footerSection'));
    }
    
    public function create(): View 
    {  
        abort(404);
    }
}