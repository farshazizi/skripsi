<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration5;
use Auth;
use DB;

class Registration5Controller extends Controller
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
        // return view('form/registration5', $data);

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
            // $data['id_user'] = $request['id_user'];
            return view('form/registration5');
            // return redirect('registration/5');
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
            'moto'              => 'required',
            'hobi'              => 'required',
            // 'website_kunjangan' => 'required',
            // 'tokoh_favorit'     => 'required',
            // 'buku_favorit'      => 'required',
            'jamaah_diikuti'    => 'required',
            'ibadah_sunnah'     => 'required',
        ));

        // store in the database
        $reg1 = new Registration1;
        $reg5 = new Registration5;

        $reg5->id_user              = Auth::user()->id;
        $reg5->moto                 = $request->moto;
        $reg5->hobi                 = $request->hobi;
        // $reg5->website_kunjangan    = $request->website_kunjangan;
        // $reg5->tokoh_favorit        = $request->tokoh_favorit;
        // $reg5->buku_favorit         = $request->buku_favorit;
        $reg5->jamaah_diikuti       = $request->jamaah_diikuti;
        $reg5->ibadah_sunnah        = $request->ibadah_sunnah;

        $b = DB::table('registration1s')
        ->select('id')
        ->where('id_user', '=', Auth::user()->id)->get();

        $reg1 = Registration1::find($b[0]->id);
        // $reg1 = Registration1::find($request->id_user);
        $reg1->posisi = 6;    
        $reg1->save();

        $reg5->save();

        // $data['id_user'] = $reg5->id_user;

        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::flash('success', 'Selamat!!!');

        // redirect to another page
        // return redirect()->route('registration4.create', $reg4->id);
        // return redirect()->route('registration6.create', $data);
        return redirect()->route('registration6');
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
