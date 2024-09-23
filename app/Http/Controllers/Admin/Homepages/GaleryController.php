<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\GalerySection;
use App\Models\OurTeam;
use App\Models\FooterSection;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GaleryController extends Controller
{
    public function index()
    {
        $galerySection = GalerySection::All();

        $breadcrumbTitle = 'Gallery';
        return view('admin.homepages.galery', compact('galerySection', 'breadcrumbTitle'));
    }

    public function DocIndex()
    {
        $galerySection = GalerySection::All();
        $footerSection = FooterSection::first();
        return view('documentation', compact('galerySection', 'footerSection'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image_path' => 'required|image|mimetypes:image/*|max:4096',
        ]);

        $image = $request->file('image_path');
        $tempImageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('storage/uploads/galery-section');

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

        GalerySection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $newImageName,
        ]);

        return redirect()->route('admin.homepages.galery.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'title' => 'string|max:255',
            'subtitle' => 'string|max:255',
            'image_path' => 'nullable|image|mimetypes:image/*|max:4096',
        ]);

        $galerySection = Galerysection::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $tempImageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('storage/uploads/galery-section');

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

            $oldImagePath = 'public/uploads/galery-section/' . $galerySection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $newImageName;
        }

        $galerySection->update($updateData);

        return redirect()->route('admin.homepages.galery.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $project = GalerySection::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/galery-section/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.galery.index')->with('success', true)->with('toast', 'delete');
    }
}
