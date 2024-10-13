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
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

            // Redirect based on role
            switch ($user->role_id) {
                case 1: // Admin
                    return redirect()->route('products.index');
                case 2: // Distributor
                    return redirect()->route('stockDistributor');
                case 3: // Salesman
                    return redirect()->route('salesman.attendance');
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
