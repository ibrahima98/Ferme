<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        # code...
        return view('admin.dashboard');
    }
    public function commande()
    {
        # code...
        return view('admin.commande');
    }
}
