<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        return view('auth.home', compact('user'));
    }
}
