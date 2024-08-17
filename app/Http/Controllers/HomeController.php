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

    public function blank()
    {
        return view('example.blank');
    }

    public function table()
    {
        return view('example.table');
    }

    public function kanban()
    {
        return view('example.kanban');
    }

    public function form()
    {
        return view('example.form');
    }

}
