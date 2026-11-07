<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;

class DashboardController extends Controller
{
     public function index()
    {
        return view('dashboard', [
            'employeeCount'   => Employee::count(),
            'departmentCount' => Department::count(),
        ]);
    }
}
