<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validations = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validations))
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid email or password');
        }



    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
