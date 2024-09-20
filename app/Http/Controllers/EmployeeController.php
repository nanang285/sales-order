<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';

        $search = $request->input('search');
        $filter = $request->query('filter', 'newest');

        $breadcrumbTitle = 'Karyawan';

        $employees = Employee::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")->orWhere('division', 'like', "%{$search}%");
            })
            ->when($filter, function ($query, $filter) {
                if ($filter == 'newest') {
                    return $query->orderBy('created_at', 'desc');
                } elseif ($filter == 'oldest') {
                    return $query->orderBy('created_at', 'asc');
                }
            })
            ->paginate(100);

        return view('admin.employees.index', [
            'breadcrumbTitle' => $breadcrumbTitle,
            'employees' => $employees,
            'filter' => $filter,
            'search' => $search,
            'isAdmin' => $isAdmin,
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
            'name' => 'required|string|max:255',
            'division' => 'nullable|in:Backend Developer,Frontend Developer,UI/UX Developer,Mobile Developer,Fullstack Developer,DevOps Developer',
            'role' => 'nullable|in:Employee,Staff,Internship,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'fingerprint_id' => 'required|integer|unique:employees,fingerprint_id',
        ]);

        Employee::create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'name' => $request->input('name'),
            'division' => $request->input('division'),
            'role' => $request->input('role'),
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
            'name' => 'required|string|max:255',
            'division' => 'nullable|in:Backend Developer,Frontend Developer,UI/UX Developer,Mobile Developer,Fullstack Developer,DevOps Developer',
            'role' => 'nullable|in:Employee,Staff,Internship,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'fingerprint_id' => 'required|integer|unique:employees,fingerprint_id,' . $id,
        ]);

        $employees = Employee::findOrFail($id);

        $employees->update($request->only(['name', 'division', 'role', 'fingerprint_id']));

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
