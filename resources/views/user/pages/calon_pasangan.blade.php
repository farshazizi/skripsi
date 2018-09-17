@extends('user/home')
@section('content')

@foreach($daf as $daf)
@if($daf->status == 1 && $daf->validasi == 2 || $daf->status == 5 && $daf->validasi == 2)
<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="limiter">
          <div class="container-login100">
            <div class="login100-more-home" style="background-image: url('{{ asset('images/latar_baru.jpg') }}'); width: 100%;">
              <div class="card col-md-6 container" style="border-radius: 8px">
                <div class="card-body">
                  <img src="{{ asset('images/mencari.jpg') }}" style="margin-left: 43%; margin-bottom: 5%; width: 18%">
                  <h3 style="color: #d86162; text-align: center;">Karena jodoh pasti bertemu</h3><br>
                  <p style="margin-bottom: 5%; text-align: center; font-size: 16px">
                  Calon pasangan kamu sedang kami proses, harap sabar menunggu atau kamu dapat menghubungi kami untuk info lebih lanjut.
                  </p>
                  @if($daf->status == 5)
                  <a href="{{ route('ubah-kriteria.show', $daf->id_user) }}">
                    <button type="button" class="btn btn-block" style="background-color: #d86162; color: #ffffff">Ubah Kriteria</button>
                  </a>
                  <p style="text-align: left; color: #7a7c7f; font-size: 12px">
                    *Jika kamu ingin mengubah kriteria yang diharapkan klik tombol berikut
                  </p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if($daf->status == 2 && $daf->pemegang_form == 0)
<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="limiter">
          <div class="container-login100">
            <div class="login100-more-home" style="background-image: url('{{ asset('images/latar_baru.jpg') }}'); width: 100%;">
              <div class="card col-md-6 container" style="border-radius: 8px">
                <div class="card-body">
                  <img src="{{ asset('images/mencari.jpg') }}" style="margin-left: 43%; margin-bottom: 5%; width: 18%">
                  <h3 style="color: #d86162; text-align: center;">Karena jodoh pasti bertemu</h3><br>
                  <p style="margin-bottom: 5%; text-align: center; font-size: 16px">
                  Calon pasangan kamu sedang kami proses, harap sabar menunggu atau kamu dapat menghubungi kami untuk info lebih lanjut.
                  </p>
                  @if($daf->status == 5)
                  <a href="{{ route('ubah-kriteria.show', $daf->id_user) }}">
                    <button type="button" class="btn btn-block" style="background-color: #d86162; color: #ffffff">Ubah Kriteria</button>
                  </a>
                  <p style="text-align: left; color: #7a7c7f; font-size: 12px">
                    *Jika kamu ingin mengubah kriteria yang diharapkan klik tombol berikut
                  </p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if($daf->status == 1 && $daf->validasi == 0 || $daf->validasi == 1)
<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="limiter">
          <div class="container-login100">
            <div class="login100-more-home" style="background-image: url('{{ asset('images/latar_baru.jpg') }}'); width: 100%;">
              <div class="card col-md-6 container" style="border-radius: 8px">
                <div class="card-body">
                  <img src="{{ asset('images/mencari.jpg') }}" style="margin-left: 43%; margin-bottom: 5%; width: 18%">
                  <h3 style="color: #d86162; text-align: center;">Proses Matchmaking Belum Dapat Dilakukan</h3><br>
                  <p style="margin-bottom: 5%; text-align: center; font-size: 16px">
                  Harap cek kembali dan perbaiki biodata diri kamu. Pastikan semua data sudah terisi dengan benar.
                  </p>
                  <a href="/user/biodata-diri">
                    <button type="button" class="btn btn-block" style="background-color: #d86162; color: #ffffff">Ubah Biodata Diri</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if($daf->status == 2 && $daf->pemegang_form == 1 || $daf->status == 3 || $daf->status == 4)
<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <table border="0">
            {{-- @foreach($daf as $daf) --}}
            <tr>
              <td style="width: 20%" class="text-center">
                <img src="/images/foto_diri/{{ $daf->foto_diri }}" style="width: 75%; height: auto; border-radius: 8px">
              </td>
              <td style="width: 40%">
                <table style="width: 100%" border="0">
                  <tr>
                    <td style="padding-left: 16px">
                      @if($daf->jenis_kelamin == "Laki-laki")
                        {{-- <h4>{{ $daf->nama_lengkap }}</h4> --}}
                        <h4>Akhi</h4>
                      @endif
                      @if($daf->jenis_kelamin == "Perempuan")
                        <h4>Ukhti</h4>
                      @endif
                    </td>
                    {{-- <td style="padding-left: 16px"><h4>Akhi</h3></td> --}}
                  </tr>
                  <tr>
                    <td style="padding-left: 16px">Siap bertaaruf dengan kamu</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 16px; padding-top: 16px; width: 50%">
                      @if($daf->status == 2)
                      {!! Form::model($daf, ['method' => 'PATCH', 'files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['calon-pasangan.update', $daf->id]]) !!}
                      {{ method_field('PATCH') }}{{csrf_field()}}
                      {{-- <button type="button" class="btn btn-default" style="margin-right: 8px; width: 30%; background-color: #d86162; color: #ffffff">Terima</button> --}}
                      {{ Form::submit('Terima', array('class' => 'btn btn-default', 'style' => 'margin-right: 8px; width: 30%; background-color: #d86162; color: #ffffff')) }}

                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#demo-1" style="width: 30%">Tolak</button>
                      {!! Form::close() !!}
                      @endif

                      @if($daf->status == 3)
                      <button type="button" class="btn btn-default btn-block" style="margin-right: 8px; width: auto; background-color: #d86162; color: #ffffff">Form kamu sedang dipihak laki-laki</button>
                      @endif

                      @if($daf->status == 4)
                      <button type="button" class="btn btn-default btn-block" style="margin-right: 8px; width: auto; background-color: #d86162; color: #ffffff">Sedang bertaaruf dengan kamu</button>
                      @endif

                      {{-- <button type="button" class="btn btn-info"    data-toggle="modal" data-target="#demo-2">Launch Modal #2</button> --}}

                      <!-- [ Modal #1 ] -->
                      <div class="modal fade" id="demo-1" tabindex="-1">
                        <div class="modal-dialog">
                         <div class="modal-content">
                          <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                          <div class="modal-header">
                            <h4 class="modal-title caps"><strong></strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            {{-- <div class="form-group"> --}}
                              {{-- <div class="input-group"> --}}
                                <center><img src="/images/icon_user/broken-heart.svg" class="rounded-circle" style="width: 12%; height: auto; margin-top: 8px; margin-bottom: 8px"></center>
                                <center><h4 style="margin-top: 16px; margin-bottom: 16px">Apakah kamu yakin?</h4></center>
                                <p style="margin-top: 8px; margin-bottom: 8px"><center>Sudah pastikah hatimu untuk menolak calon pasangan ini</center></p>
                                <center>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#demo-2" data-dismiss="modal" style="margin-left: 8px; margin-right: 8px; width: 25%">Iya</button>
                                <button type="button" class="btn" data-dismiss="modal" style="margin-left: 8px; margin-right: 8px; width: 25%; background-color: #d86162; color: #ffffff">Tidak</button>
                              {{-- </div> --}}
                            {{-- </div> --}}
                          </div>
                           {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#demo-2" data-dismiss="modal">Iya</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                            </div> --}}
                         </div>
                        </div>
                      </div>

                      <!-- [ Modal #2 ] -->
                      <div class="modal fade" id="demo-2" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                            <div class="modal-header">
                              <h4 class="modal-title caps">Beritahu Alasannya</h4>
                              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                            </div>
                            <div class="modal-body">
                              {!! Form::open(['route' => 'calon-pasangan.store']) !!}
                                {{ Form::hidden('id_penolak') }}

                                {{ Form::hidden('id_menolak') }}

                                {{ Form::label('alasan', 'Alasan Kamu menolak', array('style' => 'margin-top: 0px')) }}
                                {{ Form::textarea('alasan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alasan saya menolak ...', 'style' => 'width:100%')) }}
                            </div>
                            <div class="modal-footer">
                              {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demo-1" data-dismiss="modal">Close current, Launch Modal #1</button>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#demo-3" data-dismiss="modal">Close current, Launch Modal #3</button> --}}
                              {{-- <button class="btn btn-primary">Kirim</button> --}}
                                {{ Form::submit('Kirim', array('class' => 'btn btn-md', 'style' => 'width:30%; background-color: #d86162; color: #ffffff')) }}
                              {!! Form::close() !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
              <td style="width: 40%">
                <table>
                  <tr>
                    <td style="padding: 8px;">Status Pernikahan</td>
                    <td>:</td>
                    <td>{{ $daf->status_pernikahan }}</td>
                  </tr>
                  <tr>
                    <td style="padding: 8px;">Usia</td>
                    <td>:</td>
                    <td>{{ $daf->usia }} tahun</td>
                  </tr>
                  <tr>
                    <td style="padding: 8px">Tinggi Badan</td>
                    <td>:</td>
                    <td>{{ $daf->tinggi_badan }} cm</td>
                  </tr>
                  <tr>
                    <td style="padding: 8px">Berat Badan</td>
                    <td>:</td>
                    <td>{{ $daf->berat_badan }} kg</td>
                  </tr>
                  <tr>
                    <td style="padding: 8px">Penghasilan</td>
                    <td>:</td>
                    <td>Rp{{ $daf->penghasilan }}</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-body">
        <table border="0" style="margin-bottom: 24px">
          <tr>
            <td><h5>Visi Pernikahan</h5></td>
          </tr>
          <tr>
            <td>{{ $daf->visi_pernikahan }}</td>
          </tr>
        </table>

        <p>
          <img src="{{ asset('/images/icon_user/Group-404.svg') }}" style="width: 32px; height: auto;"> <b>Biodata Diri</b>
        </p>
        <table border="0">
          <tr>
            <td>Pekerjaan</td>
            <td style="padding-left: 24px; padding-right: 8px">:</td>
            <td>{{ $daf->pekerjaan }}</td>
          </tr>
          <tr>
            <td>Golongan Darah</td>
            <td style="padding-left: 24px; padding-right: 8px">:</td>
            <td>{{ $daf->gol_darah }}</td>
          </tr>
          <tr>
            <td>Pendidikan Terakhir</td>
            <td style="padding-left: 24px; padding-right: 8px">:</td>
            <td>{{ $daf->pendidikan_terakhir }}</td>
          </tr>
        </table>

        <p style="margin-top: 3%">
          <img src="{{ asset('/images/icon_user/businessman-personal-data-paper.svg') }}" style="width: 24px; height: auto;"> <b>Informasi Pribadi</b>
        </p>
        <table border="0">
          <tr>
            <td>Ibadah Sunnah</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->ibadah_sunnah }}</td>
          </tr>
          <tr>
            <td>Jamah yang diikuti</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->jamaah_diikuti }}</td>
          </tr>
          <tr>
            <td>Merokok</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->merokok }}</td>
          </tr>
          <tr>
            <td>Riwayat Kesehatan</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->riwayat_kesehatan }}</td>
          </tr>
        </table>

        <p style="margin-top: 3%">
          <img src="{{ asset('/images/icon_user/family.svg') }}" style="width: 4%; height: auto;"> <b>Informasi Keluarga</b>
        </p>
        <table border="0">
          <tr>
            <td>Suku Ayah</td>
            <td style="padding-left: 68px; padding-right: 8px">:</td>
            <td>{{ $daf->suku_ayah }}</td>
          </tr>
          <tr>
            <td>Suku Ibu</td>
            <td style="padding-left: 68px; padding-right: 8px">:</td>
            <td>{{ $daf->suku_ibu }}</td>
          </tr>
          <tr>
            <td>Izin menikah</td>
            <td style="padding-left: 68px; padding-right: 8px">:</td>
            <td>{{ $daf->izin_menikah }}</td>
          </tr>
        </table>
        {{-- @endforeach --}}
      </div>
    </div>
  </div>
</div
@endif
@endforeach

@endsection
