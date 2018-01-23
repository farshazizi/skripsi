<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration2;
use Session;
use Auth;
use DB;

class Registration1Controller extends Controller
{
    // public function __construct(){
    //     $this->middleware('CekPosisi');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daf = Registration1::orderby('id')->get(); 
        return view('admin.pages.match', compact('daf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Auth::user()->id;
        // return $a[0]->posisi;
        // return $a;
        
        // return view('form/registration1');

        $a = DB::table('registration1s')
        ->select('posisi')
        ->where('id_user', '=', Auth::user()->id)->get();

        if ($a->isEmpty()){
            $posisi=1;
        } else{
            $posisi = ($a[0]->posisi);
        }

        if ($posisi == 1) {
            return view('form/registration1');
        } elseif ($posisi == 2) {
            // $data['id_user'] = $request['id_user'];
            // return view('form/registration2', $data);
            // return redirect('registration/2');
            return redirect()->route('registration2');
        } elseif ($posisi == 3) {
            // return redirect('registration/3');
            return redirect()->route('registration3');
        } elseif ($posisi == 4) {
            // return redirect('registration/4');
            return redirect()->route('registration4');
        } elseif ($posisi == 5) {
            // return redirect('registration/5');
            return redirect()->route('registration5');
        } elseif ($posisi == 6) {
            // return redirect('registration/6');
            return redirect()->route('registration6');
        } elseif ($posisi == 7) {
            // return redirect('registration/7');
            return redirect()->route('registration7');
        } elseif ($posisi == 8) {
            // return redirect('registration/8');
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
            'posisi'                    => 'max:1',
            'nama_lengkap'              => 'required',
            'tanggal_lahir'             => 'required',
            'jenis_kelamin'             => 'required',
            // 'alamat_email'              => 'required',
            'handphone'                 => 'required',
            'alamat_tempat_tinggal'     => 'required',
            'pekerjaan'                 => 'required',
            'suku'                      => 'required',
            'status_pernikahan'         => 'required',
            'penghasilan'               => 'required',
            'izin_menikah'              => 'required',
            'alamat_tinggal_saat_ini'   => 'required'
        ));

        // // store in the database
        $reg1 = new Registration1;

        $reg1->id_user                     = Auth::user()->id;
        $reg1->posisi                      = $request->posisi;
        $reg1->nama_lengkap                = $request->nama_lengkap;
        $reg1->tanggal_lahir               = $request->tanggal_lahir;
        $reg1->jenis_kelamin               = $request->jenis_kelamin;
        $reg1->alamat_email                = Auth::user()->email;
        $reg1->handphone                   = $request->handphone;
        $reg1->alamat_tempat_tinggal       = $request->alamat_tempat_tinggal;
        $reg1->pekerjaan                   = $request->pekerjaan;
        $reg1->suku                        = $request->suku;
        $reg1->status_pernikahan           = $request->status_pernikahan;
        $reg1->penghasilan                 = $request->penghasilan;
        $reg1->izin_menikah                = $request->izin_menikah;
        $reg1->alamat_tinggal_saat_ini     = $request->alamat_tinggal_saat_ini;
        $reg1->posisi = 2;
        
        $reg1->save();

        // $data['id_user'] = $reg1->id;
        
        // dd($request->all());
        // // Session::flash = temporary, exists for one page request
        // // Session::put = permanent, exists until the session is removed
        // // Session::put('success', 'Selamat!!!');
        // // Session::flash('Data berhasil disimpan!');

        // // redirect to another page
        // // return redirect()->route('registration2.create', $reg1->id);
        // return redirect()->route('registration2', $data);
        return redirect()->route('registration2');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // @foreach ($suku as $suku) {
        //     if ($suku->first()) {
        //         return 
        //     }
        // }
        // $reg1 = Registration1::find($id);
        // return view('form/registration1')->with('reg1', $reg1);
        // $daf = Registration1::where('id_user', '$id')->first(); 
        // return view('admin.detail', compact('daf'));
        // $daf = Registration1::orderby('id')->get();
        // return view('admin.detail', compact('daf'));

        $daf = DB::table('users')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
            ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
            ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
            ->leftJoin('registration5s', 'users.id', '=', 'registration5s.id_user')
            ->leftJoin('registration6s', 'users.id', '=', 'registration6s.id_user')
            ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration5s.*', 'registration6s.*', 'registration7s.*')
            ->where('registration1s.nama_lengkap','=', $id)
            ->first();

        // $users = DB::table('registration1s')
        //         ->select(DB::raw('count(*) as user_count, id_user'))
        //         ->where('id_user', '=', 'id')
        //         ->groupBy('id_user')
        //         ->get();

        // $daf = Registration1::where('nama_lengkap', $id)->first();
        // return compact('daf');
        return view('admin.pages.detail', compact('daf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        // $reg1 = Registration1::find($id);

        // return the view
        // return view('form/registration1')->with('reg1', $reg1);
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

    public function detailUser($id) {
        // $daf = Registration1::orderby('id')->get();
        // return view('admin.detail', compact('daf'));

        // $daf = Registration1::where('id', $id)->first();
        // return view('admin.detail', compact('daf'));
    }

    public function kurvaTurun($a, $b, $x) {
        if (a<=x & x<=b) {
            return (b-x)/(b-a);
        } elseif (x>=b) {
            return 0;
        }
    }

    public function kurvaSegitiga($a, $b, $c, $x) {
        if (x<=a || x>=c) {
            return 0;
        } elseif (a<=x & x<=b) {
            return (x-a)/(b-a);
        } elseif (b<=x & x<=c) {
            return (b-x)/(c-b);
        }
    }

    public function kurvaNaik($a, $b, $x) {
        if (x<=a) {
            return 0;
        } elseif (a<=x & x<=b) {
            return (x-a)/(b-a);
        } elseif (x>=b) {
            return 1;
        }
    }
}
