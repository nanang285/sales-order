<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitment = Recruitment::all();
        $studies = Recruitment::distinct('study')->pluck('study');
        $count = $studies->count();

        return view('admin.recruitment.index', [
            'recruitments' => $recruitment,
            'count' => $count,
        ]);
    }

    public function show($uuid)
    {

        $recruitment = Recruitment::where('uuid', $uuid)->firstOrFail();
        return view('admin.recruitment.show', compact('recruitment'));
    }

    public function create()
    {
        return view('recruitment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:recruitments,email',
            'name' => 'required|string|max:50',
            'nik' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'study' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|string|max:50',
            'file_path' => 'required|mimes:jpeg,png,jpg,docx,doc,pdf|max:20480',
        ]);

        try {
            $file = $request->file('file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/recruitment', $fileName, 'public');

            Recruitment::create([
                'uuid' => Str::uuid(),
                'email' => $request->email,
                'name' => $request->name,
                'nik' => $request->nik,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'study' => $request->study,
                'position' => $request->position,
                'salary' => $request->salary,
                'file_path' => $fileName,
            ]);

            return redirect()->route('recruitment')->with('success', true)->with('toast', 'add');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store data')->withInput();
        }
    }

    public function searchByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $recruitment = Recruitment::where('email', $email)->get();

        return view('checkrecruitment', compact('recruitment'));
    }

}
