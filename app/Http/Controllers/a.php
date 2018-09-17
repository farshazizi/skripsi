<?php
// $sta = "";
        $sta = DB::table('users')
            ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
            ->select('registration1s.status', 'registration1s.jenis_kelamin')
            ->where('id_user', '=', Auth::user()->id)
            ->first();
            // ->pluck('status');
        // $sta = $stas[0];
            // dd($sta->jenis_kelamin);
        if ($sta->status == 1 || $sta->status == 2) {
            if ($sta->jenis_kelamin == "Perempuan") {
                $calon_perempuan = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.status')
                    ->where('id_user', '=', $calon_perempuan->id_penerima)
                    ->first();
                    // dd($status_cp);

                $daf = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                    // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                    ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                    ->where('registration1s.id_user', '=', $calon_perempuan->id_penerima)
                    ->get();

                return view('user.pages.calon_pasangan', compact('daf'));
            } elseif ($sta->jenis_kelamin == "Laki-laki") {
                // dd("Laki-laki");
                $calon_laki = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.status')
                    ->where('id_user', '=', $calon_laki->id_penerima)
                    ->first();
                    // dd($status_calpas->status);

                // if ($status_laki->status == 1 || $status_laki->status == 2) {
                    $daf = DB::table('users')
                        ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                        ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                        ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                        ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                        // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                        ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                        ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                        ->where('registration1s.id_user', '=', $calon_laki->id_penerima)
                        ->get();

                    return view('user.pages.calon_pasangan', compact('daf'));
                // }
            }
        } elseif ($sta->status == 3) {
            if ($sta->jenis_kelamin == "Perempuan") {
                $calon_perempuan = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.status')
                    ->where('id_user', '=', $calon_perempuan->id_penerima)
                    ->first();
                    // dd($status_cp);

                $daf = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                    ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                    ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                    // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                    ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                    ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                    ->where('registration1s.id_user', '=', $calon_perempuan->id_penerima)
                    ->get();

                return view('user.pages.calon_pasangan', compact('daf'));
            } elseif ($sta->jenis_kelamin == "Laki-laki") {
                // dd("Laki-laki");
                $calon_laki = DB::table('data_pasangan')
                    ->select('id_penerima')
                    ->where('id_pengirim', '=', Auth::user()->id)
                    ->orderBy('id', 'DESC')
                    ->first();

                $status_calpas = DB::table('users')
                    ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                    ->select('registration1s.status')
                    ->where('id_user', '=', $calon_laki->id_penerima)
                    ->first();
                    // dd($status_calpas->status);

                // if ($status_laki->status == 1 || $status_laki->status == 2) {
                    $daf = DB::table('users')
                        ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
                        ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
                        ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
                        ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
                        // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
                        ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
                        ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
                        ->where('registration1s.id_user', '=', $calon_laki->id_penerima)
                        ->get();

                    return view('user.pages.calon_pasangan', compact('daf'));
                // }
            }
        }
        
        // if ($sta->status == 1 || $sta->status == 2) {
        //     $daf = DB::table('users')
        //         ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //         ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
        //         ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
        //         ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
        //         // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
        //         ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
        //         ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
        //         ->where('registration1s.id_user', '=', Auth::user()->id)
        //         ->get();
        //         return view('user.pages.calon_pasangan', compact('daf'));
        //     // return view('user.pages.menunggu_matchmaking');
        // } elseif ($sta->status == 3) {
        //     // dd("Hai");
        //     // $calon = "";
        //     $calons = DB::table('data_pasangan')
        //         ->select('id_penerima')
        //         ->where('id_pengirim', '=', Auth::user()->id)
        //         ->orderBy('id', 'DESC')
        //         ->first();
        //         // ->pluck('id_penerima');
        //     // $calon = $calons[0];
        //     // dd($calons->id_penerima);

        //     // $status = DB::table('users')
        //     //     ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //     //     ->select('registration1s.status')
        //     //     ->where('id_user', '=', $calons->id_penerima)
        //     //     ->first();

        //     $daf = DB::table('users')
        //         ->leftJoin('registration1s', 'users.id', '=', 'registration1s.id_user')
        //         ->leftJoin('registration2s', 'users.id', '=', 'registration2s.id_user')
        //         ->leftJoin('registration3s', 'users.id', '=', 'registration3s.id_user')
        //         ->leftJoin('registration4s', 'users.id', '=', 'registration4s.id_user')
        //         // ->leftJoin('registration7s', 'users.id', '=', 'registration7s.id_user')
        //         ->leftJoin('registration8s', 'users.id', '=', 'registration8s.id_user')
        //         ->select('users.id', 'registration1s.*', 'registration2s.*', 'registration3s.*', 'registration4s.*', 'registration8s.foto_diri')
        //         ->where('registration1s.id_user', '=', $calons->id_penerima)
        //         ->get();

        //     return view('user.pages.calon_pasangan', compact('daf'));
        // }