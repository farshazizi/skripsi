<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration1;
use App\registration7;
use Auth;
use DB;

class Registration7Controller extends Controller
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
        // return view('form/registration7', $data);

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
            // return redirect('registration6');
            return redirect()->route('registration6');
        } elseif ($posisi == 7) {
            // $data['id_user'] = $request['id_user'];
            return view('form/registration7');
            // return redirect('registration/7');
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
        dd($request->all());
        // validate the data
        $this->validate($request, array(
            'id_user'                       => 'required',
            'umur_calon_pasangan'           => 'required',
            // 'randUmur'                      => 'required',
            'tb_calon_pasangan'             => 'required',
            'merokok_calon_pasangan'        => 'required',
            'penghasilan_calon_pasangan'    => 'required',
            'suku_calon_pasangan'           => 'required',
            'bb_calon_pasangan'             => 'required',
            // 'suku_domisili_pasangan'        => 'required',
            'karakter_pasangan'             => 'required',
        ));

        // // store in the database
        $reg1 = new Registration1;
        $reg7 = new Registration7;

        $reg7->id_user                      = Auth::user()->id;
        $reg7->umur_calon_pasangan          = $request->umur_calon_pasangan;
        $reg7->randUmur                     = $request->randUmur;
        if ($reg7->umur_calon_pasangan == 'Muda') {
            $reg7->randUmur = rand(18, 25);
        } elseif ($reg7->umur_calon_pasangan == 'Parobaya') {
            $reg7->randUmur = rand(23, 33);
        } elseif ($reg7->umur_calon_pasangan == 'Tua') {
            $reg7->randUmur = rand(31, 35);
        }
        $reg7->tb_calon_pasangan            = $request->tb_calon_pasangan;
        $reg7->randTb                       = $request->randTb;
        if ($reg7->tb_calon_pasangan == 'Pendek') {
            $reg7->randTb = rand(50, 165);
        } elseif ($reg7->tb_calon_pasangan == 'Sedang') {
            $reg7->randTb = rand(160, 175);
        } elseif ($reg7->tb_calon_pasangan == 'Tinggi') {
            $reg7->randTb = rand(170, 200);
        }
        $reg7->merokok_calon_pasangan       = $request->merokok_calon_pasangan;
        $reg7->penghasilan_calon_pasangan   = $request->penghasilan_calon_pasangan;
        $reg7->randPenghasilan              = $request->randPenghasilan;
        // if ($reg7->penghasilan_calon_pasangan == 'Muda') {
        //     $reg7->randPenghasilan = rand(18, 25);
        // } elseif ($reg7->penghasilan_calon_pasangan == 'Parobaya') {
        //     $reg7->randPenghasilan = rand(23, 33);
        // } elseif ($reg7->penghasilan_calon_pasangan == 'Tua') {
        //     $reg7->randPenghasilan = rand(31, 35);
        // }
        $reg7->suku_calon_pasangan          = $request->suku_calon_pasangan;
        $reg7->bb_calon_pasangan            = $request->bb_calon_pasangan;
        $reg7->randBb                       = $request->randBb;
        if ($reg7->bb_calon_pasangan == 'Kurus') {
            $reg7->randBb = rand(40, 55);
        } elseif ($reg7->bb_calon_pasangan == 'Berisi') {
            $reg7->randBb = rand(50, 75);
        } elseif ($reg7->bb_calon_pasangan == 'Gemuk') {
            $reg7->randBb = rand(70, 100);
        }
        // $reg7->suku_domisili_pasangan       = $request->suku_domisili_pasangan;
        $reg7->karakter_pasangan            = $request->karakter_pasangan;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        // $reg1 = Registration1::find($request->id_user);
        $reg1->posisi = 8;
        $reg1->save();

        $reg7->save();

        // $data['id_user'] = $reg7->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration4.create', $reg4->id);
        // return redirect()->route('registration8.create', $data);
        return redirect()->route('registration8');
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
