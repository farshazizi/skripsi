<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration2;
use App\Registration3;
use App\Registration4;
use App\Registration7;
use App\Registration8;
use App\User;
use Auth;
use DB;

class BiodataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daf = DB::table('users')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
            ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
            ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
            ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.*')
            ->where('users.id', '=', Auth::user()->id)
            ->get();
            // dd($daf);

        return view('user.pages.biodata_diri', compact('daf'));
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
    public function update(Request $request, $id_user)
    {
        // dd($request->all());
        // dd($id_user);
        // dd($reg1);
        // $reg1 = Registration1::find($id_user);
        $reg1 = Registration1::where('id_user', '=', $id_user)->first();
        $reg1->alamat_tinggal_saat_ini  = $request->input('alamat_tinggal_saat_ini');
        $reg1->handphone                = $request->input('handphone');
        $reg1->pekerjaan                = $request->input('pekerjaan');

        // $reg1 = DB::table('registration1s')
        //     ->where('id_user', '=', $id_user)
        //     ->update(['alamat_tinggal_saat_ini' => $request->input('alamat_tinggal_saat_ini'), 'handphone' => $request->input('handphone'), 'pekerjaan' => $request->input('pekerjaan')]);
        
        // $reg4 = Registration4::find($id_user);
        $reg4 = Registration4::where('id_user', '=', $id_user)->first();
        $reg4->pendidikan_terakhir      = $request->input('pendidikan_terakhir');
        $reg4->ibadah_sunnah            = $request->input('ibadah_sunnah');
        $reg4->visi_pernikahan          = $request->input('visi_pernikahan');

        // $reg4 = DB::table('registration4s')
        //     ->where('id_user', '=', $id_user)
        //     ->update(['pendidikan_terakhir' => $request->input('pendidikan_terakhir'), 'ibadah_sunnah' => $request->input('ibadah_sunnah'), 'visi_pernikahan' => $request->input('visi_pernikahan')]);

        $reg1->save();
        $reg4->save();

        $reg8 = Registration8::where('id_user', '=', $id_user)->first();
        if ($request->hasFile('ktp')) {
            // $img = Registration8::find($id_user);
            $img = Registration8::where('id_user', '=', $id_user)->first();
            // dd($img);
            $path = base_path().'/public/images/ktp/' .$img->ktp;
            
            if (file_exists($path)) {
                unlink($path);
            }
            
            $photo = $request->file('ktp');
            $destination = base_path().'/public/images/ktp/';
            $filename = $photo->getClientOriginalName();
            $photo->move($destination,$filename);
            $reg8['ktp'] = $filename;
        }
        $reg8->save();

        return back();
        // return redirect()->route('biodata-diri.index');
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
