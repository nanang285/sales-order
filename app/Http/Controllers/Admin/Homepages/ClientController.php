<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use App\Models\ClientSection;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clientSection = ClientSection::All();
        $breadcrumbTitle = 'Client';
        return view('admin.homepages.client', compact('clientSection', 'breadcrumbTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimetypes:image/*|max:4096', // Memperbolehkan semua jenis file gambar dengan maksimal ukuran 4MB
        ]);

        $image = $request->file('image_path');
        $imageName = time() . '.webp'; // Simpan sebagai WebP untuk mendukung transparansi
        $imagePath = public_path('storage/uploads/client-section');

        // Simpan gambar asli terlebih dahulu
        $image->move($imagePath, $imageName);

        // Resize gambar menggunakan GD Driver untuk mengurangi ukuran file
        $imgPath = $imagePath . '/' . $imageName;
        $img = imagecreatefromstring(file_get_contents($imgPath));
        $width = imagesx($img);
        $height = imagesy($img);

        // Tentukan kualitas kompresi, misalnya 70%
        $compressionQuality = 70;

        // Buat gambar baru dengan transparansi
        $resizedImg = imagecreatetruecolor($width, $height);
        imagealphablending($resizedImg, false);
        imagesavealpha($resizedImg, true);
        $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
        imagefilledrectangle($resizedImg, 0, 0, $width, $height, $transparent);

        // Salin gambar asli ke gambar yang baru dengan transparansi
        imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $width, $height, $width, $height);

        // Simpan gambar dalam format WebP yang mendukung transparansi
        imagewebp($resizedImg, $imgPath, $compressionQuality);

        // Hapus resource gambar untuk menghindari kebocoran memori
        imagedestroy($img);
        imagedestroy($resizedImg);

        // Simpan nama gambar ke database
        ClientSection::create([
            'image_path' => $imageName,
        ]);

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'image_path' => 'nullable|image|mimetypes:image/*|max:4096', // Memperbolehkan semua jenis file gambar dengan maksimal ukuran 4MB
        ]);

        $clientSection = ClientSection::findOrFail($id);

        // Inisialisasi array untuk data yang akan diupdate
        $updateData = [];

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $tempImageName = time() . '.' . $image->getClientOriginalExtension(); // Nama sementara
            $imagePath = public_path('storage/uploads/client-section');

            // Simpan gambar asli terlebih dahulu
            $image->move($imagePath, $tempImageName);

            // Resize gambar dan ubah format ke WebP dengan transparansi
            $imgPath = $imagePath . '/' . $tempImageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            // Tentukan ukuran baru, misalnya mengurangi ukuran file sekitar 50%
            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 50; // Untuk WebP, ini bisa dikontrol melalui kualitas

            // Cek apakah gambar memiliki transparansi
            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($resizedImg, false);
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefilledrectangle($resizedImg, 0, 0, $newWidth, $newHeight, $transparent);

            // Copy gambar yang diresize dan pertahankan transparansi
            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Simpan gambar yang telah diubah format ke WebP dengan transparansi
            $newImageName = time() . '.webp';
            $newImagePath = $imagePath . '/' . $newImageName;
            imagewebp($resizedImg, $newImagePath, $compressionQuality);

            // Hapus gambar sementara
            unlink($imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);

            // Hapus gambar lama jika ada
            $oldImagePath = 'public/uploads/client-section/' . $clientSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            // Tambahkan nama gambar baru ke data yang akan diupdate
            $updateData['image_path'] = $newImageName;
        }

        // Update data lainnya jika ada
        $clientSection->update($updateData);

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $clientSection = ClientSection::findOrFail($id);

        if ($clientSection->image_path) {
            Storage::disk('public')->delete('uploads/client-section/' . $clientSection->image_path);
        }

        $clientSection->delete();

        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'delete');
    }
}
