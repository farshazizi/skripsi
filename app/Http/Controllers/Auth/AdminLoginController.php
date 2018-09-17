<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct() {
		$this->middleware('guest:admin');
	}

    public function showLoginForm() {
    	return view('admin.admin_login');
    }

    public function login(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('user.index'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);

    //     foreach ($this->guard()->user()->role as $role) {
    //         if ($role->name == 'admin') {
    //             return redirect('/admin/dashboard');
    //         }elseif ($role->name == 'user') {
    //             return redirect('/home');
    //         }
    //     }
    // }
}
