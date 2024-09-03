<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;

use App\Models\FooterSection;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footerSection = FooterSection::first();
        $breadcrumbTitle = 'Footer';
        return view('admin.homepages.footer', [
            'footerSection' => $footerSection,
            'breadcrumbTitle' => $breadcrumbTitle,
        ]);
    }

    public function update(Request $request, string $id)
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
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $footerSection->update($data);

        return redirect()->route('admin.homepages.footer.index')->with('success', true)->with('toast', 'edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'email' => 'nullable|email',
            'sosmed_1' => 'nullable|string',
            'sosmed_2' => 'nullable|string',
            'sosmed_3' => 'nullable|string',
        ]);

        $data = $request->only(['alamat', 'no_telp', 'email', 'sosmed_1', 'sosmed_2', 'sosmed_3']);

        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        FooterSection::create($data);

        return redirect()->route('admin.homepages.footer.index')->with('success', true)->with('toast', 'add');
    }
}
