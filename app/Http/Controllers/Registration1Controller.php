<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration2;
use App\Hasil;
use App\Data_pasangan;
use App\Pasangan_taaruf;
use Session;
use Auth;
use DB;
use DateTime;
use Mail;
// set_time_limit(0);

class Registration1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $daf = Registration1::orderby('id')->get(); 
        $daf = DB::table('users')
            ->join('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->join('registration2s', 'users.id', '=', 'registration2s.id_user')
            ->join('registration3s', 'users.id', '=', 'registration3s.id_user')
            ->join('registration4s', 'users.id', '=', 'registration4s.id_user')
            ->join('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->join('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri')
            ->orderby('users.id','DESC')
            ->get();
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
        } elseif ($posisi == 7) {
            // return redirect('registration/7');
            return redirect()->route('registration7');
        } elseif ($posisi == 8) {
            // return redirect('registration/8');
            return redirect()->route('registration8');
        } elseif ($posisi == 9) {
            // return redirect('registration/8');
            // return view('form/waiting');
            return redirect()->route('calon-pasangan.index');
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
            // 'nama_lengkap'              => 'required',
            'tanggal_lahir'             => 'required',
            'jenis_kelamin'             => 'required',
            // 'alamat_email'              => 'required',
            'handphone'                 => 'required',
            'alamat_tempat_tinggal'     => 'required',
            'pekerjaan'                 => 'required',
            'status_pernikahan'         => 'required',
            'penghasilan'               => 'required',
            'izin_menikah'              => 'required',
            'alamat_tinggal_saat_ini'   => 'required'
        ));

        // store in the database
        $reg1 = new Registration1;

        $reg1->id_user                     = Auth::user()->id;
        $reg1->posisi                      = $request->posisi;
        $reg1->status                      = $request->status;
        $reg1->pemegang_form               = $request->pemegang_form;
        $reg1->validasi                    = $request->validasi;
        $reg1->nama_lengkap                = Auth::user()->name;
        $reg1->tanggal_lahir               = $request->tanggal_lahir;
        $tgllahir = $request->tanggal_lahir;
        $biday = new DateTime($tgllahir);
        $today = new DateTime(); 
        $diff = $today->diff($biday);
        $usia_user = $diff->y;
        $reg1->usia                        = $usia_user;
        $reg1->jenis_kelamin               = $request->jenis_kelamin;
        $reg1->alamat_email                = Auth::user()->email;
        $reg1->handphone                   = $request->handphone;
        $reg1->alamat_tempat_tinggal       = $request->alamat_tempat_tinggal;
        $reg1->pekerjaan                   = $request->pekerjaan;
        $reg1->status_pernikahan           = $request->status_pernikahan;
        if ($reg1->status_pernikahan == "") {
            $reg1->i_jumlahAnak = 0;
        } elseif ($reg1->status_pernikahan == "Sudah pernah menikah, tidak memiliki anak") {
            $reg1->i_jumlahAnak = 0;
        } elseif ($reg1->status_pernikahan == "Sudah pernah menikah dan memiliki anak") {
            $reg1->i_jumlahAnak            = $request->i_jumlahAnak;
        }elseif ($reg1->status_pernikahan == "Belum pernah menikah") {
            $reg1->i_jumlahAnak = 0;
        }
        $reg1->penghasilan                 = $request->penghasilan;
        if ($reg1->penghasilan >= 500000 && $reg1->penghasilan <= 15000000) {
            $reg1->penghasilan             = $request->penghasilan;
        } elseif ($reg1->penghasilan < 500000) {
            $reg1->penghasilan = 500000;
        } elseif ($reg1->penghasilan > 15000000) {
            $reg1->penghasilan = 15000000;
        }
        $reg1->izin_menikah                = $request->izin_menikah;
        $reg1->alamat_tinggal_saat_ini     = $request->alamat_tinggal_saat_ini;
        $reg1->posisi = 2;
        $reg1->status = 0;
        $reg1->pemegang_form = 0;
        $reg1->validasi = 0;
        
        $reg1->save();

        // dd($request->all());
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
    public function show($id, Request $request)
    {

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
            ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri')
            ->where('registration1s.nama_lengkap','=', $id)
            ->first();
        // dd($daf);
        if ($request->hasFile('foto_diri')) {
            $img = Registration8::find($id);
            $path = base_path().'/public/images/foto_diri/'.$img->foto_diri;
            
            if (file_exists($path)) {
                unlink($path);
            }
            
            $photo = $request->file('foto_diri');
            $destination = base_path().'/public/images/foto_diri/';
            $filename = $photo->getClientOriginalName();
            $photo->move($destination,$filename);
            $foto_diri['foto_diri'] = $filename;
        }
        
        // variabel
        // $total_umur = $randUmur;
        // $total_tinggi_badan = $randTb;
        // $total_berat_badan = $randBb;
        // $total_penghasilan = $randPenghasilan;
        // $id = session('id');
        $ekspektasiUser = DB::table('registration7s')
            ->select('*')
            ->where('id_user', '=', $daf->id_user)->first();

        $ekspektasiUsia = $ekspektasiUser->randUmur;
        $ekspektasiTb = $ekspektasiUser->randTb;
        $ekspektasiBb = $ekspektasiUser->randBb;
        $ekspektasiPenghasilan = $ekspektasiUser->randPenghasilan;
        // $arrayEkspektasi = array($ekspektasiUsia,$ekspektasiTb,$ekspektasiBb,$ekspektasiPenghasilan);
        $acuanUsia = DB::table('acuan_usia')
            ->where('bb_usia','<=', $ekspektasiUsia)
            ->where('ba_usia', '>=', $ekspektasiUsia)
            ->selectRaw('min(bb_usia) as bb_usia, max(ba_usia) as ba_usia')
            ->get();
        $acuanTb = DB::table('acuan_tb')
            ->where('bb_tb','<=', $ekspektasiTb)
            ->where('ba_tb', '>=', $ekspektasiTb)
            ->selectRaw('min(bb_tb) as bb_tb, max(ba_tb) as ba_tb')
            ->get();
        $acuanBb = DB::table('acuan_bb')
            ->where('bb_bb','<=', $ekspektasiBb)
            ->where('ba_bb', '>=', $ekspektasiBb)
            ->selectRaw('min(bb_bb) as bb_bb, max(ba_bb) as ba_bb')
            ->get();
        $acuanPenghasilan = DB::table('acuan_penghasilan')
            ->where('bb_penghasilan','<=', $ekspektasiPenghasilan)
            ->where('ba_penghasilan', '>=', $ekspektasiPenghasilan)
            ->selectRaw('min(bb_penghasilan) as bb_penghasilan, max(ba_penghasilan) as ba_penghasilan')
            ->get();
        // $acuanPenghasilan = $acuanPenghasilan->toArray();
        // dd($acuanPenghasilan);
        $arrayAcuan = array($acuanUsia->toArray(), $acuanTb->toArray(), $acuanBb->toArray(), $acuanPenghasilan->toArray());
        // $acuanUsia->toArray();
        $acuanUsia = $acuanUsia->toArray();
        $acuanTb = $acuanTb->toArray();
        $acuanBb =  $acuanBb->toArray();
        $acuanPenghasilan =  $acuanPenghasilan->toArray();
        // dd($acuanUsia[0]->bb_usia);

        // filter suku
        $confirm = $daf->suku_calon_pasangan;
        $confirm2 = $daf->status_calon_pasangan;
        // $confirm3 = $daf->merokok_calon_pasangan;
        if ($daf->merokok_calon_pasangan == "Iya, tidak masalah"){
            $confirm3 = array("Saya merokok", "Saya merokok namun berniat untuk berhenti", "Saya tidak merokok sama sekali");
        } elseif ($daf->merokok_calon_pasangan == "Iya, asalkan berniat untuk berhenti"){
            $confirm3 = array("Saya merokok", "Saya merokok namun berniat untuk berhenti", "Saya tidak merokok sama sekali");
        } elseif ($daf->merokok_calon_pasangan == "Tidak, saya tidak suka perokok") {
            $confirm3 = array("Saya tidak merokok sama sekali");
        }
        // dd($confirm3);
        $manggil_id = DB::table('registration1s')
            ->select('id_user')
            ->where('nama_lengkap', '=', $id)
            ->first();
            // dd($manggil_id->id_user);
        $status_tolak = DB::table('data_pasangan')
            ->select('status_tolak')
            ->where('id_pengirim', '=', $manggil_id->id_user)
            ->first();
        // dd($status_tolak);
        if (is_null($status_tolak)) {
            // dd("hai");
            // MASUK MENJADI SALAH SATU CALON PASANGAN
            if($confirm == "Iya") {
                // if ($confirm2 != "Belum pernah menikah") {
                    // dd("hay1");
                    // suku dan status\
                    $calonPasangan1 = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    // ->where('users.id','=', '108')
                    ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                    ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    ->where('registration1s.validasi', '=', 2)
                    ->where('registration1s.status','=', 1)
                    ->orWhere('registration1s.status','=', 5)
                    ->whereIn('registration2s.merokok', $confirm3)
                    // ->where('users.id','=', '137')
                    // ->where('users.id','=', '101')
                    // ->where('users.id','=', '106')
                    // ->where('users.id','=', '158')
                    // ->where('users.id','=', '176')
                    // ->where('users.id','=', '181')
                    // ->where('users.id','=', '187')
                    // ->where('users.id','=', '192')
                    // ->where('users.id','=', '14')
                    // ->where('users.id','=', '79')
                    // ->where('users.id','=', '89')
                    // ->where('users.id','=', '36')
                    // ->where('users.id','=', '189')
                    // ->where('users.id','=', '49')
                    ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                    $sukuAyah = $daf->suku_ayah;
                    $sukuIbu = $daf->suku_ibu;
                    $calonPasangan1->where(function ($query) use ($sukuAyah, $sukuIbu) {
                        $query->orWhere('registration3s.suku_ayah','=', $sukuAyah)
                        ->orWhere('registration3s.suku_ibu','=', $sukuIbu);
                    });


                    $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                    $baAcuanUsia = $acuanUsia[0]->ba_usia;

                    $bbAcuanTb = $acuanTb[0]->bb_tb;
                    $baAcuanTb = $acuanTb[0]->ba_tb;

                    $bbAcuanBb = $acuanBb[0]->bb_bb;
                    $baAcuanBb = $acuanBb[0]->ba_bb;

                    $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                    $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                    $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                        $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                        ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                        ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                        ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                    });

                    $calonPasangan = $calonPasangan1->get();
    // dd($calonPasangan);
                // } else {
                //     // dd("hay2");
                //     $calonPasangan1 = DB::table('users')
                //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                //     ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                //     ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                //     // ->where('users.id','=', '137')
                //     // ->where('users.id','=', '101')
                //     // ->where('users.id','=', '106')
                //     // ->where('users.id','=', '158')
                //     // ->where('users.id','=', '176')
                //     // ->where('users.id','=', '181')
                //     // ->where('users.id','=', '187')
                //     // ->where('users.id','=', '192')
                //     // ->where('users.id','=', '14')
                //     // ->where('users.id','=', '79')
                //     // ->where('users.id','=', '89')
                //     // ->where('users.id','=', '36')
                //     // ->where('users.id','=', '189')
                //     // ->where('users.id','=', '49')
                //     // ->where('users.id','=', '51')
                //     ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                //     $sukuAyah = $daf->suku_ayah;
                //     $sukuIbu = $daf->suku_ibu;
                //     $calonPasangan1->where(function ($query) use ($sukuAyah, $sukuIbu) {
                //         $query->orWhere('registration3s.suku_ayah','=', $sukuAyah)
                //         ->orWhere('registration3s.suku_ibu','=', $sukuIbu);
                //     });
                //     // dd($daf);
                //     $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                //     $baAcuanUsia = $acuanUsia[0]->ba_usia;

                //     $bbAcuanTb = $acuanTb[0]->bb_tb;
                //     $baAcuanTb = $acuanTb[0]->ba_tb;

                //     $bbAcuanBb = $acuanBb[0]->bb_bb;
                //     $baAcuanBb = $acuanBb[0]->ba_bb;

                //     $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                //     $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                //     $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                //         $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                //         ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                //         ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                //         ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                //     });

                //     $calonPasangan = $calonPasangan1->get();
                // }
                
            } else {
                // if ($confirm2 != "Belum Menikah") {
                    //bukan suku dan sudah pernah menikah atau janda
                    // dd("hay3");
                $calonPasangan1 = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                    ->whereIn('registration2s.merokok', $confirm3)
                    ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    ->where('registration1s.validasi', '=', 2)
                    ->where('registration1s.status','=', 1)
                    ->orWhere('registration1s.status','=', 5)
                    // ->where('users.id','=', '137')
                    // ->where('users.id','=', '101')
                    // ->where('users.id','=', '106')
                    // ->where('users.id','=', '158')
                    // ->where('users.id','=', '176')
                    // ->where('users.id','=', '181')
                    // ->where('users.id','=', '187')
                    // ->where('users.id','=', '192')
                    // ->where('users.id','=', '14')
                    // ->where('users.id','=', '79')
                    // ->where('users.id','=', '89')
                    // ->where('users.id','=', '36')
                    // ->where('users.id','=', '189')
                    // ->where('users.id','=', '49')
                    // ->where('users.id','=', '51')
                    ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                    // $calonPasangan1 = DB::table('users')
                        
                    //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    //     ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                        
                    //     ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)                    
                    //     ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    //     ->whereIn('registration2s.merokok', $confirm3)
                    //     ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan');
                        // dd($calonPasangan1);
                    $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                    $baAcuanUsia = $acuanUsia[0]->ba_usia;

                    $bbAcuanTb = $acuanTb[0]->bb_tb;
                    $baAcuanTb = $acuanTb[0]->ba_tb;

                    $bbAcuanBb = $acuanBb[0]->bb_bb;
                    $baAcuanBb = $acuanBb[0]->ba_bb;

                    $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                    $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                      $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                        $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                        ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                        ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                        ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                    });

                    $calonPasangan = $calonPasangan1->get();
                    // dd($calonPasangan);
                // } else {
                //     // dd("hay4");
                //     $calonPasangan1 = DB::table('users')
                //         ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                //         ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                //         ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan')
                //         ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                //         ->get();

                //     $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                //     $baAcuanUsia = $acuanUsia[0]->ba_usia;

                //     $bbAcuanTb = $acuanTb[0]->bb_tb;
                //     $baAcuanTb = $acuanTb[0]->ba_tb;

                //     $bbAcuanBb = $acuanBb[0]->bb_bb;
                //     $baAcuanBb = $acuanBb[0]->ba_bb;

                //     $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                //     $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                //     $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                //         $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                //         ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                //         ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                //         ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                //     });

                //     $calonPasangan = $calonPasangan1->get();
                // }
            }
        } else {
            // dd("hai2");
            // TIDAK MASUK MENJADI SALAH SATU CALON PASANGAN
            $tidak_masuk = DB::table('data_pasangan')
                ->leftJoin('registration1s', 'data_pasangan.id_pengirim', '=', 'registration1s.id_user')
                ->select('registration1s.id_user')
                ->where('data_pasangan.status_tolak', '!=', 0)
                ->where('data_pasangan.id_penerima', '=', $manggil_id->id_user)
                ->first();
            // dd($tidak_masuk);
            if($confirm == "Iya") {
                // if ($confirm2 != "Belum pernah menikah") {
                    // dd("hay1");
                    // suku dan status\
                    $calonPasangan1 = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                    ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    ->where('registration1s.validasi', '=', 2)
                    ->where('registration1s.id_user', '!=', $tidak_masuk->id_user)
                    ->where('registration1s.status','=', 1)
                    // ->orWhere('registration1s.status','=', 5)
                    ->whereIn('registration2s.merokok', $confirm3)
                    // ->where('users.id','=', '137')
                    // ->where('users.id','=', '101')
                    // ->where('users.id','=', '106')
                    // ->where('users.id','=', '158')
                    // ->where('users.id','=', '176')
                    // ->where('users.id','=', '181')
                    // ->where('users.id','=', '187')
                    // ->where('users.id','=', '192')
                    // ->where('users.id','=', '14')
                    // ->where('users.id','=', '79')
                    // ->where('users.id','=', '89')
                    // ->where('users.id','=', '36')
                    // ->where('users.id','=', '189')
                    // ->where('users.id','=', '49')
                    // ->where('users.id','=', '108')
                    ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                    $sukuAyah = $daf->suku_ayah;
                    $sukuIbu = $daf->suku_ibu;
                    $calonPasangan1->where(function ($query) use ($sukuAyah, $sukuIbu) {
                        $query->orWhere('registration3s.suku_ayah','=', $sukuAyah)
                        ->orWhere('registration3s.suku_ibu','=', $sukuIbu);
                    });


                    $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                    $baAcuanUsia = $acuanUsia[0]->ba_usia;

                    $bbAcuanTb = $acuanTb[0]->bb_tb;
                    $baAcuanTb = $acuanTb[0]->ba_tb;

                    $bbAcuanBb = $acuanBb[0]->bb_bb;
                    $baAcuanBb = $acuanBb[0]->ba_bb;

                    $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                    $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                    $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                        $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                        ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                        ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                        ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                    });

                    $calonPasangan = $calonPasangan1->get();
    // dd($calonPasangan);
                // } else {
                //     // dd("hay2");
                //     $calonPasangan1 = DB::table('users')
                //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                //     ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                //     ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                //     // ->where('users.id','=', '137')
                //     // ->where('users.id','=', '101')
                //     // ->where('users.id','=', '106')
                //     // ->where('users.id','=', '158')
                //     // ->where('users.id','=', '176')
                //     // ->where('users.id','=', '181')
                //     // ->where('users.id','=', '187')
                //     // ->where('users.id','=', '192')
                //     // ->where('users.id','=', '14')
                //     // ->where('users.id','=', '79')
                //     // ->where('users.id','=', '89')
                //     // ->where('users.id','=', '36')
                //     // ->where('users.id','=', '189')
                //     // ->where('users.id','=', '49')
                //     // ->where('users.id','=', '51')
                //     ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                //     $sukuAyah = $daf->suku_ayah;
                //     $sukuIbu = $daf->suku_ibu;
                //     $calonPasangan1->where(function ($query) use ($sukuAyah, $sukuIbu) {
                //         $query->orWhere('registration3s.suku_ayah','=', $sukuAyah)
                //         ->orWhere('registration3s.suku_ibu','=', $sukuIbu);
                //     });
                //     // dd($daf);
                //     $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                //     $baAcuanUsia = $acuanUsia[0]->ba_usia;

                //     $bbAcuanTb = $acuanTb[0]->bb_tb;
                //     $baAcuanTb = $acuanTb[0]->ba_tb;

                //     $bbAcuanBb = $acuanBb[0]->bb_bb;
                //     $baAcuanBb = $acuanBb[0]->ba_bb;

                //     $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                //     $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                //     $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                //         $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                //         ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                //         ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                //         ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                //     });

                //     $calonPasangan = $calonPasangan1->get();
                // }
                
            } else {
                // if ($confirm2 != "Belum Menikah") {
                    //bukan suku dan sudah pernah menikah atau janda
                    // dd("hay3");
                $calonPasangan1 = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                    ->whereIn('registration2s.merokok', $confirm3)
                    ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    ->where('registration1s.validasi', '=', 2)
                    ->where('registration1s.id_user', '!=', $tidak_masuk->id_user)
                    ->where('registration1s.status','=', 1)
                    // ->orWhere('registration1s.status','=', 5)
                    // ->where('users.id','=', '137')
                    // ->where('users.id','=', '101')
                    // ->where('users.id','=', '106')
                    // ->where('users.id','=', '158')
                    // ->where('users.id','=', '176')
                    // ->where('users.id','=', '181')
                    // ->where('users.id','=', '187')
                    // ->where('users.id','=', '192')
                    // ->where('users.id','=', '14')
                    // ->where('users.id','=', '79')
                    // ->where('users.id','=', '89')
                    // ->where('users.id','=', '36')
                    // ->where('users.id','=', '189')
                    // ->where('users.id','=', '49')
                    // ->where('users.id','=', '51')
                    ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
                    // $calonPasangan1 = DB::table('users')
                        
                    //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    //     ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                        
                    //     ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)                    
                    //     ->where('registration7s.status_calon_pasangan','=', $confirm2)
                    //     ->whereIn('registration2s.merokok', $confirm3)
                    //     ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan');
                        // dd($calonPasangan1);
                    $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                    $baAcuanUsia = $acuanUsia[0]->ba_usia;

                    $bbAcuanTb = $acuanTb[0]->bb_tb;
                    $baAcuanTb = $acuanTb[0]->ba_tb;

                    $bbAcuanBb = $acuanBb[0]->bb_bb;
                    $baAcuanBb = $acuanBb[0]->ba_bb;

                    $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
                    $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

                      $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
                        $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
                        ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
                        ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
                        ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
                    });

                    $calonPasangan = $calonPasangan1->get();
                    // dd($calonPasangan);
                // } else {
                //     // dd("hay4");
                //     $calonPasangan1 = DB::table('users')
                //         ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                //         ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                //         ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan')
                //         ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                //         ->get();

                //     $bbAcuanUsia = $acuanUsia[0]->bb_usia;
                //     $baAcuanUsia = $acuanUsia[0]->ba_usia;

                //     $bbAcuanTb = $acuanTb[0]->bb_tb;
                //     $baAcuanTb = $acuanTb[0]->ba_tb;

                //     $bbAcuanBb = $acuanBb[0]->bb_bb;
            //     $baAcuanBb = $acuanBb[0]->ba_bb;

            //     $bbAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;
            //     $baAcuanPenghasilan = $acuanPenghasilan[0]->bb_penghasilan;

            //     $calonPasangan1->where(function ($query) use ($bbAcuanUsia, $baAcuanUsia, $bbAcuanTb, $baAcuanTb, $bbAcuanBb, $baAcuanBb, $bbAcuanPenghasilan, $baAcuanPenghasilan) {
            //         $query->orWhereBetween('registration1s.usia', array($bbAcuanUsia, $baAcuanUsia))
            //         ->orWhereBetween('registration2s.tinggi_badan', array($bbAcuanTb, $baAcuanTb))
            //         ->orWhereBetween('registration2s.berat_badan', array($bbAcuanBb, $baAcuanBb))
            //         ->orWhereBetween('registration1s.penghasilan', array($bbAcuanPenghasilan, $baAcuanPenghasilan));
            //     });

            //     $calonPasangan = $calonPasangan1->get();
            // }
        }
        }

        
            // dd($calonPasangan);
// dd($calonPasangan);
        // dd($a);
        // end filter suku
        // dd($calonPasangan);
        $jumlahdata = count($calonPasangan);
        // dd($ekspektasiUsia.",".$ekspektasiTb.",".$ekspektasiBb.",".$ekspektasiPenghasilan);
        // dd($calonPasangan);
        $arrayCoba = array();
        // $i=1;
        for($i = 0; $i < $jumlahdata; $i++) {
            if(($calonPasangan[$i]->berat_badan - $daf->randBb) < 30){

             
            $usiaCalon = $calonPasangan[$i]->usia;
            $tinggiCalon = $calonPasangan[$i]->tinggi_badan;

            $beratCalon = $calonPasangan[$i]->berat_badan;
            $penghasilanCalon = $calonPasangan[$i]->penghasilan;
            $arrayCalon = array($usiaCalon,$tinggiCalon,$beratCalon,$penghasilanCalon);
            // dd($arrayCalon);
            // $result = array_intersect($arrayEkspektasi, $arrayCalon);
            // $totalKesamaan = count($result);

            // if($totalKesamaan == 4) {
            //     $statusKecocokan = "Sangat Cocok";
            // } elseif ($totalKesamaan == 3) {
            //     $statusKecocokan = "Cocok";
            // } elseif ($totalKesamaan == 2) {
            //     $statusKecocokan = "Cukup Cocok";
            // } elseif ($totalKesamaan == 1) {
            //     $statusKecocokan = "Kurang Cocok";
            // } elseif ($totalKesamaan == 0) {
            //     $statusKecocokan = "Tidak Cocok";
            // }
            $sUmur = $this->serasiUmur($ekspektasiUsia, $usiaCalon);
            $sTb = $this->serasiTb($ekspektasiTb, $tinggiCalon);
            $sBb = $this->serasiBb($ekspektasiBb, $beratCalon);
            $sPenghasilan = $this->serasiPenghasilan($ekspektasiPenghasilan, $penghasilanCalon);
            // dd($sUmur);
            // dd($sTb);
            // dd($sBb);
            // dd($sPenghasilan);
            error_log("nilai umur di bentuk himpunan keserasian umur        :". $sUmur);
            error_log("nilai tb di bentuk himpunan keserasian tb            :". $sTb);
            error_log("nilai bb di bentuk himpunan keserasian bb            :". $sBb);
            error_log("nilai penghasilan di bentuk himpunan keserasian peng :". $sPenghasilan);

            $gUmur = $this->grupUmur($sUmur);
            $gTinggiBadan = $this->grupTinggiBadan($sTb);
            $gBeratBadan = $this->grupBeratBadan($sBb);
            $gPenghasilan = $this->grupPenghasilan($sPenghasilan);
            // dd($gPenghasilan);
            $inference = $this->inference($gUmur, $gTinggiBadan, $gBeratBadan, $gPenghasilan);
            // $totalSkor = $gUmur + $gTinggiBadan + $gBeratBadan + $gPenghasilan;
            // $arrayHasil[$i] = array($calonPasangan[$i]->id => $inference);
            // dd($gUmur);
            // dd($gTinggiBadan);
            // dd($gBeratBadan);
            // dd($gPenghasilan);
            // dd($inference);
            // if($i == 17){
            //     dd('JANCOK METUO');
            // }
                $has = new Hasil;
                $has->id_pencari = $daf->id_user;
                $has->id_calon = $calonPasangan[$i]->id;
                $has->nilai = $inference;
                $has->save();

            // array_push($arrayCoba, [$daf->id_user, $calonPasangan[$i]->id,$inference]);
           
            // dd($statusKecocokan);
            // dd($gPenghasilan);
            // dd($has);
            }
        }
        // dd($arrayCoba);
        $lolos = DB::table('hasil')
            ->join('users','users.id','hasil.id_calon')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
            ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
            ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
            ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
            ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
            ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri', 'hasil.nilai')
            ->limit(3)
            ->orderby('nilai','DESC')
            ->get();

        // dd($lolos);
        $lolos = $lolos->toArray();

        // if ($request->hasFile('foto_diri')) {
        //     $img = Registration8::find($id);
        //     $path = base_path().'/public/images/foto_diri/'.$img->foto_diri;
            
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }
            
        //     $photo = $request->file('foto_diri');
        //     $destination = base_path().'/public/images/foto_diri/';
        //     $filename = $photo->getClientOriginalName();
        //     $photo->move($destination,$filename);
        //     $foto_diri['foto_diri'] = $filename;
        // }

        $hapusHasil = DB::table('hasil')
            ->where('hasil.id_pencari', '=', $daf->id_user)
            ->delete();
        
        // $calonFix = DB::table('users')
        //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //     ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
        //     ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
        //     ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
        //     ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
        //     ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
        //     ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration7s.*', 'registration8s.foto_diri')
        //     ->where('registration1s.jenis_kelamin','=', $daf->jenis_kelamin)
        //     ->whereIn('')
        //     ->get();
        
        // dd($lolos);

        // $total_umur = $b->randUmur;
        // $total_tinggi_badan = $b->randTb;
        // $total_berat_badan = $b->randBb;
        // $total_penghasilan = $b->randPenghasilan;
        //select user sesuai ekspektasi hadi

        // $gUmur = $this->grupUmur($total_umur);
        // $gTinggiBadan = $this->grupTinggiBadan($total_tinggi_badan);
        // $gBeratBadan = $this->grupBeratBadan($total_berat_badan);
        // $gPenghasilan = $this->grupPenghasilan($total_penghasilan);
        // $inference = $this->inference($gUmur, $gTinggiBadan, $gBeratBadan, $gPenghasilan);
        // $test = array(2,43,15,64,7,8);
        // $min = max($test);
        // array(id_user, nilai)
        // dd($calonPasangan);

        // $daf = Registration1::where('nama_lengkap', $id)->first();
        // return compact('daf');
        // return view('admin.pages.detail', compact('daf'));
        return view('admin.pages.detail', compact('daf'))->with('name',  $lolos);
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

    // kirim email
    public function postEmail(Request $request) {
        // dd($request->id_penerima);
        // klik taarufkan = laki2
        if ($request->jenis_kelamin == "Laki-laki") {
            // dd("Hai1");
            $penerima = DB::table('users')
                ->select('email')
                ->where('id','=',$request->id_pengirim)->first();

            $pengirim = DB::table('users')
                ->select('email')
                ->where('id','=',$request->id_penerima)->first();

            // laki-laki
            $status_penerima = DB::table('registration1s')
                ->where('id_user', '=', $request->id_penerima)
                ->update(['status' => 2, 'pemegang_form' => 1]);

            // perempuan
            $status_pengirim = DB::table('registration1s')
                ->where('id_user', '=', $request->id_pengirim)
                ->update(['status' => 2]);
            
            // dd($penerima->email);
            // dd($pengirim->email);
        } elseif ($request->jenis_kelamin == "Perempuan") {
            // dd("Hai2");
            $penerima = DB::table('users')
                ->select('email')
                ->where('id','=',$request->id_penerima)->first();

            $pengirim = DB::table('users')
                ->select('email')
                ->where('id','=',$request->id_pengirim)->first();

            // perempuan
            $status_penerima = DB::table('registration1s')
                ->where('id_user', '=', $request->id_penerima)
                ->update(['status' => 2]);

            // laki-laki
            $status_pengirim = DB::table('registration1s')
                ->where('id_user', '=', $request->id_pengirim)
                ->update(['status' => 2, 'pemegang_form' => 1]);
        }

        // $penerima = DB::table('users')
        //     ->select('email')
        //     ->where('id','=',$request->id_penerima)->first();
        // $pengirim = DB::table('users')
        //     ->select('email')
        //     ->where('id','=',$request->id_pengirim)->first();

        Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message)  {
            $message->to('farshazizi22@gmail.com', 'Taaruf')->subject('Ada yang ingin bertaaruf dengan kamu');
            $message->from('farshazizi22@gmail.com', 'Admin');
        });

        // $reg1 = Registration1::find($id);
        // $reg1->status = 2;
        // $reg1->save();

        $data_pas1 = new Data_pasangan;
        $data_pas2 = new Data_pasangan;

        $data_pas1->id_pengirim  = $request->id_pengirim;
        $data_pas1->id_penerima  = $request->id_penerima;
        $data_pas1->status_tolak = 0;
        $data_pas1->save();

        $data_pas2->id_pengirim  = $request->id_penerima;
        $data_pas2->id_penerima  = $request->id_pengirim;
        $data_pas2->status_tolak = 0;
        $data_pas2->save();

        // $pas_taaruf = new Pasangan_taaruf;
        // $pas_taaruf->id_pasangan1   = $request->id_pengirim;
        // $pas_taaruf->id_pasangan2   = $request->id_penerima;
        // $pas_taaruf->status_hold    = 1;
        // $pas_taaruf->save();

        // return view('admin.pages.match');
        return redirect('/admin/match');
    }

    public function serasiUmur($ekspetasi_usia, $s_total_usia) {
        $n_serasi_umur = (abs($ekspetasi_usia - $s_total_usia) / 17) * 100;
        return $n_serasi_umur;
    }

    public function serasiTb($ekspetasi_tb, $s_total_tb) {
        $n_serasi_tb = (abs($ekspetasi_tb - $s_total_tb) / 80) * 100;
        return $n_serasi_tb;
    }

    public function serasiBb($ekspetasi_bb, $s_total_bb) {
        $n_serasi_bb = (abs($ekspetasi_bb - $s_total_bb) / 60) * 100;
        return $n_serasi_bb;
    }

    public function serasiPenghasilan($ekspetasi_penghasilan, $s_total_penghasilan) {
        $n_serasi_penghasilan = (abs($ekspetasi_penghasilan - $s_total_penghasilan) / 14500000) * 100;
        return $n_serasi_penghasilan;
    }

    // function aplikasi fungsi implikasi
    public function grupUmur($total_umur) {
        if ($total_umur<=30) {
            $a = 1;
        } elseif ($total_umur>=30 && $total_umur<=70) {
            $a = (70-$total_umur)/(70-30);
        } elseif ($total_umur>=70) {
            $a = 0;
        }

        if ($total_umur<=30 || $total_umur>=90) {
            $b = 0;
        } elseif ($total_umur>=30 && $total_umur<=70) {
            $b = ($total_umur-30)/(70-30);
        } elseif ($total_umur>=70 && $total_umur<=90) {
            $b = (90-$total_umur)/(90-70);
        }

        if ($total_umur<=70) {
            $c = 0;
        } elseif ($total_umur>=70 && $total_umur<=90) {
            $c = ($total_umur-70)/(90-70);
        } elseif ($total_umur>=90) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupTinggiBadan($total_tinggi_badan) {
        if ($total_tinggi_badan<=10) {
            $a = 1;
        } elseif ($total_tinggi_badan>=10 && $total_tinggi_badan<=50) {
            $a = (50-$total_tinggi_badan)/(50-10);
        } elseif ($total_tinggi_badan>=50) {
            $a = 0;
        }

        if ($total_tinggi_badan<=10 || $total_tinggi_badan>=70) {
            $b = 0;
        } elseif ($total_tinggi_badan>=10 && $total_tinggi_badan<=50) {
            $b = ($total_tinggi_badan-10)/(50-10);
        } elseif ($total_tinggi_badan>=50 && $total_tinggi_badan<=70) {
            $b = (70-$total_tinggi_badan)/(70-50);
        }

        if ($total_tinggi_badan<=50) {
            $c = 0;
        } elseif ($total_tinggi_badan>=50 && $total_tinggi_badan<=70) {
            $c = ($total_tinggi_badan-50)/(70-50);
        } elseif ($total_tinggi_badan>=70) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupBeratBadan($total_berat_badan) {
        if ($total_berat_badan<=30) {
            $a = 1;
        } elseif ($total_berat_badan>=30 && $total_berat_badan<=50) {
            $a = (50-$total_berat_badan)/(50-30);
        } elseif ($total_berat_badan>=50) {
            $a = 0;
        }

        if ($total_berat_badan<=30 || $total_berat_badan>=80) {
            $b = 0;
        } elseif ($total_berat_badan>=30 && $total_berat_badan<=50) {
            $b = ($total_berat_badan-30)/(50-30);
        } elseif ($total_berat_badan>=50 && $total_berat_badan<=80) {
            $b = (80-$total_berat_badan)/(80-50);
        }

        if ($total_berat_badan<=50) {
            $c = 0;
        } elseif ($total_berat_badan>=50 && $total_berat_badan<=80) {
            $c = ($total_berat_badan-50)/(80-50);
        } elseif ($total_berat_badan>=80) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupPenghasilan($total_penghasilan) {
        if ($total_penghasilan<=30) {
            $a = 1;
        } elseif ($total_penghasilan>=30 && $total_penghasilan<=50) {
            $a = (50-$total_penghasilan)/(50-30);
        } elseif ($total_penghasilan>=50) {
            $a = 0;
        }

        if ($total_penghasilan<=30 || $total_penghasilan>=70) {
            $b = 0;
        } elseif ($total_penghasilan>=30 && $total_penghasilan<=50) {
            $b = ($total_penghasilan-30)/(50-30);
        } elseif ($total_penghasilan>=50 && $total_penghasilan<=70) {
            $b = (70-$total_penghasilan)/(70-50);
        }

        if ($total_penghasilan<=50) {
            $c = 0;
        } elseif ($total_penghasilan>=50 && $total_penghasilan<=70) {
            $c = ($total_penghasilan-50)/(70-50);
        } elseif ($total_penghasilan>=70) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    // aplikasi fungsi implikasi if ... then ... dan alfa-predikat
    public function inference($imp_umur, $imp_tb, $imp_bb, $imp_penghasilan) {
        $rules = array(81);

        // tidak cocok
        $rules[0] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);

        // kurang cocok
        $rules[1] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $rules[2] = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);
        $rules[3] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
        $rules[4] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $rules[5] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);

        $rules[6] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
        $rules[7] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);
        $rules[8] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);

        // cukup cocok
        $rules[9] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $rules[10] = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);
        $rules[11] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
        $rules[12] = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
        $rules[13] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);

        $rules[14] = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
        $rules[15] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
        $rules[16] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
        $rules[17] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $rules[18] = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);

        $rules[19] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $rules[20] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        $rules[21] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $rules[22] = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);
        $rules[23] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);

        $rules[24] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $rules[25] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
        $rules[26] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
        $rules[27] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $rules[28] = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);

        $rules[29] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
        $rules[30] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $rules[31] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
        $rules[32] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);

        // cocok
        $rules[33] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $rules[34] = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
        $rules[35] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $rules[36] = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);
        $rules[37] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);

        $rules[38] = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
        $rules[39] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
        $rules[40] = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);
        $rules[41] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $rules[42] = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);

        $rules[43] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
        $rules[44] = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
        $rules[45] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
        $rules[46] = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
        $rules[47] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);

        $rules[48] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
        $rules[49] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
        $rules[50] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $rules[51] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $rules[52] = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);

        $rules[53] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $rules[54] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        $rules[55] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $rules[56] = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);
        $rules[57] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);

        $rules[58] = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);
        $rules[59] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
        $rules[60] = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);
        $rules[61] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
        $rules[62] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);

        $rules[63] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $rules[64] = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);
        $rules[65] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $rules[66] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        
        // sangat cocok
        $rules[67] = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $rules[68] = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);
        $rules[69] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
        $rules[70] = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
        $rules[71] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);

        $rules[72] = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);
        $rules[73] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $rules[74] = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);
        $rules[75] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $rules[76] = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);

        $rules[77] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
        $rules[78] = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
        $rules[79] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
        $rules[80] = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);

        // dd($rules);
        // error_log("nilai y di setiap rules: ". $rules);
        $nilaiTidakCocok = 0;
        $nilaiKurangCocok = 0;
        $nilaiCukupCocok = 0;
        $nilaiCocok = 0;
        $nilaiSangatCocok = 0;

        // $nilaiTidakCocokArray = array();
        // $nilaiKurangCocokArray = array();
        // $nilaiCukupCocokArray = array();
        // $nilaiCocokArray = array();
        // $nilaiSangatCocokArray = array();

        $nilaiY1 = array();
        $jumDat = count($rules);
        // dd($jumDat);
        for ($i=0; $i < $jumDat-1; $i++) { 
            if ($rules[$i] > 0 && $rules[$i] != $rules[$i+1]) {
                    $nilaiY1[$i] = $rules[$i];
                // if ($rules[$i] != $rules[$i+1]) {
                // }
            }

            if($i == 0 && $rules[$i] != 0){
                $nilaiTidakCocok = $rules[$i];
            } elseif ($i >= 1 && $i <= 8 && $rules[$i] != 0) {
                $nilaiKurangCocok = $rules[$i];
            } elseif ($i >= 9 && $i <= 32 && $rules[$i] != 0) {
                $nilaiCukupCocok = $rules[$i];
            } elseif ($i >= 33 && $i <= 66 && $rules[$i] != 0) {
                $nilaiCocok = $rules[$i];
            } elseif ($i >= 67 && $i <= 80 && $rules[$i] != 0) {
                $nilaiSangatCocok = $rules[$i];
            }
        }
        // $nilaiTidakCocok  = max($nilaiTidakCocokArray);
        // $nilaiKurangCocok = max($nilaiKurangCocokArray);
        // $nilaiCukupCocok  = max($nilaiCukupCocokArray);
        // $nilaiCocok       = max($nilaiCocokArray);
        // $nilaiSangatCocok = max($nilaiSangatCocokArray);
        // dd($nilaiCukupCocok);
        // dd($nilaiCocok);
        // dd($nilaiSangatCocok);
        // error_log("tidak cocok  : ". $nilaiTidakCocok);
        // error_log("kurang cocok : ". $nilaiKurangCocok);
        // error_log("cukup cocok  : ". $nilaiCukupCocok);
        // error_log("cocok        : ". $nilaiCocok);
        // error_log("sangat cocok : ". $nilaiSangatCocok);

        $nilaiY = array();
        $nilaiY = array_unique($nilaiY1);
        // $nilaiY = max($nilaiY1);
        // dd($nilaiY);
        $test = array();
        foreach ($nilaiY as $key => $value) {
            $acuan_rule = DB::table('acuan_rules')
                ->select('bb_x','ba_x')
                ->where('acuan_rules.bb_rule','<=', $key)
                ->where('acuan_rules.ba_rule','>=', $key)
                ->first();
 
            array_push($test, $acuan_rule) ;
        }
        $batasBawah = "";
        $batasAtas = "";
        foreach ($test as $key => $value) {
            if ($batasBawah == "") {
                $batasBawah = $value->bb_x;
            } elseif ($batasBawah != "" && $batasBawah > $value->bb_x) {
                $batasBawah = $value->bb_x;
            }

            if ($batasAtas == "") {
                $batasAtas = $value->ba_x;
            } elseif ($batasAtas != "" && $batasAtas < $value->ba_x) {
                $batasAtas = $value->ba_x;
            }
        }

        $sampelX = array();
        $rangeArea = $batasAtas - $batasBawah;
        // error_log("batas bawah x : ". $batasBawah);
        // error_log("batas atas x  : ". $batasAtas);
        // dd($rangeArea);
        $tampung = 0;
        for ($i=0; $i < $rangeArea; $i++) { 
            $tampung = ($batasBawah + 1) + $i;
            $sampelX[$i] = $tampung;
        }
        // dd($sampelX);
        
        $sampelY = array();
        $hasil = 0;
        for($i = $batasBawah+1; $i <= $batasAtas; $i++){
            if ($i >= 0 && $i <= 15) {
                $hasil = $nilaiTidakCocok;
            }
            if ($i >= 16 && $i <= 24) {
                if ($nilaiTidakCocok != 0 && $nilaiKurangCocok != 0 && $nilaiTidakCocok < $nilaiKurangCocok) {
                    $hasil = ($i-15)/(25-15);
                } elseif ($nilaiTidakCocok != 0 && $nilaiKurangCocok != 0 && $nilaiTidakCocok > $nilaiKurangCocok) {
                    $hasil = (25-$i)/(25-15);
                } elseif ($nilaiTidakCocok != 0 && $nilaiKurangCocok == 0) {
                    if ($i <= 20) {
                        $hasil = $nilaiCocok;
                    } else {
                        $hasil = (25-$i)/(25-15);
                    }
                } elseif ($nilaiTidakCocok == 0 && $nilaiKurangCocok != 0) {
                    if ($hasil == 0) {
                        $hasil = ($i-15)/(25-15);
                    } else {
                        $hasil = $nilaiKurangCocok; 
                    }
                }
            }
            if ($i >= 25 && $i <= 30) {
                $hasil = $nilaiKurangCocok;
            }
            if ($i >= 31 && $i <= 44) {
                if ($nilaiKurangCocok != 0 && $nilaiCukupCocok != 0 && $nilaiKurangCocok < $nilaiCukupCocok) {
                    if ($i = 37.5) {
                        $hasil = $nilaiKurangCocok;
                    } else {
                        $hasil = ($i-30)/(45-30);
                    }
                } elseif ($nilaiKurangCocok != 0 && $nilaiCukupCocok != 0 && $nilaiKurangCocok > $nilaiCukupCocok) {
                    $hasil = (45-$i)/(45-30);
                } elseif ($nilaiKurangCocok != 0 && $nilaiCukupCocok == 0) {
                    if($hasil <= 37.5) {
                        $hasil = $nilaiKurangCocok;
                    } else {
                        $hasil = (45-$i)/(45-30);
                    }
                } elseif ($nilaiKurangCocok == 0 && $nilaiCukupCocok != 0) {
                    if($hasil == 0) {
                        $hasil = ($i-30)/(45-30);
                    } else {
                        $hasil = $nilaiCukupCocok;
                    }
                }
            }
            if ($i >= 45 && $i <= 55) {
                $hasil = $nilaiCukupCocok;
            }
            if ($i >= 56 && $i <= 69) {
                if ($nilaiCukupCocok != 0 && $nilaiCocok != 0 && $nilaiCukupCocok < $nilaiCocok) {
                    if ($i >= 62.5) {
                        $hasil = $nilaiCocok;
                    } else {
                        $hasil = ($i-55)/(70-55);
                    }
                } elseif ($nilaiCukupCocok != 0 && $nilaiCocok != 0 && $nilaiCukupCocok > $nilaiCocok) {
                    $hasil = (70-$i)/(70-55);
                } elseif ($nilaiCukupCocok != 0 && $nilaiCocok == 0) {
                    if($hasil <= 62.5) {
                        $hasil = $nilaiCocok;
                    } else {
                        $hasil = (70-$i)/(70-55);
                    }
                } elseif ($nilaiCukupCocok == 0 && $nilaiCocok != 0) {
                    if ($hasil == 0) {
                        $hasil = ($i-55)/(70-55);
                    } else {
                        $hasil = $nilaiCocok;
                    }
                }
            }
            if ($i >= 70 && $i <= 75) {
                $hasil = $nilaiCocok;
            }
            if ($i >= 76 && $i <84) {
                if ($nilaiCocok != 0 && $nilaiSangatCocok != 0 && $nilaiCocok < $nilaiSangatCocok) {
                    $hasil = ($i-75)/(85-75);
                } elseif ($nilaiCocok != 0 && $nilaiSangatCocok != 0 && $nilaiCocok > $nilaiSangatCocok) {
                    $hasil = (85-$i)/(85-75);
                } elseif ($nilaiCocok != 0 && $nilaiSangatCocok == 0) {
                    if ($i <= 80) {
                        $hasil = $nilaiCocok;
                    } else {
                        $hasil = (85-$i)/(85-75);
                    }
                } elseif ($nilaiCocok == 0 && $nilaiSangatCocok != 0) {
                    if ($hasil == 0) {
                        $hasil = ($i-75)/(85-75);
                    } else {
                        $hasil = $nilaiSangatCocok; 
                    }
                }
            }
            if ($i >= 85 && $i <= 100) {
                $hasil = $nilaiSangatCocok;
            }
            array_push($sampelY, $hasil);
            // ini_set('memory_limit', '-1');
            // ini_set('memory_limit', '160M');

        }
        // dd($sampelY);

       $hasilKali = array();
       for ($i=0; $i < $rangeArea; $i++) { 
           $hasilKali[$i] = $sampelX[$i] * $sampelY[$i];
       }
       
       $pembagiAtas = array_sum($hasilKali);
       $pembagiBawah = array_sum($sampelY);
       // dd("ini pembagi atas ". $pembagiAtas);
       // dd("ini pembagi bawah ". $pembagiBawah);
       $z = $pembagiAtas/$pembagiBawah;
       // dd($z);
       return $z;
    }
}
