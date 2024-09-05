<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
            'image_path' => 'required|file|mimetypes:image/*|max:4096',
        ]);

        $image = $request->file('image_path');
        $tempImageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('storage/uploads/latest-project');

        // Simpan gambar asli terlebih dahulu
        $image->move($imagePath, $tempImageName);

        // Resize gambar dan ubah format ke WebP
        $imgPath = $imagePath . '/' . $tempImageName;
        $img = imagecreatefromstring(file_get_contents($imgPath));
        $width = imagesx($img);
        $height = imagesy($img);

        $newWidth = $width * 0.5;
        $newHeight = $height * 0.5;
        $compressionQuality = 60; // Untuk WebP, ini bisa dikontrol melalui kualitas

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

        LatestProject::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
            'image_path' => $newImageName,
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
            'image_path' => 'nullable|file|mimetypes:image/*|max:4096',
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

            // Simpan gambar asli terlebih dahulu
            $image->move($imagePath, $tempImageName);

            // Resize gambar dan ubah format ke WebP
            $imgPath = $imagePath . '/' . $tempImageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            // Tentukan ukuran baru, misalnya mengurangi ukuran file sekitar 50%
            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 60; // Untuk WebP, ini bisa dikontrol melalui kualitas

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
        $project = LatestProject::findOrFail($id);
        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/latest-project/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.homepages.project.index')->with('success', true)->with('toast', 'delete');
    }
}
