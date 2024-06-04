<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function adduser()
    {
        return view('adduser');
    }

    public function create(Request $request)
    {
        // dd($request->access);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        $userId = $user->id;

        foreach ($request->access as $access) {
            // $user->accesses()->create(['type' => $access]);
            $acc = access::create([
                'user_id' => $userId,
                'access' => $access,
            ]);
            // dd($user->accesses());
        }

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
