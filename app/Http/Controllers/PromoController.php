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
        $breadcrumbTitle = 'PopUp';
        return view('admin.homepages.popup', compact('promoSection', 'breadcrumbTitle'));
    }

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
            $image->storeAs('public/uploads/promo', $image->getClientOriginalName());

            $oldImagePath = 'public/uploads/promo/' .$promoSection->image_path;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

           $promoSection->update(['image_path' => $image->getClientOriginalName(),
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
