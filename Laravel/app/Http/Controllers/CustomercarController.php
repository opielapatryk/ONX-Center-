<?php

namespace App\Http\Controllers;

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
}
