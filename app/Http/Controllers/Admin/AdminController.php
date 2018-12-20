<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function dashboard()
    {
    	//return 'Admin Dashboard';
    	//return dump(Auth::user()->roles);//проверка связи пользователя с ролью
    	//return dump(Auth::user()->hasRole('admin'));//проверка admin?
    	return view('admin.dashboard');

    }
}
