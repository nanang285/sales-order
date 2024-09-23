<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\ClientSection;

// RESIZE & CONVERT IMAGES
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ClientController extends Controller
{   
    // VIEW 
    public function index()
    {
        $clientSection = ClientSection::All();
        $breadcrumbTitle = 'Client';
        return view('admin.homepages.client', compact('clientSection', 'breadcrumbTitle'));
    }

    // ADD FUNCTIONS
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'image_path' => 'required|image|mimetypes:image/*|max:4096',
        ]);

        $image = $request->file('image_path');
        $imageName = time() . '.webp';
        $imagePath = public_path('storage/uploads/client-section');

        $image->move($imagePath, $imageName);

        $imgPath = $imagePath . '/' . $imageName;
        $img = imagecreatefromstring(file_get_contents($imgPath));
        $width = imagesx($img);
        $height = imagesy($img);

        $compressionQuality = 70;

        $resizedImg = imagecreatetruecolor($width, $height);
        imagealphablending($resizedImg, false);
        imagesavealpha($resizedImg, true);

        $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
        imagefilledrectangle($resizedImg, 0, 0, $width, $height, $transparent);
        imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $width, $height, $width, $height);
        imagewebp($resizedImg, $imgPath, $compressionQuality);
        imagedestroy($img);
        imagedestroy($resizedImg);

        ClientSection::create([
            'image_path' => $imageName,
        ]);

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'add');
    }

    // EDIT FUNCTIONS
    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'image_path' => 'nullable|image|mimetypes:image/*|max:4096',
        ]);

        $clientSection = ClientSection::findOrFail($id);

        $updateData = [];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $tempImageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('storage/uploads/client-section');

            $image->move($imagePath, $tempImageName);

            $imgPath = $imagePath . '/' . $tempImageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 50;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($resizedImg, false);
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefilledrectangle($resizedImg, 0, 0, $newWidth, $newHeight, $transparent);

            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            $newImageName = time() . '.webp';
            $newImagePath = $imagePath . '/' . $newImageName;
            imagewebp($resizedImg, $newImagePath, $compressionQuality);

            unlink($imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);

            $oldImagePath = 'public/uploads/client-section/' . $clientSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $newImageName;
        }

        $clientSection->update($updateData);

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'edit');
    }

    // DELETE FUNCTIONS
    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $clientSection = ClientSection::findOrFail($id);

        if ($clientSection->image_path) {
            Storage::disk('public')->delete('uploads/client-section/' . $clientSection->image_path);
        }

        $clientSection->delete();

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'delete');
    }
}
