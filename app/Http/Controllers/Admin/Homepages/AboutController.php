<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;

use App\Models\AboutSection;
use App\Models\OurTeam;
use App\Models\FooterSection;
use App\Models\GalerySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutSection = AboutSection::first();
        $breadcrumbTitle = 'Profil';

        return view('admin.homepages.about', [
            'aboutSection' => $aboutSection,
            'breadcrumbTitle' => $breadcrumbTitle,
        ]);
    }

    // Route to About-Me, Our-Team
    public function AboutIndex()
    {
        $galerySection = GalerySection::all();
        $ourTeam = OurTeam::All();
        $footerSection = footerSection::first();
        return view('about-me', compact('galerySection', 'footerSection', 'ourTeam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subtitle' => 'required|string',
            'video_path' => 'required|mimetypes:video/*|max:20400',
        ]);

        $aboutSection = new AboutSection();
        $aboutSection->subtitle = $request->input('subtitle');

        if ($request->hasFile('video_path')) {
            $video = $request->file('video_path');
            $videoName = $video->getClientOriginalName();

            $destinationPath = public_path('storage/uploads/about-section');

            // Pindahkan file ke direktori yang diinginkan
            $video->move($destinationPath, $videoName);

            // Simpan nama file ke database
            $aboutSection->video_path = $videoName;
        }

        $aboutSection->save();

        return redirect()->route('admin.homepages.about.index')->with('success', 'Data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'subtitle' => 'nullable|string',
            'video_path' => 'nullable|mimetypes:video/*|max:20400',
        ]);

        $aboutSection = AboutSection::findOrFail($id);
        $data = $request->only(['subtitle']);

        if ($request->hasFile('video_path')) {
            $video = $request->file('video_path');
            $videoName = $video->getClientOriginalName();
            $destinationPath = public_path('storage/uploads/about-section');

            if ($aboutSection->video_path) {
                $oldFilePath = public_path('storage/uploads/about-section/' . $aboutSection->video_path);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            
            $video->move($destinationPath, $videoName);

            $data['video_path'] = $videoName;
        }

        $aboutSection->update($data);

        return redirect()->route('admin.homepages.about.index')->with('success', true)->with('toast', 'edit');
    }
}
