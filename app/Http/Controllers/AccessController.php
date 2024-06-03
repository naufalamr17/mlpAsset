<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\access;

class AccessController extends Controller
{
    public function index()
    {
        // Mengambil semua data user dan access
        $users = User::all();
        $accesses = access::all();

        // dd($users);

        return view('user', compact('users', 'accesses'));
    }
}
