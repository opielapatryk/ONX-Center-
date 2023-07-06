<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Customercar;

class CustomercarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customercar = Customercar::all();
        return response()->json($customercar);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => ['required'],
            'model' => ['required'],
            'number_plate' => ['bail','required', 'unique:customercars', 'max:5'],
            'customer_id' => ['required'],
        ]);

        $customercar = new Customercar;
        $customercar->brand = $request->brand;
        $customercar->model = $request->model;
        $customercar->number_plate = $request->number_plate;
        $customercar->customer_id = $request->customer_id;
        $customercar->save();
        return $customercar;
    }
    public function edit(Request $request)
    {
        $customercar = Customercar::findorfail($request->id);
        $customercar->brand = $request->brand;
        $customercar->model = $request->model;
        $customercar->number_plate = $request->number_plate;
        $customercar->customer_id = $request->customer_id;
        $customercar->update();
        return $customercar;
    }
}
