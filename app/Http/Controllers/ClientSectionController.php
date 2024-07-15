<?php

namespace App\Http\Controllers;

use App\Models\ClientSection;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class ClientSectionController extends Controller
{
    public function index() : View
    {
       $clientSection = ClientSection::All();
        
        return view('admin.client.index', compact('clientSection'));
    }

    public function create()
    {
        return view('admin.cient.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->hashName();
        $imagePath = $image->storeAs('uploads/client-section', $imageName, 'public');

        ClientSection::create([
            'image_path' => $imageName,
        ]);

        return redirect()->route('client')->with('success', true)->with('toast', 'add');

    }

    public function edit(): View
    {
       $clientSection = ClientSection::All();

        if (!$clientSection) {
           $clientSection = new ClientSection();
        }

        return view('admin.client.edit', compact('clientSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'image_path' => '',
        ]);

       $clientSection = ClientSection::findOrFail($id);

        if ($request->hasFile('image_path')) {

            $image = $request->file('image_path');
            $image->storeAs('public/uploads/client-section', $image->hashName());

            $oldImagePath = 'public/uploads/client-section/' .$clientSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

           $clientSection->update([
                'image_path' => $image->hashName(),
            ]);
        } else {
           $clientSection->update([
               
            ]);
        }

        
        return redirect()->route('client')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $project = ClientSection::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/client-section/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('client')->with('success', true)->with('toast', 'delete');

    }
}
