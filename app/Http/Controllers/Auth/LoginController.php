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
    
    protected function authenticated(Request $request, $user)
    {
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/user/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }

}
