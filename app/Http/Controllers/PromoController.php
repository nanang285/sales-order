<?php

namespace App\Http\Controllers;

use App\Models\Promo;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class PromoController extends Controller
{
    public function index() : View
    {
       $promoSection = Promo::first();
       
        return view('admin.promo.index', compact('promoSection'));
    }

    // public function create()
    // {
    //     return view('admin.promo.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $image = $request->file('image_path');
    //     $imageName = $image->hashName();
    //     $imagePath = $image->storeAs('uploads/promo', $imageName, 'public');

    //     Promo::create([
    //         'image_path' => $imageName,
    //     ]);

    //     return redirect()->route('promo')->with('success', true)->with('toast', 'add');

    // }

    public function edit(): View
    {
       $promoSection = Promo::first();

        if (!$promoSection) {
           $promoSection = new Promo();
        }
        
        return view('admin.promo.edit', compact('promoSection'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        
        $request->validate([
            'image_path' => '',
        ]);

        
        

       $promoSection = Promo::findOrFail($id);

        if ($request->hasFile('image_path')) {

            $image = $request->file('image_path');
            $image->storeAs('public/uploads/promo', $image->hashName());

            $oldImagePath = 'public/uploads/promo/' .$promoSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

           $promoSection->update([
                'image_path' => $image->hashName(),
            ]);
        } else {
           $promoSection->update([
               
            ]);
        }

        
        return redirect()->route('promo')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $project = Promo::findOrFail($id);

        if ($project->image_path) {
            Storage::disk('public')->delete('uploads/promo/' . $project->image_path);
        }

        $project->delete();

        return redirect()->route('promo')->with('success', true)->with('toast', 'delete');

    }
}
