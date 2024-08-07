<?php

namespace App\Http\Controllers;

use App\Models\GalerySection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerySectionController extends Controller
{
    public function index() : View
    {
        $galerySection = GalerySection::All();
        
        return view('admin.galery.index', compact('galerySection'));
    }

    public function DocumentationIndex()
    {
        $galerySection = GalerySection::first();
        return view('documentation', compact('galerySection'));
    }

    public function create()
    {
        return view('admin.galery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'subtitle' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:6144',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->hashName();
        $imagePath = $image->storeAs('uploads/galery-section', $imageName, 'public');

        GalerySection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imageName,
        ]);

        return redirect()->route('galery')->with('success', true)->with('toast', 'add');

    }

    public function edit(): View
    {
        $galerySection = GalerySection::All();

        if (!$galerySection) {
            $galerySection = new GalerySection();
        }

        return view('admin.galery.edit', compact('galerySection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'string|max:50',
            'subtitle' => 'string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
        ]);

        $galerySection = Galerysection::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->hashName();
            $image->storeAs('public/uploads/galery-section', $imageName);

            $oldImagePath = 'public/uploads/galery-section/' . $galerySection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $imageName;
        }

        $galerySection->update($updateData);

        return redirect()->route('galery')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $project = GalerySection::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/galery-section/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('galery')->with('success', true)->with('toast', 'delete');

    }
}
