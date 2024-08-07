<?php

namespace App\Http\Controllers;

use App\Models\GalerySection;
use App\Models\FooterSection;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index(): View
    {
        $galerySection = GalerySection::All();
        $footerSection = FooterSection::first();

        return view('documentation', compact('galerySection', 'footerSection'));
    }
}
