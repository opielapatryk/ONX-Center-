<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'customer_id' => ['required'],
        ]);

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->customer_id = $request->customer_id;
        $employee->save();
        return $employee;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $employee = Employee::findorfail($request->id);
        $employee->name = $request->name;
        $employee->customer_id = $request->customer_id;
        $employee->update();
        return $employee;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) 
    {
        $employee = Employee::findorfail($request->id)->delete();
        return response()->json('Deleted successfully');
    }
    public function read($request)
    {
        $employee = Employee::where("id", $request)->get();
        return $employee;
    }
}
