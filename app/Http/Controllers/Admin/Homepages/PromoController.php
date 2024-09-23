<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Promo;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PromoController extends Controller
{
    public function index()
    {
        $promoSection = Promo::first();
        $breadcrumbTitle = 'PopUp';

        return view('admin.homepages.popup', compact('promoSection', 'breadcrumbTitle'));
    }

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

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.webp';
            $imagePath = public_path('storage/uploads/promo');

            $image->move($imagePath, $imageName);

            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 1;
            $newHeight = $height * 1;
            $compressionQuality = 60;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);

            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            imagewebp($resizedImg, $imgPath);

            imagedestroy($img);
            imagedestroy($resizedImg);

            Promo::create([
                'image_path' => $imageName,
            ]);
        }

        return redirect()->route('admin.homepages.promo.index')->with('success', true)->with('toast', 'create');
    }

    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $request->validate([
            'image_path' => 'required|image|mimetypes:image/*|max:4096',
        ]);

        $promoSection = Promo::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.webp';
            $imagePath = public_path('storage/uploads/promo');

            $image->move($imagePath, $imageName);

            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 1;
            $newHeight = $height * 1;
            $compressionQuality = 60;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);

            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            imagewebp($resizedImg, $imgPath);

            imagedestroy($img);
            imagedestroy($resizedImg);

            $oldImagePath = 'public/uploads/promo/' . $promoSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $promoSection->update([
                'image_path' => $imageName,
            ]);
        }

        return redirect()->route('admin.homepages.promo.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $project = Promo::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/promo/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.promo.index')->with('success', true)->with('toast', 'delete');
    }
}
