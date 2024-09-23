<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\LatestProject;
use App\Models\FooterSection;

// IMAGE RESIZE AND CONVERT
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProjectController extends Controller
{
    public function index()
    {
        $latestProject = LatestProject::All();
        $breadcrumbTitle = 'Projects';

        return view('admin.homepages.project', compact('latestProject', 'breadcrumbTitle'));
    }

    public function PortofolioIndex()
    {
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('portofolio', compact('latestProject', 'footerSection'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'title' => 'required|string|max:50',
            'subtitle' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'image_path' => 'required|image|mimetypes:image/*|max:4096',
        ]);

        $image = $request->file('image_path');
        $tempImageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('storage/uploads/latest-project');

        $image->move($imagePath, $tempImageName);

        $imgPath = $imagePath . '/' . $tempImageName;
        $img = imagecreatefromstring(file_get_contents($imgPath));
        $width = imagesx($img);
        $height = imagesy($img);

        $newWidth = $width * 0.5;
        $newHeight = $height * 0.5;
        $compressionQuality = 60;
       
        $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $newImageName = time() . '.webp';
        $newImagePath = $imagePath . '/' . $newImageName;
        imagewebp($resizedImg, $newImagePath, $compressionQuality);

        unlink($imgPath);
        imagedestroy($img);
        imagedestroy($resizedImg);

        LatestProject::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
            'image_path' => $newImageName,
        ]);

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'title' => 'string|max:50',
            'subtitle' => 'string|max:255',
            'button_link' => 'string|max:255',
            'image_path' => 'nullable|image|mimetypes:image/*|max:4096',
        ]);

        $latestProject = LatestProject::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $tempImageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('storage/uploads/latest-project');

            $image->move($imagePath, $tempImageName);

            $imgPath = $imagePath . '/' . $tempImageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 60;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            $newImageName = time() . '.webp';
            $newImagePath = $imagePath . '/' . $newImageName;
            imagewebp($resizedImg, $newImagePath, $compressionQuality);

            unlink($imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);

            $oldImagePath = 'public/uploads/latest-project/' . $latestProject->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $newImageName;
        }

        $latestProject->update($updateData);

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $project = LatestProject::findOrFail($id);
        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/latest-project/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'delete');
    }
}
