<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index($userId)
    {
        $users = User::all();
        $user = User::with('cars')->find($userId);

        return view('garage', compact('user', 'users'));
    }
}
