<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log_taaruf;
use AUth;
use DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = DB::table('log_taaruf')
        //     ->select('id_menolak')
        //     ->where('id_penolak', '=', Auth::user()->id)
        //     ->first();
            // dd($id);

        $log = DB::table('log_taaruf')
            ->leftJoin('registration1s', 'log_taaruf.id_penolak', '=', 'registration1s.id_user')
            ->select('log_taaruf.*', 'registration1s.*')
            ->where('log_taaruf.id_penolak', '=', Auth::user()->id)
            // ->where('log_taaruf.id_menolak', '=', Auth::user()->id)
            // ->where('registration1s.id_user', '=', $id->id_menolak)
            ->get();
        // dd($log);

        return view('user.pages.riwayat', compact('log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
