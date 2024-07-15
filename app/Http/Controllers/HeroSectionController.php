<?php

namespace App\Http\Controllers;
use App\Models\HeroSection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HeroSectionController extends Controller
{
    public function index() : View
    {
        $heroSection = HeroSection::first();
        return view('admin.hero.index', compact('heroSection'));
    }

    public function edit(): View
    {
        $heroSection = HeroSection::first();

        if (!$heroSection) {
            $heroSection = new HeroSection();
        }

        return view('admin.hero.edit', compact('heroSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => '',
            'subtitle' => '',
            'image_path' => '',
        ]);

        $heroSection = HeroSection::findOrFail($id);

        if ($request->hasFile('image_path')) {

            $image = $request->file('image_path');
            $image->storeAs('public/uploads/hero-section', $image->hashName());

            $oldImagePath = 'public/uploads/hero-section/' . $heroSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $heroSection->update([
                'image_path' => $image->hashName(),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
            ]);
        } else {
            $heroSection->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
            ]);
        }

        
        return redirect()->route('hero')->with('success', true)->with('toast', 'edit');
    }
}
