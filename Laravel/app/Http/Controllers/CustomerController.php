<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index($customerId)
    {
        $customers = Customer::all();
        $customer = Customer::with('employee', 'orders')->find($customerId);

        return view('home', compact('customer', 'customers'));
    }
}
