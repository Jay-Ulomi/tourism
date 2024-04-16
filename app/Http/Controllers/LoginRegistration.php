<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\AuthenticatesUsers;
class LoginRegistration extends Controller
{
    public function login(){
        return view('User.Authentication.login');
    }


    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirect users based on their role after successful login
        if ($user->role && $user->role->name === 'admin') {
            // return redirect()->route('admin.dashboard');
        } elseif ($user->role && $user->role->name === 'customer') {
            return("Cstomer");
            // return redirect()->route('home');
        }

        // Default redirect for users without a specific role
        return redirect($this->redirectTo);
    }
}
