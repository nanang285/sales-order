<?php

namespace App\Http\Controllers;
use App\Models\FooterSection;
use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): View
    {
        $footerSection = FooterSection::first();
        return view('contact', compact('footerSection'));
    }

    public function create () {
        return view('contact.create');
    }

    public function store (Request $request) {
        $request = request()->validate([
            'name' =>'required|min:3|max:25',
            'email' =>'required|email',
            'no_telp' =>'required|min:5',
            'message' =>'required|min:10',
        ]);

        Contact::create($request);

        return redirect()->route('contact.index')->with('success', true)->with('toast', 'contact_success');
    }

}

