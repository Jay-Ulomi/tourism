<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showall()
    {
        $user=Auth::user();

        $users = User::all();
        return view("Admin.users.view_user ",compact('users','user'));
    }

    public function create()
    {
        $user=Auth::user();

        return view("Admin.users.adduser ",compact('user'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'age' => 'nullable|integer',
            'nationality' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $user = User::create($validatedData); // Create user first
        $customerRole = Role::where('name', 'customer')->first();
        $user->role()->associate($customerRole);
        $user->save(); // Save user after associating the role

        return back()->with('message','Successfull');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'email|unique:users|max:255',
            'age' => 'nullable|integer',
            'nationality' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'password' => 'string|max:255',
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

      
    }
}
