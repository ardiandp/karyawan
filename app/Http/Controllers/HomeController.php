<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function indexadmin()
    {
        if(auth()->user() == null){
            return redirect('/login');
        }
        return view('admin.index');
    }

    public function indexuser()
    {
        return view('user.index');
    }
}
