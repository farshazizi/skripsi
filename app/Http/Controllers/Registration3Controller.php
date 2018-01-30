<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration3;
use Auth;
use DB;

class Registration3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $data['id_user'] = $request['id_user'];
        // return view('form/registration3', $data);

        $a = DB::table('registration1s')
        ->select('posisi')
        ->where('id_user', '=', Auth::user()->id)->get();

        if ($a->isEmpty()){
            $posisi=1;
        } else{
            $posisi = ($a[0]->posisi);
        }

        if ($posisi == 1) {
            // return redirect('registration');
            return redirect()->route('registration1');
        } elseif ($posisi == 2) {
            // return redirect('registration/2');
            return redirect()->route('registration2');
        } elseif ($posisi == 3) {
            // $data['id_user'] = $request['id_user'];
            return view('form/registration3');
            // return redirect('registration/3');
        } elseif ($posisi == 4) {
            // return redirect('registration/4');
            return redirect()->route('registration4');
        } elseif ($posisi == 7) {
            // return redirect('registration/7');
            return redirect()->route('registration7');
        } elseif ($posisi == 8) {
            // return redirect('registration/8');
            return redirect()->route('registration8');
        } elseif ($posisi == 9) {
            // return redirect('registration/8');
            return view('form/waiting');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'nama_ayah'     => 'required',
            'suku_ayah'     => 'required',
            'nama_ibu'      => 'required',
            'suku_ibu'      => 'required',
            'alamat_ortu'   => 'required',
        ));

        // store in the database
        $reg1 = new Registration1;
        $reg3 = new Registration3;

        $reg3->id_user      = Auth::user()->id;
        $reg3->nama_ayah    = $request->nama_ayah;
        $reg3->suku_ayah    = $request->suku_ayah;
        $reg3->nama_ibu     = $request->nama_ibu;
        $reg3->suku_ibu     = $request->suku_ibu;
        $reg3->alamat_ortu  = $request->alamat_ortu;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        // $reg1 = Registration1::find($request->id_user);
        $reg1->posisi = 4;    
        $reg1->save();

        $reg3->save();

        // $data['id_user'] = $reg3->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration4.create', $reg3->id);
        // return redirect()->route('registration4.create', $data);
        return redirect()->route('registration4');
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
