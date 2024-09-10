<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'required|in:Backend Developer,Frontend Developer,UI/UX Depelover,Mobile Developer,Fullstack Depelover,DevOps Developer',
            'role' => 'required|in:Staff,Instership,Praktik Kerja Lapangan,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'fingerprint_id' => 'nullable|integer',
        ]);

        Employee::create([
            'id' => (string) \Illuminate\Support\Str::uuid(), // Generate a new UUID
            'name' => $request->input('name'),
            'division' => $request->input('division'),
            'role' => $request->input('role'),
            'fingerprint_id' => $request->input('fingerprint_id')
        ]);

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'required|in:Backend Developer,Frontend Developer,UI/UX Depelover,Mobile Developer,Fullstack Depelover,DevOps Developer',
            'role' => 'required|in:Staff,Instership,Praktik Kerja Lapangan,Lead,Project Manager,Human Resource Development,Finance,Direktur',
            'fingerprint_id' => 'nullable|integer',
        ]);

        $employee->update($request->only([
            'name', 
            'division', 
            'role', 
            'fingerprint_id'
        ]));

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
