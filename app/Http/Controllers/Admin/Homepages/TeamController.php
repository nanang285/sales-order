<?php

namespace App\Http\Controllers\Admin\Homepages;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\OurTeam;
use App\Models\FooterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $ourTeam = OurTeam::All();

        $breadcrumbTitle = 'Team Kami';
        return view('admin.homepages.our-team', compact('ourTeam', 'breadcrumbTitle'));
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
            'role' => 'required|string|max:255',
            'image_path' => 'required|image|mimetypes:image/*|max:4096',
        ]);

        $image = $request->file('image_path');
        $tempImageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('storage/uploads/our-team');

        // Simpan gambar asli terlebih dahulu
        $image->move($imagePath, $tempImageName);

        // Resize gambar dan ubah format ke WebP
        $imgPath = $imagePath . '/' . $tempImageName;
        $img = imagecreatefromstring(file_get_contents($imgPath));
        $width = imagesx($img);
        $height = imagesy($img);

        // Tentukan ukuran baru, misalnya mengurangi ukuran file sekitar 50%
        $newWidth = $width * 1;
        $newHeight = $height * 1;
        $compressionQuality = 70; // Untuk WebP, ini bisa dikontrol melalui kualitas

        // Buat gambar baru dengan ukuran yang diubah
        $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Simpan gambar yang telah diubah format dan ukuran file-nya
        $newImageName = time() . '.webp';
        $newImagePath = $imagePath . '/' . $newImageName;
        imagewebp($resizedImg, $newImagePath, $compressionQuality);

        // Hapus gambar sementara
        unlink($imgPath);
        imagedestroy($img);
        imagedestroy($resizedImg);

        ourTeam::create([
            'title' => $request->title,
            'role' => $request->role,
            'image_path' => $newImageName,
        ]);

        return redirect()->route('admin.homepages.our-team.index')->with('success', true)->with('toast', 'add');
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
            'role' => 'string|max:255',
            'image_path' => 'nullable|image|mimetypes:image/*|max:4096',
        ]);

        $ourTeam = OurTeam::findOrFail($id);

        $updateData = [
            'title' => $request->title,
            'role' => $request->role,
        ];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $tempImageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('storage/uploads/our-team');

            // Simpan gambar asli terlebih dahulu
            $image->move($imagePath, $tempImageName);

            // Resize gambar dan ubah format ke WebP
            $imgPath = $imagePath . '/' . $tempImageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            // Tentukan ukuran baru, misalnya mengurangi ukuran file sekitar 50%
            $newWidth = $width * 1;
            $newHeight = $height * 1;
            $compressionQuality = 70; // Untuk WebP, ini bisa dikontrol melalui kualitas

            // Buat gambar baru dengan ukuran yang diubah
            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Simpan gambar yang telah diubah format dan ukuran file-nya
            $newImageName = time() . '.webp';
            $newImagePath = $imagePath . '/' . $newImageName;
            imagewebp($resizedImg, $newImagePath, $compressionQuality);

            // Hapus gambar sementara
            unlink($imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);

            // Hapus gambar lama jika ada
            $oldImagePath = 'public/uploads/our-team/' . $ourTeam->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $updateData['image_path'] = $newImageName;
        }

        $ourTeam->update($updateData);

        return redirect()->route('admin.homepages.our-team.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }
        
        $project = OurTeam::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/our-team/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.our-team.index')->with('success', true)->with('toast', 'delete');
    }
}
