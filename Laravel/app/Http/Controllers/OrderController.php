<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }
    public function store(Request $request)
    {
        $request->validate([
            'number' => ['nullable'],
            'value' => ['nullable'],
            'customer_id' => ['required'],
        ]);

        $order = new Order;
        $order->number = $request->number;
        $order->value = $request->value;
        $order->customer_id = $request->customer_id;
        $order->save();
        return $order;
    }
    public function edit(Request $request)
    {
        $order = Order::findorfail($request->id);
        $order->number = $request->number;
        $order->value = $request->value;
        $order->customer_id = $request->customer_id;
        $order->update();
        return $order;
    }
}
