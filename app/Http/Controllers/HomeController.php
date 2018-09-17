<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('home');

        $request->user()->authorizeRoles(['user', 'admin']);

        if($request->user()->hasRole('user')){
            return view('home');
        }
        if($request->user()->hasRole('admin')){
            // return view('admin.pages.user');
            return redirect('/admin/user');
        }
    }
}
