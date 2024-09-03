<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;

use App\Models\AboutSection;
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

    public function AboutIndex()
    {
        $footerSection = footerSection::first();
        $galerySection = GalerySection::all();
        return view('about-me', compact('galerySection', 'footerSection'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'subtitle' => '',
            'video_path' => 'nullable|mimes:mp4,mov,webm,flv,mkv|max:102400',
        ]);

        $aboutSection = AboutSection::findOrFail($id);
        $data = $request->only(['subtitle']);

        if ($request->hasFile('video_path')) {
            $video = $request->file('video_path');
            $videoName = $video->getClientOriginalName();
            $video->storeAs('public/uploads/about-section', $videoName);

            if ($aboutSection->video_path) {
                Storage::delete('public/uploads/about-section/' . $aboutSection->video_path);
            }
            $data['video_path'] = $videoName;
        }

        $aboutSection->update($data);

        return redirect()->route('admin.homepages.about.index')->with('success', true)->with('toast', 'edit');
    }
}
