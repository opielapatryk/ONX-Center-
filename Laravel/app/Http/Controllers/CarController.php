<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\User;

class CarController extends Controller
{
    public function setActiveCar(Request $request, $userId)
{
    $user = User::findOrFail($userId);

    $carId = $request->input('active_car');

    if ($carId) {
        $user->cars()->update(['is_active' => false]); // Deactivate all cars for the user
        $activeCar = $user->cars()->find($carId);
        if ($activeCar) {
            $activeCar->is_active = true;
            $activeCar->save();
        }
    }

    return redirect()->back();
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Cars::all();
        return response()->json($cars);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'is_active' => ['required'],
            'brand' => ['required'],
            'model' => ['required'],
            'number_plate' => ['required'],
            'user_id' => ['required'],
        ]);

        $cars = new Cars;
        $cars->is_active = $request->is_active;
        $cars->brand = $request->brand;
        $cars->model = $request->model;
        $cars->number_plate = $request->number_plate;
        $cars->user_id = $request->user_id;
        $cars->save();
        return $cars;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $cars = Cars::findorfail($request->id);
        $cars->is_active = $request->is_active;
        $cars->brand = $request->brand;
        $cars->model = $request->model;
        $cars->number_plate = $request->number_plate;
        $cars->user_id = $request->user_id;
        $cars->update();
        return $cars;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) 
    {
        $cars = Cars::findorfail($request->id)->delete();
        return response()->json('Deleted successfully');
    }
    public function read($request)
    {
        $cars = Cars::where("id", $request)->get();
        return $cars;
    }
}
