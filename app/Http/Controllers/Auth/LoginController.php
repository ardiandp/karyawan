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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->role == 'admin') {
                return redirect('/home');
            } else {
                return redirect('/home');
            }
        }
        return redirect('/login')->with('error', 'Login details are not valid');    
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login');
    }

}
