<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_pasangan;
use App\Log_taaruf;
use App\Registration1;
use Auth;
use DB;
use Mail;

class CalonPasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sta = DB::table('users')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->select('registration1s.status', 'registration1s.pemegang_form', 'registration1s.jenis_kelamin')
            ->where('id_user', '=', Auth::user()->id)
            ->first();
            // dd($sta);

        if ($sta->status == 1) {
            $daf = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                ->where('registration1s.id_user', '=', Auth::user()->id)
                ->get();

            return view('user.pages.calon_pasangan', compact('daf'));
        } elseif ($sta->status == 2) {
            if ($sta->jenis_kelamin == "Laki-laki") {
                $calon_laki = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.pemegang_form')
                    ->where('id_user', '=', $calon_laki->id_penerima)
                    ->first();

                if ($status_calpas->pemegang_form == 0) {
                    $daf = DB::table('users')
                        ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                        ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                        ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                        ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                        ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                        ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                        ->where('registration1s.id_user', '=', $calon_laki->id_penerima)
                        ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
                        ->get();

                    return view('user.pages.calon_pasangan', compact('daf'));
                } elseif ($status_calpas->pemegang_form == 1) {
                    $daf = DB::table('users')
                        ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                        ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                        ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                        ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                        ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                        ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                        ->where('registration1s.id_user', '=', $calon_laki->id_penerima)
                        ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
                        ->get();

                    return view('user.pages.calon_pasangan', compact('daf'));
                }

            } elseif ($sta->jenis_kelamin == "Perempuan") {
                $calon_perempuan = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.pemegang_form')
                    ->where('id_user', '=', $calon_perempuan->id_penerima)
                    ->first();

                $daf = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                    ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                    ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                    ->where('registration1s.id_user', '=', $calon_perempuan->id_penerima)
                    ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
                    ->get();

                return view('user.pages.calon_pasangan', compact('daf'));
            }
            
        } elseif ($sta->status == 3) {
            $calon_perempuan = DB::table('data_pasangan')
                ->select('id_penerima')
                ->where('id_pengirim', '=', Auth::user()->id)
                ->orderBy('id', 'DESC')
                ->first();

            $status_calpas = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->select('registration1s.pemegang_form')
                ->where('id_user', '=', $calon_perempuan->id_penerima)
                ->first();

            $daf = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                ->where('registration1s.id_user', '=', $calon_perempuan->id_penerima)
                ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
                ->get();

            return view('user.pages.calon_pasangan', compact('daf'));
        } elseif ($sta->status == 4) {
            $calon_perempuan = DB::table('data_pasangan')
                ->select('id_penerima')
                ->where('id_pengirim', '=', Auth::user()->id)
                ->orderBy('id', 'DESC')
                ->first();

            $status_calpas = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->select('registration1s.pemegang_form')
                ->where('id_user', '=', $calon_perempuan->id_penerima)
                ->first();

            $daf = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                ->where('registration1s.id_user', '=', $calon_perempuan->id_penerima)
                ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
                ->get();

            return view('user.pages.calon_pasangan', compact('daf'));
        } elseif ($sta->status == 5) {
            $daf = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                ->where('registration1s.id_user', '=', Auth::user()->id)
                ->get();

            return view('user.pages.calon_pasangan', compact('daf'));
        }
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
        // DITOLAK
        $calon = "";
        $calons = DB::table('data_pasangan')
            ->select('id_penerima')
            ->where('id_pengirim', '=', Auth::user()->id)
            ->pluck('id_penerima');
        $calon = $calons[0];

        $log = new Log_taaruf;

        $log->id_penolak    = Auth::user()->id;
        $log->id_menolak    = $calon;
        $log->alasan        = $request->alasan;
        
        $log->save();

        $status_penerima = DB::table('registration1s')
            ->where('id_user', '=', Auth::user()->id)
            ->update(['status' => 5]);

        $status_tolak1 = DB::table('data_pasangan')
            ->where('id_pengirim', '=', Auth::user()->id)
            ->update(['status_tolak' => 1]);

        $status_pengirim = DB::table('registration1s')
            ->where('id_user', '=', $calon)
            ->update(['status' => 1, 'pemegang_form' => 0]);

        $status_tolak2 = DB::table('data_pasangan')
            ->where('id_pengirim', '=', $calon)
            ->update(['status_tolak' => 2]);

        Mail::send(['text'=>'ditolak'],['name', 'Sarthak'], function($message)  {
            $message->to('farshazizi22@gmail.com', 'Taaruf')->subject('Penukaran Formulir Taaruf');
            $message->from('farshazizi22@gmail.com', 'Admin');
        });

        // return redirect()->route('calon-pasangan.index');
        // return redirect('/user/calon-pasangan');
        return back();
        // return view('user.pages.calon_pasangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $daf = DB::table('users')
        //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
        //     ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
        //     ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
        //     // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
        //     ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
        //     ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->get();

        // return view('user.pages.detail_calon', compact('daf'));
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
        // DITERIMA
        $calon = "";
        $calons = DB::table('data_pasangan')
            ->select('id_penerima')
            ->where('id_pengirim', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->pluck('id_penerima');
        $calon = $calons[0];

        $daf = DB::table('registration1s')
            ->select('jenis_kelamin')
            ->where('id_user', '=', $calon)
            // ->where('registration1s.pemegang_form', '=', $status_calpas->pemegang_form)
            ->first();
        // dd($daf);
        if ($daf->jenis_kelamin == "Laki-laki") {
            // dd("hai");
            $status_pengirim = DB::table('registration1s')
                ->where('id_user', '=', $calon)
                ->update(['status' => 3]);

            $status_penerima = DB::table('registration1s')
                ->where('id_user', '=', Auth::user()->id)
                ->update(['pemegang_form' => 1]);
            // dd($status_pengirim);
        } elseif ($daf->jenis_kelamin == "Perempuan") {
            // dd("hai");
            $status_penerima = DB::table('registration1s')
                ->where('id_user', '=', $calon)
                ->update(['status' => 4]);

            $status_pengirim = DB::table('registration1s')
                ->where('id_user', '=', Auth::user()->id)
                ->update(['status' => 4]);
        }

        Mail::send(['text'=>'diterima'],['name', 'Sarthak'], function($message)  {
            $message->to('farshazizi22@gmail.com', 'Taaruf')->subject('Penukaran Formulir Taaruf');
            $message->from('farshazizi22@gmail.com', 'Admin');
        });

        // $data_pasangan = new Data_pasangan;
        // $data_pasangan->id_pengirim = $calon;
        // $data_pasangan->id_penerima = Auth::user()->id;
        // $data_pasangan->save();

        return back();
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
