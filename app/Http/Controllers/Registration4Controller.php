<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration4;
use Auth;
use DB;

class Registration4Controller extends Controller
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
        // return view('form/registration4', $data);

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
            // $data['id_user'] = $request['id_user'];
            return view('form/registration4');
            // return redirect('registration/4');
        } elseif ($posisi == 5) {
            // return redirect('registration5');
            return redirect()->route('registration5');
        } elseif ($posisi == 6) {
            // return redirect('registration6');
            return redirect()->route('registration6');
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
            'id_user'           => 'required',
            // 'sd'                => 'required',
            // 'smp'               => 'required',
            // 'sma'               => 'required',
            // 'perguruan_tinggi'      => 'required',
            'pendidikan_terakhir'   => 'required',
            // 'prestasi'              => 'required',
            // 'organisasi'            => 'required',
            // 'pengalaman_kerja'      => 'required',
            'keahlian_khusus'       => 'required',
            // 'moto'              => 'required',
            // 'hobi'              => 'required',
            'jamaah_diikuti'    => 'required',
            'ibadah_sunnah'     => 'required',
            'deskripsi_diri'            => 'required',
            'visi_pernikahan'           => 'required',
            'kehidupan_rumah_tangga'    => 'required',
        ));

        // // store in the database
        $reg1 = new Registration1;
        $reg4 = new Registration4;

        $reg4->id_user          = Auth::user()->id;
        // $reg4->sd               = $request->sd;
        // $reg4->smp              = $request->smp;
        // $reg4->sma              = $request->sma;
        // $reg4->perguruan_tinggi     = $request->perguruan_tinggi;
        $reg4->pendidikan_terakhir  = $request->pendidikan_terakhir;
        // $reg4->prestasi             = $request->prestasi;
        // $reg4->organisasi           = $request->organisasi;
        // $reg4->pengalaman_kerja     = $request->pengalaman_kerja;
        $reg4->keahlian_khusus      = $request->keahlian_khusus;
        // $reg5->moto                 = $request->moto;
        // $reg5->hobi                 = $request->hobi;
        $reg5->jamaah_diikuti       = $request->jamaah_diikuti;
        $reg5->ibadah_sunnah        = $request->ibadah_sunnah;
        $reg6->deskripsi_diri           = $request->deskripsi_diri;
        $reg6->visi_pernikahan          = $request->visi_pernikahan;
        $reg6->kehidupan_rumah_tangga   = $request->kehidupan_rumah_tangga;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        // $reg1 = Registration1::find($request->id_user);
        $reg1->posisi = 7;    
        $reg1->save();

        $reg4->save();

        // $data['id_user'] = $reg4->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration4.create', $reg4->id);
        return redirect()->route('registration5');
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
