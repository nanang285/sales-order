<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RecruitmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->query('filter', 'newest');

        $breadcrumbTitle = 'Recruitment';

        $recruitments = Recruitment::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
            })
            ->when($filter, function ($query, $filter) {
                if ($filter == 'newest') {
                    return $query->orderBy('created_at', 'desc');
                } elseif ($filter == 'oldest') {
                    return $query->orderBy('created_at', 'asc');
                }
            })
            ->paginate(10);

        return view('admin.recruitment.index', [
            'breadcrumbTitle' => $breadcrumbTitle,
            'recruitments' => $recruitments,
            'filter' => $filter,
            'search' => $search,
        ]);
    }

    public function searchByName(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $name = $request->input('name');
        $recruitments = Recruitment::where('name', 'LIKE', "%{$name}%")->get();

        return view('admin.recruitment.index', compact('recruitments'));
    }

    public function searchByEmail(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $recruitments = Recruitment::where('email', $email)->get();

        foreach ($recruitments as $recruitment) {
            if ($recruitment->stage4) {
                $recruitment->last_stage = 'Selamat Anda Telah Lolos Semua Seleksi';
            } elseif ($recruitment->stage3) {
                $recruitment->last_stage = 'Selamat Anda Lolos Ke tahap Offering';
            } elseif ($recruitment->stage2) {
                $recruitment->last_stage = 'Selamat Anda Lolos Ke tahap Interview';
            } elseif ($recruitment->stage1) {
                $recruitment->last_stage = 'Selamat Anda Lolos Ke tahap Test Project';
            } else {
                $recruitment->last_stage = 'Proses Seleksi Belum Dimulai';
            }
        }

        return view('recruitment/check-recruitment', compact('recruitments'));
    }

    public function edit($uuid)
    {
        $recruitment = Recruitment::where('uuid', $uuid)->firstOrFail();
        $breadcrumbTitle = 'Edit';
        return view('admin.recruitment.edit', compact('recruitment', 'breadcrumbTitle'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required|email|unique:recruitments,email',
            'name' => 'required|string|max:50',
            'nik' => 'nullable|numeric|digits_between:1,16',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'study' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|string|max:50',
            'file_path' => 'required|mimes:pdf|max:5000',
        ]);

        $recruitment = Recruitment::findOrFail($id);

        $updateData = [
            'email' => 'required|email|unique:recruitments,email',
            'name' => 'required|string|max:50',
            'nik' => 'nullable|numeric|digits_between:1,16',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'study' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|string|max:50',
            'file_path' => 'required|mimes:pdf|max:5000',
        ];

        $recruitment->update($updateData);

        return redirect()->route('galery')->with('success', true)->with('toast', 'edit');
    }

    public function updateStage(Request $request, $uuid, $stage)
    {
        $recruitment = Recruitment::where('uuid', $uuid)->firstOrFail();

        if ($recruitment->failed_stage) {
            return redirect()->route('admin.recruitment.edit', $uuid)->with('error', 'Proses sudah dihentikan sebelumnya');
        }

        if ($request->input('action') === 'yes') {
            $recruitment->update([$stage => true]);
        } else {
            $stageDescriptions = [
                'stage1' => 'Check CV',
                'stage2' => 'Test Project',
                'stage3' => 'Interview',
                'stage4' => 'Offering',
            ];

            $recruitment->update(['failed_stage' => $stageDescriptions[$stage]]);
            return redirect()->route('admin.recruitment.edit', $uuid)->with('error', 'Proses dihentikan');
        }

        return redirect()->route('admin.recruitment.edit', $uuid);
    }

    public function add()
    {
        $breadcrumbTitle = 'Add';
        return view('admin.recruitment.add', compact('breadcrumbTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:recruitments,email',
            'name' => 'required|string|max:50',
            'nik' => 'nullable|numeric|digits_between:1,16',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:14',
            'study' => 'required|string',
            'position' => 'required|string',
            'onsite' => 'required|string',
            'test' => 'required|string',
            'agree' => 'required|string',
            'salary' => 'required|string|max:9',
            'portfolio' => 'nullable',
            'file_path' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            $file = $request->file('file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/recruitment', $fileName, 'public');

            $recruitment = Recruitment::create([
                'uuid' => Str::uuid(),
                'email' => $request->email,
                'name' => $request->name,
                'nik' => $request->nik,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'study' => $request->study,
                'position' => $request->position,
                'onsite' => $request->onsite,
                'test' => $request->test,
                'agree' => $request->agree,
                'salary' => $request->salary,
                'portfolio' => $request->portfolio,
                'file_path' => $fileName,
            ]);

            // Kirim notifikasi ke email Pelamar
            Mail::to($request->email)->send(new RecruitmentReceived($recruitment));

            // Kirim notifikasi ke email Admin
            Mail::to('nngs.me@gmail.com')->send(new RecruitmentStored($recruitment));

            $token = Str::random(64);
            session(['valid_token' => $token]);

            return redirect()->route('success', ['token' => $token]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store data')->withInput();
        }
    }

    public function Adminstore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:recruitments,email',
            'name' => 'required|string|max:50',
            'nik' => 'nullable|numeric|digits_between:1,16',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'study' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|string|max:50',
            'file_path' => 'required|mimes:pdf|max:1024',
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

            return redirect()->route('admin.recruitment.index')->with('success', true)->with('toast', 'add');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store data')->withInput();
        }
    }

    public function destroy($uuid)
    {
        $recruitment = Recruitment::where('uuid', $uuid)->firstOrFail();
        $recruitment = Recruitment::findOrFail($uuid);

        if ($recruitment->file_path) {
            Storage::disk('public')->delete('uploads/recruitment/' . $recruitment->file_path);
        }

        $recruitment->delete();
        return redirect()->route('admin.recruitment.index')->with('success', true)->with('toast', 'delete');
    }
}
