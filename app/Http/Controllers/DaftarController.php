<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Daftar;
use DB;
use Mail;
use Session;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $daf = Daftar::orderby('id')->get(); 
        $daf = DB::table('users')
            ->join('registration1s', 'users.id', '=', 'registration1s.id_user')
            // ->join('registration2s', 'users.id', '=', 'registration2s.id_user')
            // ->join('registration3s', 'users.id', '=', 'registration3s.id_user')
            // ->join('registration4s', 'users.id', '=', 'registration4s.id_user')
            // ->join('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->join('registration8s', 'users.id', '=', 'registration8s.id_user')
            // ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.*')
            ->select('users.id', 'registration1s.*', 'registration8s.*')
            ->get();
        // return view('admin.pages.match', compact('daf'));
        return view('admin.pages.user', compact('daf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form/daftar');
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
            'nama_lengkap'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat_email'      => 'required',
            'handphone'         => 'required'
        ));

        // store in the database
        $daf = new Daftar;
        $daf->nama_lengkap  = $request->nama_lengkap;
        $daf->tanggal_lahir = $request->tanggal_lahir;
        $daf->jenis_kelamin = $request->jenis_kelamin;
        $daf->alamat_email  = $request->alamat_email;
        $daf->handphone     = $request->handphone;

        $daf->save();

        // $data = [];
        // $data['id_user'] = $reg1->id;
        // Session::flash = temporary, exists for one page request
        // Session::put = permanent, exists until the session is removed
        // Session::put('success', 'Selamat!!!');
        Session::flash('success', 'Terima kasih telah mendaftar di qtaaruf, silahkan menunggu konfirmasi selanjutnya melalui email');

        // redirect to another page
        // return redirect()->route('registration2.create', $reg1->id);
        // return redirect()->route('daftar.create', $daf->id);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('users')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
            ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
            ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
            ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.*')
            ->where('registration1s.nama_lengkap', '=', $id)
            ->get();

        // dd($detail);
        return view('admin.pages.user_detail', compact('detail'));
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
        if (Input::get('validasi') == 'validasi') {
            // dd("hai");
            // dd($id);
            $validasi = DB::table('registration1s')
                ->where('id_user', '=', $id)
                ->update(['validasi' => 2]);

            Mail::send(['text'=>'validasi'],['name', 'Sarthak'], function($message)  {
                $message->to('farshazizi22@gmail.com', 'Taaruf')->subject('Akun Sudah Tervalidasi');
                $message->from('farshazizi22@gmail.com', 'Admin');
            });
        } elseif (Input::get('belum_validasi') == 'belum_validasi') {
            // dd("hai2");
            $validasi = DB::table('registration1s')
                ->where('id_user', '=', $id)
                ->update(['validasi' => 1]);


            Mail::send(['text'=>'belum_validasi'],['name', 'Sarthak'], function($message)  {
                $message->to('farshazizi22@gmail.com', 'Taaruf')->subject('Akun Belum Tervalidasi');
                $message->from('farshazizi22@gmail.com', 'Admin');
            });
        }

        return redirect()->route('user.index');
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
