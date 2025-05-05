<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Tampilkan dashboard staff.
     */
    public function index()
    {
        return view('staff.dashboard');
    }
}
