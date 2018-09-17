<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registration1;
use App\Registration7;
use Auth;
use DB;
use Random;

class UbahKriteriaController extends Controller
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
            ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri')
            ->where('users.id', '=', Auth::user()->id)
            ->get();
            
        return view('user.pages.ubah_kriteria', compact('daf'));
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
        $daf = DB::table('users')
            ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->select('users.id', 'registration7s.*')
            ->where('users.id', '=', Auth::user()->id)
            ->get();
            
        return view('user.pages.ubah_kriteria', compact('daf'));
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
        // dd($request->all());
        $reg7 = Registration7::find($id);
        
        $reg7->umur_calon_pasangan          = $request->umur_calon_pasangan;
        if ($reg7->umur_calon_pasangan == "Remaja") {
            $int = Random::generateInt(18, 27);
            $reg7->randUmur = $int;
        } elseif ($reg7->umur_calon_pasangan == "Dewasa") {
            $int = Random::generateInt(24, 32);
            $reg7->randUmur = $int;
        } elseif ($reg7->umur_calon_pasangan == "Tua") {
            $int = Random::generateInt(29, 35);
            $reg7->randUmur = $int;
        }

        $reg7->tb_calon_pasangan            = $request->tb_calon_pasangan;
        if ($reg7->tb_calon_pasangan == "Pendek") {
            $int = Random::generateInt(120, 167);
            $reg7->randTb = $int;
        } elseif ($reg7->tb_calon_pasangan == "Sedang") {
            $int = Random::generateInt(161, 174);
            $reg7->randTb = $int;
        } elseif ($reg7->tb_calon_pasangan == "Tinggi") {
            $int = Random::generateInt(169, 200);
            $reg7->randTb = $int;
        }

        $reg7->bb_calon_pasangan            = $request->bb_calon_pasangan;
        if ($reg7->bb_calon_pasangan == "Kurus") {
            $int = Random::generateInt(40, 64);
            $reg7->randBb = $int;
        } elseif ($reg7->bb_calon_pasangan == "Berisi") {
            $int = Random::generateInt(51, 74);
            $reg7->randBb = $int;
        } elseif ($reg7->bb_calon_pasangan == "Gemuk") {
            $int = Random::generateInt(66, 100);
            $reg7->randBb = $int;
        }

        $reg7->penghasilan_calon_pasangan   = $request->penghasilan_calon_pasangan;
        if ($reg7->penghasilan_calon_pasangan == "Rendah") {
            $int = Random::generateInt(500000, 7999999);
            $reg7->randPenghasilan = $int;
        } elseif ($reg7->penghasilan_calon_pasangan == "Sedang") {
            $int = Random::generateInt(3500001, 11999999);
            $reg7->randPenghasilan = $int;
        } elseif ($reg7->penghasilan_calon_pasangan == "Tinggi") {
            $int = Random::generateInt(8000001, 15000000);
            $reg7->randPenghasilan = $int;
        }

        $reg7->save();

        $status = DB::table('registration1s')
            ->where('id_user', '=', Auth::user()->id)
            ->update(['status' => 1]);

        return redirect()->route('calon-pasangan.index');
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
