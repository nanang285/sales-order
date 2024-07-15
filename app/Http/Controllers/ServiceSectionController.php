<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class ServiceSectionController extends Controller
{
    public function index() : View
    {
        $serviceSection = ServiceSection::All();
        
        return view('admin.service.index', compact('serviceSection'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->hashName();
        $imagePath = $image->storeAs('uploads/service-section', $imageName, 'public');

        ServiceSection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imageName,
        ]);

        return redirect()->route('service')->with('success', true)->with('toast', 'add');
    }

    public function edit(): View
    {
        $serviceSection = ServiceSection::All();

        if (!$serviceSection) {
            $serviceSection = new Servicesection();
        }

        return view('admin.project.edit', compact('latestProject'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'string|max:255',
            'subtitle' => 'string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $serviceSection = ServiceSection::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->hashName();
            $image->storeAs('public/uploads/service-section', $imageName);

            $oldImagePath = 'public/uploads/service-section/' . $serviceSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $imageName;
        }

        $serviceSection->update($updateData);

        return redirect()->route('service')->with('success', true)->with('toast', 'edit');
        
        
    }

    public function destroy($id)
    {
        $project = ServiceSection::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/service-section/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('service')->with('success', true)->with('toast', 'delete');
        
    }
}
