<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function indexadmin()
    {
        return view('admin.index');
    }

    public function indexuser()
    {
        return view('user.index');
    }
}
