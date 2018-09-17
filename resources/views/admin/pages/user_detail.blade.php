@extends('admin/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/user">
          <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
        </a>
      </li>
    </ol>

    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          @foreach($detail as $daf)
          <div class="col-md-4">
            <table border="0">
              <tr>
                <td class="text-center" style="width: 20%; height: auto;">
                  <img src="/images/foto_diri/{{ $daf->foto_diri }}" class="croping" style="width: auto; height: 40%; border-radius: 8px">
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-7" style="margin-top: 2%">
            <table border="0">
              <tr>
                <td colspan="7" style="padding-left: 12px;">
                  <h4>{{ $daf->nama_lengkap }}</h4>
                </td>
              </tr>
              <tr>
                <td style="padding-left: 12px; width: 30%; padding-bottom: 8px">Jenis Kelamin</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td style="width: 15%;">{{ $daf->jenis_kelamin }}</td>
                <td rowspan="3" style="padding-left: 16px; padding-right: 16px">
                  <div style="width: 0px; height: 80px; border: 0.5px #000 solid;"></div>
                </td>
                <td style="padding-left: 12px; padding-bottom: 8px">Usia</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td>{{ $daf->usia }} tahun</td>
              </tr>
              <tr>
                <td style="padding-left: 12px; padding-bottom: 8px">Tinggi Badan</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td>{{ $daf->tinggi_badan }} cm</td>
                <td style="padding-left: 12px; padding-bottom: 8px">Pekerjaan</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td>{{ $daf->pekerjaan }}</td>
              </tr>
              <tr>
                <td style="padding-left: 12px; padding-bottom: 8px">Berat Badan</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td>{{ $daf->berat_badan }} kg</td>
                <td style="padding-left: 12px; padding-bottom: 8px">Status</td>
                <td style="padding-left: 8px; padding-right: 8px">:</td>
                <td style="width: 50%">{{ $daf->status_pernikahan }}</td>
              </tr>
            </table>
            
            {!! Form::model($daf, ['method' => 'PATCH', 'files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['user.update', $daf->id_user]]) !!}
            {{ method_field('PATCH') }}{{csrf_field()}}
              {{-- {{ Form::submit('Validasi', array('class' => 'button btn btn-md', 'style' => 'width:30%; margin-top: 5%; background-color: #d86162; color: #ffffff', @if($daf->validasi == 2) 'disabled' => 'disabled' @endif)) }} --}}
              <button type="submit" name="validasi" id="validasi" value="validasi" class="button btn btn-md" style="width:30%; margin-top: 5%; background-color: #d86162; color: #ffffff" @if($daf->validasi == 2) disabled="true" @endif>Validasi</button>
            {{-- {!! Form::close() !!} --}}


            {{-- {!! Form::model($daf, ['method' => 'PATCH', 'files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['user.update', $daf->id]]) !!} --}}
              {{-- {{ method_field('PATCH') }}{{csrf_field()}} --}}
                {{-- {{ Form::submit('Belum Tervalidasi', array('class' => 'button btn btn-md', 'style' => 'width:30%; margin-top: 2%; background-color: #9a9ca0; color: #ffffff')) }} --}}
                <button type="submit" name="belum_validasi" id="belum_validasi" value="belum_validasi" class="button btn btn-md" style="width:30%; margin-top: 5%; background-color: #9a9ca0; color: #ffffff" @if($daf->validasi == 1) disabled="true" @endif>Belum Tervalidasi</button>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-body">
        <p>
          <img src="{{ asset('/images/icon_user/Group-404.svg') }}" style="width: 32px; height: auto;"><b> Biodata Diri</b>
        </p>
        <table border="0">
          <tr>
            <td>Alamat Tinggal</td>
            <td style="padding-left: 24px; padding-right: 8px">:</td>
            <td>{{ $daf->alamat_tinggal_saat_ini }}</td>
          </tr>
          <tr>
            <td>Nomor Handphone</td>
            <td style="padding-left: 24px; padding-right: 8px">:</td>
            <td>{{ $daf->handphone }}</td>
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
            <td>Visi Pernikahan</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->visi_pernikahan }}</td>
          </tr>
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
            <td>Penghasilan</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>Rp{{ $daf->penghasilan }}</td>
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
            <td>Nama Ayah</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->nama_ayah }}</td>
          </tr>
          <tr>
            <td>Suku Ayah</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->suku_ayah }}</td>
          </tr>
          <tr>
            <td>Nama Ibu</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->nama_ibu }}</td>
          </tr>
          <tr>
            <td>Suku Ibu</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->suku_ibu }}</td>
          </tr>
          <tr>
            <td>Alamat Orang Tua</td>
            <td style="padding-left: 28px; padding-right: 8px">:</td>
            <td>{{ $daf->alamat_ortu }}</td>
          </tr>
        </table>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection