<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use App\Models\Promo;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

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
            $imageName = time() . '.webp'; // Mengubah ekstensi menjadi webp
            $imagePath = public_path('storage/uploads/promo');

            // Simpan gambar asli terlebih dahulu
            $image->move($imagePath, $imageName);

            // Resize gambar menggunakan GD Driver
            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            // Resize gambar menjadi 50% dari ukuran aslinya
            $newWidth = $width * 1;
            $newHeight = $height * 1;
            $compressionQuality = 60; // Untuk WebP, ini bisa dikontrol melalui kualitas

            // Buat gambar baru dengan ukuran yang diubah
            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);

            // Pastikan transparansi (untuk format PNG atau GIF)
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            // Salin dan ubah ukuran gambar
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Simpan gambar yang telah diubah ukurannya dalam format WebP
            imagewebp($resizedImg, $imgPath);

            // Hapus resource gambar
            imagedestroy($img);
            imagedestroy($resizedImg);

            // Simpan nama gambar ke database
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
            $imageName = time() . '.webp'; // Mengubah ekstensi menjadi webp
            $imagePath = public_path('storage/uploads/promo');

            // Simpan gambar asli terlebih dahulu
            $image->move($imagePath, $imageName);

            // Resize gambar menggunakan GD Driver
            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            // Resize gambar menjadi 50% dari ukuran aslinya
            $newWidth = $width * 1;
            $newHeight = $height * 1;
            $compressionQuality = 60; // Untuk WebP, ini bisa dikontrol melalui kualitas

            // Buat gambar baru dengan ukuran yang diubah
            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);

            // Pastikan transparansi (untuk format PNG atau GIF)
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            // Salin dan ubah ukuran gambar
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Simpan gambar yang telah diubah ukurannya dalam format WebP
            imagewebp($resizedImg, $imgPath);

            // Hapus resource gambar
            imagedestroy($img);
            imagedestroy($resizedImg);

            // Hapus gambar lama jika ada
            $oldImagePath = 'public/uploads/promo/' . $promoSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            // Update record dengan nama gambar yang baru
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
