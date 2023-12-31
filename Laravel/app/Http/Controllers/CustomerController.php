<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all()->toArray();
        return $customer;
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $firstAvailableId = Customer::getFirstAvailableId();


        $request->validate([
            'name' => ['required','max:200', 'string'],
            'email' => ['bail','required', 'unique:customers', 'email','max:200','string'],
            'phone' => ['bail','required', 'unique:customers', 'numeric'],
        ]);

        $customer = new Customer;
        $customer->id = $firstAvailableId;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();
        return $customer;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $customer = Customer::findorfail($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->update();
        return $customer;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) 
    {
        $customer = Customer::findorfail($request->id)->delete();
        return response()->json('Deleted successfully');
    }

    
    public function destroy($id)
{
    $customer = Customer::findOrFail($id);
    $customer->delete();
    return response()->json('Deleted successfully');
}


    public function read($request)
    {
        $customer = Customer::where("id", $request)->get();
        return $customer;
    }


}
