<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftar;
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
        $daf = Daftar::orderby('id')->get(); 
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
        $daf = Daftar::find($id);
        return view('admin/user')->with('daf', $daf);
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
