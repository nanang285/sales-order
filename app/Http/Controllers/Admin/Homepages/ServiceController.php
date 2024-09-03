<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;

use App\Models\ServiceSection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceSection = ServiceSection::All();
        $breadcrumbTitle = 'Services';
        return view('admin.homepages.service', compact('serviceSection', 'breadcrumbTitle'));
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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('uploads/service-section', $imageName, 'public');

        ServiceSection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imageName,
        ]);

        return redirect()->route('admin.homepages.service.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|max:50',
            'subtitle' => 'string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $serviceSection = ServiceSection::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/uploads/service-section', $imageName);

            $oldImagePath = 'public/uploads/service-section/' . $serviceSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $imageName;
        }

        $serviceSection->update($updateData);

        return redirect()->route('admin.homepages.service.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $project = ServiceSection::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/service-section/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.service.index')->with('success', true)->with('toast', 'delete');
    }
}
