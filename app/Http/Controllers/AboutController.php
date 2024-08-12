<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\FooterSection;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(): View
    {
        $aboutSection = AboutSection::first();
        $breadcrumbTitle = 'Profil';
        return view('admin.homepages.about', compact('aboutSection', 'breadcrumbTitle'));
    }

    public function AboutIndex(): View
    {
        $aboutSection = AboutSection::first();
        $footerSection = footerSection::first();
        return view('tentang-kami', compact('aboutSection', 'footerSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
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

        return redirect()->route('about')->with('success', true)->with('toast', 'edit');
    }
}
