<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
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
            ->paginate(20);

        return view('admin.employees.index', [
            'breadcrumbTitle' => $breadcrumbTitle,
            'employees' => $employees,
            'filter' => $filter,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.employees.create');
    }

     

    public function edit($id)
    {
        $breadcrumbTitle = 'Edit';
        $employees = Employee::where('id', $id)->firstOrFail();
        return view('admin.employees.edit', compact('employees', 'breadcrumbTitle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'nullable|in:Backend Developer,Frontend Developer,UI/UX Developer,Mobile Developer,Fullstack Developer,DevOps Developer',
            'role' => 'nullable|in:Employee,Staff,Internship,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'fingerprint_id' => 'required|integer|unique:employees,fingerprint_id',
        ]);

        $employees = Employee::findOrFail($id);

        $employees->update($request->only(['name', 'division', 'role', 'fingerprint_id']));

        return redirect()->route('admin.employees.index')->with('success', true)->with('toast', 'update');
    }

    public function destroy($id)
    {
        $employees = Employee::findOrFail($id);

        $employees->delete();

        return redirect()->route('admin.employees.index')->with('success', true)->with('toast', 'delete');
    }
}
