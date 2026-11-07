<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
 public function index()
    {
        $departments = Department::withCount('employees')->orderBy('name')->get();
        return view('departments.index', compact('departments'));
    }
    public function store(Request $request)
    {
     $request->validate(['name' => 'required|string|max:100|unique:departments,name']);
     Department::create(['name' => $request->name]);
     return back()->with('success', 'Department added successfully');
    }
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:departments,name,' . $department->id,
        ]);
        $department->update(['name' => $request->name]);

        return redirect()->route('departments.index')->with('success', 'Department updated');
    }
    public function destroy(Department $department)
    {
        if ($department->employees()->exists()) {
            return back()->with('error', 'Cannot delete: employees exist in this department');
        }

        $department->delete();
        return back()->with('success', 'Department deleted');
    }
}
