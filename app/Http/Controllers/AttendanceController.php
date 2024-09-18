<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::first();
        $breadcrumbTitle = 'Attendance';

        return view('admin.absen.time-setting', compact('attendances', 'breadcrumbTitle'));
    }

    public function store(Request $request)
    {
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
        $attendances = Attendance::findOrFail($id);

        // \Log::info('Request Data:', $request->all());

        // Validasi untuk memastikan semua field harus terisi
        $request->validate([
            'time_in' => 'required|date_format:H:i',
            'time_in_max' => 'required|date_format:H:i',
            'time_out_min' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        $attendances->update($request->all());

        return redirect()->route('admin.attendance.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $attendances = Attendance::findOrFail($id);

        // Hapus data
        $attendances->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.attendance.index')->with('success', true)->with('toast', 'delete');

    }
}
