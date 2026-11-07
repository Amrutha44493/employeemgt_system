<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
  private function rules($id = null)
    {
        return [
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:employees,email,' . $id,
            'phone'         => 'required|digits:10',
            'dob'           => 'required|date|before:today',
            'gender'        => 'required|in:Male,Female,Other',
            'address'       => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

public function index(Request $request)
{
    $employees = Employee::with('department')
        ->when($request->search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhereHas('department', fn($d) => $d->where('name', 'like', "%{$search}%"));
            });
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('employees.index', compact('employees'));
}
    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('employees.create', compact('departments'));
    }
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Employee successfully added');
    }
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name')->get();
        return view('employees.edit', compact('employee', 'departments'));
    }
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate($this->rules($employee->id));
        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);   
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee data updated');
    }
    public function destroy(Employee $employee)
    {
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();
        return back()->with('success', 'Employee deleted');
    }
}
