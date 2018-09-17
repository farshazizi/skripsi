<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerpasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $daf = DB::table('users')
        //     ->join('registration1s', 'users.id', '=', 'registration1s.id_user')
        //     ->join('registration2s', 'users.id', '=', 'registration2s.id_user')
        //     ->join('registration3s', 'users.id', '=', 'registration3s.id_user')
        //     ->join('registration4s', 'users.id', '=', 'registration4s.id_user')
        //     ->join('registration7s', 'users.id', '=', 'registration7s.id_user')
        //     ->join('registration8s', 'users.id', '=', 'registration8s.id_user')
        //     ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri')
        //     ->get();
        // $daf = DB::table('users')
        //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
        //     ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
        //     ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
        //     ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
        //     ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
        //     ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri', 'data_pasangan.*')
        //     ->get();
        // return view('admin.pages.match', compact('daf'));
        // return view('admin.pages.dash', compact('daf'));
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
