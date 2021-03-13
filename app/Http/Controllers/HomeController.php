<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(!\Auth::check()){
            return redirect('/login');
        }

        $redirects = ['user' => 'user-dashboard-index', 'super_admin' => 'super-dashboard-index', 'admin' => 'admin-dashboard-index'];
        return redirect()->route($redirects[auth()->user()->type]);
    }
}
