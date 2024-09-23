<?php

namespace App\Http\Controllers\Admin\Homepages;
use App\Http\Controllers\Controller;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutUsController extends Controller
{
    public function index()
    {
        $breadcrumbTitle = 'Tentang';
        $aboutUs = AboutUs::first();
        return view('admin.homepages.about-us', compact('aboutUs', 'breadcrumbTitle'));
    }

    public function store(Request $request)
    {
        \Log::info($request->all());

        $request->validate([
            'description' => 'required|string',
            'list_items' => 'required|array',
        ]);

        AboutUs::create([
            'description' => $request->description,
            'list_items' => json_encode($request->list_items),
        ]);

        return redirect()->route('admin.about-us.index')->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'description' => 'required|string|max:1000',
            'list_items' => 'required|array',
        ]);

        $aboutUs = AboutUs::findOrFail($id);

        $aboutUs->description = $request->description;
        $aboutUs->list_items = json_encode($request->list_items);
        $aboutUs->save();

        return redirect()->route('admin.about-us.index')->with('success', true)->with('toast', 'edit');
    }
}
