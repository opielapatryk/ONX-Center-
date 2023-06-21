<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function show($id)
    {
        $employee = Employee::find($id);
        
        return view('employees.show', compact('employee'));
    }
}
