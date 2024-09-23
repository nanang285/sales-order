<?php

namespace App\Http\Controllers\Admin\Homepages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\VissionMission;

class VissionMissionController extends Controller
{
    public function index()
    {
        $breadcrumbTitle = 'Tentang';
        $Vission = VissionMission::first();
        return view('admin.homepages.visi-misi', compact('Vission', 'breadcrumbTitle'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required|string',
            'list_items' => 'required|array',
        ]);

        VissionMission::create([
            'description' => $request->description,
            'list_items' => json_encode($request->list_items),
        ]);

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'description' => 'required|string|max:1000',
            'list_items' => 'required|array',
        ]);

        $Vission = VissionMission::findOrFail($id);

        $Vission->description = $request->description;
        $Vission->list_items = json_encode($request->list_items);
        $Vission->save();

        return redirect()->route('admin.visi-misi.index')->with('success', true)->with('toast', 'edit');
    }
}
