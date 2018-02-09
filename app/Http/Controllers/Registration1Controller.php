<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration1;
use App\Registration2;
use Session;
use Auth;
use DB;
use DateTime;

class Registration1Controller extends Controller
{
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

        // // store in the database
        $reg1 = new Registration1;

        $reg1->id_user                     = Auth::user()->id;
        $reg1->posisi                      = $request->posisi;
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
            $reg1->i_jumlahAnak = $request->i_jumlahAnak;
        }elseif ($reg1->status_pernikahan == "Belum pernah menikah") {
            $reg1->i_jumlahAnak = 0;
        }
        $reg1->penghasilan                 = $request->penghasilan;
        $reg1->izin_menikah                = $request->izin_menikah;
        $reg1->alamat_tinggal_saat_ini     = $request->alamat_tinggal_saat_ini;
        $reg1->posisi = 2;
        
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

        if ($request->hasFile('foto_diri')) {
            $img = Registration8::find($id);
            $path = base_path().'/public/images/foto_diri/' .$img->foto_diri;
            
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
        $arrayEkspektasi = array($ekspektasiUsia,$ekspektasiTb,$ekspektasiBb,$ekspektasiPenghasilan);

        // filter suku
        $confirm = "Iya";
        if($confirm == "Iya") {
            $calonPasangan1 = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                   ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan, registration3s.suku_ayah, registration3s.suku_ibu');
           $sukuAyah = $daf->suku_ayah;
           $sukuIbu = $daf->suku_ibu;
            $calonPasangan1->where(function ($query) use ($sukuAyah, $sukuIbu) {
                $query->orWhere('registration3s.suku_ayah','=', $sukuAyah)
                ->orWhere('registration3s.suku_ibu','=', $sukuIbu);
            });

            $calonPasangan = $calonPasangan1->get();
        } else {
            $calonPasangan = DB::table('users')
                ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                ->selectraw('users.id, registration1s.nama_lengkap, registration1s.tanggal_lahir, registration1s.jenis_kelamin, registration1s.usia, registration1s.penghasilan, registration2s.tinggi_badan, registration2s.berat_badan')
                ->where('registration1s.jenis_kelamin','!=', $daf->jenis_kelamin)
                ->get();
        }
        // dd($a);
        // dd($calonPasangan);
        // end filter suku

        $jumlahdata = count($calonPasangan);
        for($i = 0; $i < $jumlahdata; $i++) {
            $usiaCalon = $calonPasangan[$i]->usia;
            $tinggiCalon = $calonPasangan[$i]->tinggi_badan;
            $beratCalon = $calonPasangan[$i]->berat_badan;
            $penghasilanCalon = $calonPasangan[$i]->penghasilan;
            $arrayCalon = array($usiaCalon,$tinggiCalon,$beratCalon,$penghasilanCalon);
            $result = array_intersect($arrayEkspektasi, $arrayCalon);
            $totalKesamaan = count($result);

            if($totalKesamaan == 4) {
                $statusKecocokan = "Sangat Cocok";
            } elseif ($totalKesamaan == 3) {
                $statusKecocokan = "Cocok";
            } elseif ($totalKesamaan == 2) {
                $statusKecocokan = "Cukup Cocok";
            } elseif ($totalKesamaan == 1) {
                $statusKecocokan = "Kurang Cocok";
            } elseif ($totalKesamaan == 0) {
                $statusKecocokan = "Tidak Cocok";
            }

            $gUmur = $this->grupUmur($usiaCalon);
            $gTinggiBadan = $this->grupTinggiBadan($tinggiCalon);
            $gBeratBadan = $this->grupBeratBadan($beratCalon);
            $gPenghasilan = $this->grupPenghasilan($penghasilanCalon);
            $inference = $this->inference($gUmur, $gTinggiBadan, $gBeratBadan, $gPenghasilan);
            // $totalSkor = $gUmur + $gTinggiBadan + $gBeratBadan + $gPenghasilan;
            $arrayHasil = array($calonPasangan[$i]->id,$calonPasangan[$i]->nama_lengkap, $statusKecocokan, $inference);
            // dd($inference);
        }
        
        // dd($arrayHasil);

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
        //array(id_user, nilai)
        // dd($calonPasangan);

        // $daf = Registration1::where('nama_lengkap', $id)->first();
        // return compact('daf');
        return view('admin.pages.detail', compact('daf'));
        // return view('admin.pages.detail', compact('daf'))->$this->calculate();
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

    // function aplikasi fungsi implikasi
    public function grupUmur($total_umur) {
        // $a = 0;
        // $b = 0;
        // $c = 0;

        //himpunan turun
        if ($total_umur>=18 && $total_umur<=28) {
            $a = (28-$total_umur)/(28-18);
        } elseif ($total_umur>=28) {
            $a = 0;
        }

        //himpunan segitiga
        if ($total_umur<=23 || $total_umur>=33) {
            $b = 0;
        } elseif ($total_umur>=23 && $total_umur<=28) {
            $b = ($total_umur-23)/(28-23);
        } elseif ($total_umur>=28 && $total_umur<=33) {
            $b = (33-$total_umur)/(33-28);
        }

        //himpunan naik
        if ($total_umur<=28) {
            $c = 0;
        } elseif ($total_umur>=28 && $total_umur<=35) {
            $c = ($total_umur-28)/(35-28);
        } elseif ($total_umur>=35) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupTinggiBadan($total_tinggi_badan) {
        // $a = 0;
        // $b = 0;
        // $c = 0;

        //himpunan turun
        if ($total_tinggi_badan>=50 && $total_tinggi_badan<=168) {
            $a = (168-$total_tinggi_badan)/(168-50);
        } elseif ($total_tinggi_badan>=168) {
            $a = 0;
        }

        //himpunan segitiga
        if ($total_tinggi_badan<=160 || $total_tinggi_badan>=175) {
            $b = 0;
        } elseif ($total_tinggi_badan>=160 && $total_tinggi_badan<=168) {
            $b = ($total_tinggi_badan-160)/(168-160);
        } elseif ($total_tinggi_badan>=168 && $total_tinggi_badan<=175) {
            $b = (175-$total_tinggi_badan)/(175-168);
        }

        //himpunan naik
        if ($total_tinggi_badan<=168) {
            $c = 0;
        } elseif ($total_tinggi_badan>=168 && $total_tinggi_badan<=200) {
            $c = ($total_tinggi_badan-168)/(200-168);
        } elseif ($total_tinggi_badan>=200) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupBeratBadan($total_berat_badan) {
        // $a = 0;
        // $b = 0;
        // $c = 0;

        //himpunan turun
        if ($total_berat_badan>=40 && $total_berat_badan<=63) {
            $a = (63-$total_berat_badan)/(63-40);
        } elseif ($total_berat_badan>=63) {
            $a = 0;
        }

        //himpunan segitiga
        if ($total_berat_badan<=50 || $total_berat_badan>=75) {
            $b = 0;
        } elseif ($total_berat_badan>=50 && $total_berat_badan<=63) {
            $b = ($total_berat_badan-50)/(63-50);
        } elseif ($total_berat_badan>=63 && $total_berat_badan<=75) {
            $b = (75-$total_berat_badan)/(75-63);
        }

        //himpunan naik
        if ($total_berat_badan<=63) {
            $c = 0;
        } elseif ($total_berat_badan>=63 && $total_berat_badan<=100) {
            $c = ($total_berat_badan-63)/(100-63);
        } elseif ($total_berat_badan>=100) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    public function grupPenghasilan($total_penghasilan) {
        // $a = 0;
        // $b = 0;
        // $c = 0;

        //himpunan turun
        if ($total_penghasilan>=500000 && $total_penghasilan<=5000000) {
            $a = (5000000-$total_penghasilan)/(5000000-500000);
        } elseif ($total_penghasilan>=5000000) {
            $a = 0;
        }

        //himpunan segitiga
        if ($total_penghasilan<=3500000 || $total_penghasilan>=8000000) {
            $b = 0;
        } elseif ($total_penghasilan>=3500000 && $total_penghasilan<=5000000) {
            $b = ($total_penghasilan-3500000)/(5000000-3500000);
        } elseif ($total_penghasilan>=5000000 && $total_penghasilan<=8000000) {
            $b = (8000000-$total_penghasilan)/(8000000-5000000);
        }

        //himpunan naik
        if ($total_penghasilan<=5000000) {
            $c = 0;
        } elseif ($total_penghasilan>=5000000 && $total_penghasilan<=12000000) {
            $c = ($total_penghasilan-5000000)/(12000000-5000000);
        } elseif ($total_penghasilan>=12000000) {
            $c = 1;
        }

        $mfuzzy = [$a, $b, $c];
        return $mfuzzy;
    }

    // aplikasi fungsi implikasi if ... then ... dan alfa-predikat
    public function inference($imp_umur, $imp_tb, $imp_bb, $imp_penghasilan) {
        // mpkm, mpks, mpkk
        $r1 = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        $r2 = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
        $r3 = min($imp_umur[0], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);

        // mpbm, mpbs, mpbk
        $r4 = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $r5 = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
        $r6 = min($imp_umur[0], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);
        
        // mpgm, mpgs, mpgk
        $r7 = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
        $r8 = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $r9 = min($imp_umur[0], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);
        
        // mskm, msks, mskk
        $r10 = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
        $r11 = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $r12 = min($imp_umur[0], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);

        // msbm, msbs, msbk
        $r13 = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
        $r14 = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $r15 = min($imp_umur[0], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);

        // msgm, msgs, msgk
        $r16 = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
        $r17 = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
        $r18 = min($imp_umur[0], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);

        // mtkm, mtks, mtkk
        $r19 = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $r20 = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
        $r21 = min($imp_umur[0], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);

        // mtbm, mtbs, mtbk
        $r22 = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
        $r23 = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $r24 = min($imp_umur[0], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);

        // mtgm, mtgs, mtgk
        $r25 = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);
        $r26 = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $r27 = min($imp_umur[0], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);

        // ppkm, ppks, ppkk
        $r28 = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        $r29 = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
        $r30 = min($imp_umur[1], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);

        // ppbm, ppbs, ppbk
        $r31 = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $r32 = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
        $r33 = min($imp_umur[1], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);

        // ppgm, ppgs, ppgk
        $r34 = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
        $r35 = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $r36 = min($imp_umur[1], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);

        // pskm,psks, pskk
        $r37 = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
        $r38 = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $r39 = min($imp_umur[1], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);

        // psbm, psbs, psbk
        $r40 = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
        $r41 = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $r42 = min($imp_umur[1], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);

        // psgm, psgs, psg
        $r43 = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
        $r44 = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
        $r45 = min($imp_umur[1], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);

        // ptkm, ptks, ptkk
        $r46 = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $r47 = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
        $r48 = min($imp_umur[1], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);

        // ptbm, ptbs, ptbk
        $r49 = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
        $r50 = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $r51 = min($imp_umur[1], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);

        // ptgm, ptgs, ptgk
        $r52 = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);
        $r53 = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $r54 = min($imp_umur[1], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);

        // tpkm, tpks, tpkk
        $r55 = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[0]);
        $r56 = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[1]);
        $r57 = min($imp_umur[2], $imp_tb[0], $imp_bb[0], $imp_penghasilan[2]);

        // tpbm, tpbs, tpbk
        $r58 = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[0]);
        $r59 = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[1]);
        $r60 = min($imp_umur[2], $imp_tb[0], $imp_bb[1], $imp_penghasilan[2]);

        // tpgm, tpgs, tpgk
        $r61 = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[0]);
        $r62 = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[1]);
        $r63 = min($imp_umur[2], $imp_tb[0], $imp_bb[2], $imp_penghasilan[2]);

        // tskm, tsks, tskk
        $r64 = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[0]);
        $r65 = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[1]);
        $r66 = min($imp_umur[2], $imp_tb[1], $imp_bb[0], $imp_penghasilan[2]);

        // tsbm, tsbs, tsbk
        $r67 = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[0]);
        $r68 = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[1]);
        $r69 = min($imp_umur[2], $imp_tb[1], $imp_bb[1], $imp_penghasilan[2]);

        // tsgm, tsgs, tsgk
        $r70 = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[0]);
        $r71 = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[1]);
        $r72 = min($imp_umur[2], $imp_tb[1], $imp_bb[2], $imp_penghasilan[2]);

        // ttkm, ttks, ttkk
        $r73 = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[0]);
        $r74 = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[1]);
        $r75 = min($imp_umur[2], $imp_tb[2], $imp_bb[0], $imp_penghasilan[2]);

        // ttbm, ttbs, ttbk
        $r76 = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[0]);
        $r77 = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[1]);
        $r78 = min($imp_umur[2], $imp_tb[2], $imp_bb[1], $imp_penghasilan[2]);

        // ttgm, ttgs, ttgk
        $r79 = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[0]);
        $r80 = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[1]);
        $r81 = min($imp_umur[2], $imp_tb[2], $imp_bb[2], $imp_penghasilan[2]);

        $rules =  array($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13, $r14, $r15, $r16, $r17, $r18, $r19, $r20, $r21, $r22, $r23, $r24, $r25, $r26, $r27, $r28, $r29, $r30, $r31, $r32, $r33, $r34, $r35, $r36, $r37, $r38, $r38, $r39, $r40, $r41, $r42, $r42, $r43, $r44, $r45, $r46, $r47, $r48, $r49, $r50, $r51, $r52, $r53, $r54, $r55, $r56, $r57, $r58, $r59, $r60, $r61, $r62, $r63, $r64, $r65, $r66, $r67, $r68, $r69, $r70, $r71, $r72, $r73, $r74, $r75, $r76, $r77, $r78, $r79, $r80, $r81);

        $cariMin = min($rules); //x1
        $terkecil = number_format($cariMin, 2);

        $cariMax = max($rules); //x2
        $terbesar = number_format($cariMax, 2); //x2

        $nilaiY = array();
        $y1 = array();
        $jumDat = count($rules);
        for ($i=0; $i < $jumDat; $i++) { 
            if ($rules[$i] > 0) {
                if ($rules[$i] != $rules[$i+1]) {
                    $nilaiY[$i] = $rules[$i];
                }
            }
        }
        
        // komposisi aturan
        $y = array_values($nilaiY); //membuat index dimulai dari angka 0
        sort($y);
        $x = array();
        $jumDat2 = count($y);
        for ($j=0; $j < $jumDat2; $j++) { 
            $x[$j] = number_format((($y[$j]*90) + 10), 2);
        }
        // dd($y);
        $jumlahY = count($y);
        sort($x);

        //defuzzifikasi
        $sampelTerbesar = (int) round(max($x));
        $banyakSampel = array();
        $sampelZ = 0;
        $areaZ = 0;
        $miuY1 = 0;
        for ($m=0; $m < $jumlahY; $m++) { 
            $batas = 0;
            $batas = $x[$m];
            for ($i=0; $i < $sampelTerbesar; $i++) {
                $banyakSampel[$i] = $i + 1;
                if ($banyakSampel[$i] < $batas) {
                    $sampelZ = $banyakSampel[$i];
                }
            }
            $areaZ = $areaZ + $sampelZ;
            for ($i=0; $i < $jumlahY; $i++) { 
                $miuY1 = $miuY1 + $y[$i];
            }
        }
        $miuY = 0;
        $miuY = number_format($miuY1, 2);

        $z1 = $areaZ/$miuY;
        $z = number_format($z1, 2);

        // $z = ;
        // $z = array($a1, $a2);
                    
        return $z;
    }
}
