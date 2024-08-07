<?php

namespace App\Http\Controllers;

use App\Models\FooterSection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterSectionController extends Controller
{
    public function index() : View
    {
        $footerSection = FooterSection::first();
        
        return view('admin.footer.index', compact('footerSection'));
    }

    public function edit(): View
    {
        $footerSection = FooterSection::first();

        if (!$footerSection) {
            $footerSection = new FooterSection();
        }

        return view('admin.footer.edit', compact('footerSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
    $request->validate([
        'alamat' => 'nullable|string',
        'no_telp' => 'nullable|string',
        'email' => 'nullable|email',
        'sosmed_1' => 'nullable|string',
        'sosmed_2' => 'nullable|string',
        'sosmed_3' => 'nullable|string',
    ]);

    $footerSection = FooterSection::findOrFail($id);

    $data = $request->only(['alamat', 'no_telp', 'email', 'sosmed_1', 'sosmed_2', 'sosmed_3']);
    $data = array_filter($data, function($value) {
        return $value !== null;
    });

    $footerSection->update($data);
    
    return redirect()->route('footer')->with('success', true)->with('toast', 'edit');

}
}
