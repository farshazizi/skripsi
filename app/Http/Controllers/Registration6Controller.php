<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration1;
use App\registration6;
use Auth;
use DB;

class Registration6Controller extends Controller
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
        // return view('form/registration6', $data);

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
            // return redirect('registration2');
            return redirect()->route('registration2');
        } elseif ($posisi == 3) {
            // return redirect('registration3');
            return redirect()->route('registration3');
        } elseif ($posisi == 4) {
            // return redirect('registration4');
            return redirect()->route('registration4');
        } elseif ($posisi == 5) {
            // return redirect('registration5');
            return redirect()->route('registration5');
        } elseif ($posisi == 6) {
            // $data['id_user'] = $request['id_user'];
            return view('form/registration6');
            // return redirect('registration/6');
        } elseif ($posisi == 7) {
            // return redirect('registration7');
            return redirect()->route('registration7');
        } elseif ($posisi == 8) {
            // return redirect('registration8');
            return redirect()->route('registration8');
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
            'id_user'                   => 'required',
            // 'kelebihan'                 => 'required',
            // 'kekurangan'                => 'required',
            'deskripsi_diri'            => 'required',
            'visi_pernikahan'           => 'required',
            // 'misi_pernikahan'           => 'required',
            'kehidupan_rumah_tangga'    => 'required',
        ));

        // store in the database
        $reg1 = new Registration1;
        $reg6 = new Registration6;

        $reg6->id_user                  = Auth::user()->id;
        // $reg6->kelebihan                = $request->kelebihan;
        // $reg6->kekurangan               = $request->kekurangan;
        $reg6->deskripsi_diri           = $request->deskripsi_diri;
        $reg6->visi_pernikahan          = $request->visi_pernikahan;
        // $reg6->misi_pernikahan          = $request->misi_pernikahan;
        $reg6->kehidupan_rumah_tangga   = $request->kehidupan_rumah_tangga;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        // $reg1 = Registration1::find($request->id_user);
        $reg1->posisi = 7;    
        $reg1->save();

        $reg6->save();

        // $data['id_user'] = $reg6->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration4.create', $reg4->id);
        // return redirect()->route('registration7.create', $data);
        return redirect()->route('registration7');
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
