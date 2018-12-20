<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RisepshenController extends Controller
{
    function dashboard()
    {
    	return view('risepshen.dashboard');

    }
}
