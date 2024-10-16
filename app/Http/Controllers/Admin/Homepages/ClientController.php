<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;

use App\Models\ClientSection;
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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $image = $request->file('image_path');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('uploads/client-section', $imageName, 'public');

        ClientSection::create([
            'image_path' => $imageName,
        ]);
        return redirect()->route('admin.homepages.client.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image_path' => '',
        ]);

        $clientSection = ClientSection::findOrFail($id);

        if ($request->hasFile('image_path')) {

            $image = $request->file('image_path');
            $image->storeAs('public/uploads/client-section', $image->getClientOriginalName());

            $oldImagePath = 'public/uploads/client-section/' . $clientSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $clientSection->update([
                'image_path' => $image->getClientOriginalName(),
            ]);
        } else {
            $clientSection->update([]);
        }

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
