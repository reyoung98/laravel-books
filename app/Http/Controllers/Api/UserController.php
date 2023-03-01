<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;                // need to use User model

class UserController extends Controller
{
    public function index()
    {
        // User model automatically comes with Laravel
        $users = User::orderBy('id', 'asc')
        ->limit(100)
        ->get();

        return $users;          // automatically transformed into JSON string with headers
    }
}
