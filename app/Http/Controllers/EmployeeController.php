<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $attendances = Attendance::all();

        $user = Auth::user();
        $isAdmin = $user->role === 'admin';

        $search = $request->input('search');
        $filter = '';
        $breadcrumbTitle = 'Karyawan';

        $employees = Employee::search($search)->orderBy('name', 'asc')->paginate(100);

        return view('admin.employees.index', [
            'breadcrumbTitle' => $breadcrumbTitle,
            'employees' => $employees,
            'search' => $search,
            'filter' => $filter,
            'isAdmin' => $isAdmin,
            'attendances' => $attendances,
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'division' => 'nullable|in:Backend Developer,Frontend Developer,UI/UX Developer,Mobile Developer,Fullstack Developer,DevOps Developer',
            'role' => 'nullable|in:Employee,Staff,Internship,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'attendance_id' => 'required|exists:attendances,id',
            'fingerprint_id' => 'required|integer|unique:employees,fingerprint_id',
        ]);

        $attendance = Attendance::findOrFail($request->attendance_id);

        Employee::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'name' => $request->input('name'),
            'division' => $request->input('division'),
            'role' => $request->input('role'),
            'jam_masuk' => $attendance->time_in,
            'jam_masuk_maksimal' => $attendance->time_in_max,
            'jam_keluar' => $attendance->time_out,
            'jam_keluar_minimal' => $attendance->time_out_min,
            'fingerprint_id' => $request->input('fingerprint_id'),
        ]);

        return redirect()->route('admin.employees.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'division' => 'nullable|in:Backend Developer,Frontend Developer,UI/UX Developer,Mobile Developer,Fullstack Developer,DevOps Developer',
            'role' => 'nullable|in:Employee,Staff,Internship,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'attendance_id' => 'required|exists:attendances,id',
        ]);

        $employee = Employee::findOrFail($id);

        $attendance = Attendance::findOrFail($request->attendance_id);

        $employee->update([
            'name' => $request->input('name'),
            'division' => $request->input('division'),
            'role' => $request->input('role'),
            'jam_masuk' => $attendance->time_in,
            'jam_masuk_maksimal' => $attendance->time_in_max,
            'jam_keluar' => $attendance->time_out,
            'jam_keluar_minimal' => $attendance->time_out_min,
        ]);

        return redirect()->route('admin.employees.index')->with('success', true)->with('toast', 'edit');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            session()->flash('Error', 'Error, Kamu tidak memiliki akses ini.');
            return redirect()->back();
        }

        $employees = Employee::findOrFail($id);

        $employees->delete();

        return redirect()->route('admin.employees.index')->with('success', true)->with('toast', 'delete');
    }
}
