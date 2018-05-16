<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration2;
use Auth;
use DB;

class Registration2Controller extends Controller
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
        // return view('form/registration2', $data);

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
            // $data['id_user'] = $request['id_user'];
            return view('form/registration2');
            // return redirect('registration/2');
        } elseif ($posisi == 3) {
            // return redirect('registration/3');
            return redirect()->route('registration3');
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
        // dd($request->all());
        // dd(Auth::user()->id);
        // dd();
        // validate the data
        $this->validate($request, array(
            'tinggi_badan'      => 'required|max:3',
            'berat_badan'       => 'required|max:3',
            'gol_darah'         => 'required',
            'merokok'           => 'required',
            'riwayat_kesehatan' => 'required',
        ));

        // store in the database        
        $reg1 = new Registration1;
        $reg2 = new Registration2;

        $reg2->id_user           = Auth::user()->id;
        $reg2->tinggi_badan      = $request->tinggi_badan;
        if ($reg1->tinggi_badan >= 120 && $reg1->tinggi_badan <= 200) {
            $reg1->tinggi_badan = $request->tinggi_badan;
        } elseif ($reg1->tinggi_badan < 120) {
            $reg1->tinggi_badan = 120;
        } elseif ($reg1->tinggi_badan > 200) {
            $reg1->tinggi_badan = 200;
        }
        $reg2->berat_badan       = $request->berat_badan;
        if ($reg1->berat_badan >= 40 && $reg1->berat_badan <= 100) {
            $reg1->berat_badan = $request->berat_badan;
        } elseif ($reg1->berat_badan < 40) {
            $reg1->berat_badan = 40;
        } elseif ($reg1->berat_badan > 100) {
            $reg1->berat_badan = 100;
        }
        $reg2->gol_darah         = $request->gol_darah;
        $reg2->merokok           = $request->merokok;
        $reg2->riwayat_kesehatan = $request->riwayat_kesehatan;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        $reg1->posisi = 3;
        $reg1->save();

        $reg2->save();

        // $data['id_user'] = $reg2->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration3.create', $reg2->id);
        // return redirect()->route('registration3.create', $data);
        return redirect()->route('registration3');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('form/testing');
        // $daf = Registration2::where('id_user', $id)->first();
        // $daf = Registration2::orderby('id_user', $id, compact('daf'))->get();
        // return view('admin.pages.detail', compact('daf'));
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

    public function registration(Request $request)
    {
        // $data = [];
        // $data['id_user'] = $request['id_user'];
        // return view('form/registration2', $data);
    }

    public function simpan(Request $request) {

        // // dd($request->all());
        // // validate the data
        // $this->validate($request, array(
        //     'id_user'       => 'required',
        //     'tinggi_badan'  => 'required',
        //     'berat_badan'   => 'required',
        //     'gol_darah'     => 'required',
        //     'merokok'       => 'required',
        // ));

        // // // store in the database
        // $reg2 = new Registration2;
        // $reg2->id_user       = $request->id_user;
        // $reg2->tinggi_badan  = $request->tinggi_badan;
        // $reg2->berat_badan   = $request->berat_badan;
        // $reg2->gol_darah     = $request->gol_darah;
        // $reg2->merokok       = $request->merokok;

        // $reg2->save();

        // // $data = [];
        // $data['id_user'] = $reg2->id_user;

        // // Session::flash = temporary, exists for one page request
        // // Session::put = permanent, exists until the session is removed
        // // Session::flash('success', 'Selamat!!!');

        // // redirect to another page
        // // return redirect()->route('registration3.create', $reg2->id);
        // return redirect()->route('registration3.create', $data);
    }
}
