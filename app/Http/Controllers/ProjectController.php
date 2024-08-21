<?php

namespace App\Http\Controllers;

use App\Models\LatestProject;
use App\Models\FooterSection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(): View
    {
        $latestProject = LatestProject::All();
        $breadcrumbTitle = 'Projects';

        return view('admin.homepages.project', compact('latestProject', 'breadcrumbTitle'));
    }

    public function PortofolioIndex(): View
    {
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('portofolio', compact('latestProject', 'footerSection'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'subtitle' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('uploads/latest-project', $imageName, 'public');

        LatestProject::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
            'image_path' => $imageName,
        ]);

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'add');
    }

    public function edit(): View
    {
        $latestProject = LatestProject::All();

        if (!$latestProject) {
            $latestProject = new LatestProject();
        }

        return view('admin.project.edit', compact('latestProject'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'string|max:50',
            'subtitle' => 'string|max:255',
            'button_link' => 'string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $latestProject = LatestProject::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/uploads/latest-project', $imageName);

            $oldImagePath = 'public/uploads/latest-project/' . $latestProject->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $imageName;
        }

        $latestProject->update($updateData);

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $project = LatestProject::findOrFail($id);
        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/latest-project/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'delete');
    }
}
