<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan dashboard user.
     */
    public function index()
    {
        return view('user.dashboard');
    }
}
