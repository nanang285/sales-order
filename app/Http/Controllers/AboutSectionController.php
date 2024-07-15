<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index() : View
    {
        $aboutSection = AboutSection::first();
        
        return view('admin.about.index', compact('aboutSection'));
    }   

    public function edit(): View
    {
        $aboutSection = AboutSection::first();

        if (!$aboutSection) {
            $aboutSection = new AboutSection();
        }

        return view('admin.hero.edit', compact('heroSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'subtitle' => '',
            'video_path' => 'nullable|mimes:mp4,mov,ogg,qt,webm|max:160000',
        ]);
    
        $aboutSection = AboutSection::findOrFail($id);
        $data = $request->only(['title', 'subtitle']);
    
        if ($request->hasFile('video_path')) {
            $video = $request->file('video_path');
            $videoName = $video->hashName();
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
