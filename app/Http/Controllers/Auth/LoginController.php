<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/registration';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectPath(){
    //     $user = \Auth::User();
    //     $role = $user->roles()->first()->name;
    //     if ($role == "admin") {
    //         return "/reborn";
    //     }
    //     // elseif ($role == "pengusul") {
    //     //     return "/pengusul/";
    //     // }elseif ($role == "penilai") {
    //     //     return "/penilai/";
    // }

    protected function authenticated(Request $request, $user){
        // dd($user->hasRole('admin'));
        // dd($request->all());
        // if ($user->hasRole('admin')) {// do your margic here
        //     return redirect('/reborn');
        // }else{
        //     return redirect('/home');
        // }
    }
}
