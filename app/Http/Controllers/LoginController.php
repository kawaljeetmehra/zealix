<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('welcome');
    }

    // Handle the login request
    public function login(Request $request)
    {  
        // Validate the login form inputs
        $request->validate([
            'Username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('Username', 'password');
       
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

            // Redirect based on role
            switch ($user->role_id) {
                case 1: // Admin
                    return redirect()->route('dashboard');
                case 2: // Distributor
                    return redirect()->route('dashboard');
                case 3: // Salesman
                    return redirect()->route('dashboardSalesman');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'loginError' => 'Unauthorized access.',
                    ]);
            }
        }
    
        

        // Authentication failed
        return back()->withErrors([
            'loginError' => 'The provided credentials do not match our records.',
        ]);
    }

    // Log out the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
