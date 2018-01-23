<?php

namespace App\Http\Middleware;

use Closure;
use App\Registration1;
use Auth;
use DB;

class CekPosisi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $posisi)
    {
        // return Auth::user()->id;
        // $a = DB::table('registration1s')
        // ->select('posisi')
        // ->where('id', '=', Auth::user()->id)->get();
        // return $a[0]->posisi;
        // return $a;

        $reg1 = Registration1::find($posisi);
        if ($posisi == 2) {
            return redirect('registration/2');
        } elseif ($posisi == 3) {
            return redirect('registration/3');
        } elseif ($posisi == 4) {
            return redirect('registration/4');
        } elseif ($posisi == 5) {
            return redirect('registration/5');
        } elseif ($posisi == 6) {
            return redirect('registration/6');
        } elseif ($posisi == 7) {
            return redirect('registration/7');
        } elseif ($posisi == 8) {
            return redirect('registration/8');
        }
        return $next($request);
    }
}
