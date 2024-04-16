<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('User.Authentication.login');
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return $this->redirectToDashboard();
        }

        // Authentication failed...
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    protected function redirectToDashboard()
    {
        $user = Auth::user();

        switch ($user->role->name) {
            case 'admin':
                return redirect()->route('admindashboard');
            case 'customer':
                // Retrieve the intended URL from the session
                $intendedUrl = session('url.intended');
                // If the intended URL is not set or is invalid, use the userdashboard route
                $redirectRoute = $intendedUrl ? $intendedUrl : route('userdashboard');

                // Clear the intended URL from the session
                session()->forget('url.intended');

                return redirect($redirectRoute);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
