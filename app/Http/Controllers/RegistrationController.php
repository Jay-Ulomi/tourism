<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RegistrationController extends Controller
{
    public function register(){
        return view('User.Authentication.registration');
    }

    public function registration(Request $request)
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

        $user = User::create($validatedData);
        $customerRole = Role::where('name', 'customer')->first();
        $user->role()->associate($customerRole);
        $user->save();


        if ($user && $user->role) {

            return redirect()->route('login');
        } else {
           
            return redirect()->route('register')->with('error', 'Failed to create user or assign role');
        }
    }

}
