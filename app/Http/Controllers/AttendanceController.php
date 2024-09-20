<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';

        $attendances = Attendance::first();
        $breadcrumbTitle = 'Attendance';

        return view('admin.absen.time-setting', compact('attendances', 'breadcrumbTitle', 'isAdmin'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'time_in' => 'required|date_format:H:i',
            'time_in_max' => 'required|date_format:H:i',
            'time_out_min' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        Attendance::create($request->all());

        return redirect()->route('admin.attendance.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $attendances = Attendance::findOrFail($id);

        // \Log::info('Request Data:', $request->all());

        $request->validate([
            'time_in' => 'required|date_format:H:i',
            'time_in_max' => 'required|date_format:H:i',
            'time_out_min' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        $attendances->update($request->all());

        return redirect()->route('admin.attendance.index')->with('success', true)->with('toast', 'edit');
    }
}
