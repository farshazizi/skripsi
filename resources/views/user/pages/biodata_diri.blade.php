@extends('user/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          @foreach($daf as $daf)
          <div class="col-md-4">
            <table border="0">
              <tr>
                <td class="text-center" style="width: 20%; height: auto;">
                  <img src="/images/foto_diri/{{ $daf->foto_diri }}" class="croping" style="width: auto; height: 40%; border-radius: 8px">
                </td>
              </tr>
              <tr>
                <td class="text text-center" style="padding-top: 12px;">
                  <button type="button" class="btn btn-sm" data-alamat="{{ $daf->alamat_tinggal_saat_ini }}" data-handphone="{{ $daf->handphone }}" data-pendidikan="{{ $daf->pendidikan_terakhir }}" data-ibadahsunnah="{{ $daf->ibadah_sunnah }}" data-pekerjaan="{{ $daf->pekerjaan }}" data-visi="{{ $daf->visi_pernikahan }}" data-toggle="modal" data-target="#edit" data-iduser="{{ $daf->id }}" style="background-color: #d86162; color: #ffffff">
                  Ubah Data
                  </button>
                  {{-- @if($daf->validasi == 1) --}}
                    <!-- Button trigger modal -->
                    @if($daf->validasi == 0 || $daf->validasi == 1)
                    <button type="button" class="btn btn-sm" style="background-color: #d86162; color: #ffffff" data-toggle="modal" data-target="#exampleModalLong">
                      Ubah KTP
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-left" style="float: left;">
                            <center>
                              <img src="{{ asset('/images/ktp/' . $daf->ktp) }}" style="width: 75%; height: 50%">
                            </center>
                              {!! Form::model($daf, ['method' => 'PATCH', 'files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['biodata-diri.update', $daf->id_user]]) !!}
                              {{ method_field('PATCH') }}{{csrf_field()}}
                                {{ Form::label('ktp', 'Upload KTP', array('style' => 'margin-top: 20px')) }}
                                {{ Form::label('', '*', array('style' => 'margin-top: 20px; color: red')) }}<br>
                                {{ Form::file('ktp', null, array('id' => 'ktp', 'class' => 'form-control', 'placeholder' => 'Cantumkan berupa link', 'required' => '')) }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              {{ Form::submit('Simpan', array('class' => 'btn btn-md', 'style' => 'background-color: #d86162; color: white')) }}
                            {{-- {!! Form::close() !!} --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  {{-- @endif --}}
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-7" style="margin-top: 2%">
            <table border="0">
              <tr>
                <td colspan="7" style="padding-left: 12px; width: auto;">
                  <h4>
                    {{ $daf->nama_lengkap }} @if($daf->validasi == 2)<img src="{{ asset('/images/icon_user/circular-check-button.svg') }}" style="width: 16px; height: auto;">@endif @if($daf->validasi == 1)<img src="{{ asset('/images/icon_user/cancel.svg') }}" style="width: 16px; height: auto;">@endif
                  </h4>
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
          </div>
          
        </div>

        <div class="row" style="margin-top: 8px">
          <div class="col-md-3">
            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Biodata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{-- {!! Form::model($daf, ['method' => 'PATCH', 'files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'route'=>['biodata-diri.update', $daf->id_user]]) !!} --}}
                    {{-- {{ method_field('PATCH') }}{{csrf_field()}} --}}
                      <div class="form-group">
                      {{-- <input type="hidden" name="id_user" id="id_user" value="{{ $daf->id_user }}"> --}}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Alamat Tinggal Saat Ini</label>
                        {{ Form::text('alamat_tinggal_saat_ini', $daf->alamat_tinggal_saat_ini, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Tinggal Saat Ini', 'id' => 'alamat_tinggal_saat_ini')) }}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Nomor Handphone</label>
                        {{ Form::number('handphone', $daf->handphone, array('class' => 'form-control', 'required' => '', 'min' => '0', 'placeholder' => 'No. Handphone', 'id' => 'handphone')) }}
                      </div>
                      <div class="form-group">
                        {{ Form::label('pendidikan_terakhir', 'Pendidikan terakhir Anda', array('style' => 'margin-top: 0px')) }}
                        {{ Form::label('#', '*', array('style' => 'margin-top: 0px; color: red')) }}
                        {{ Form::select('pendidikan_terakhir', ['' => 'Pilihan', 'TK' => 'Taman Kanak-kanak (TK)', 'SD' => 'Sekolah Dasar (SD)', 'SMP' => 'Sekolah Menengah Pertama (SMP)/sederajat', 'SMA' => 'Sekolah Menengah Atas (SMA)/sederajat', 'Diploma' => 'Diploma I/II/III/sederajat', 'S1' => 'Strata 1 (S1)', 'S2' => 'Strata 2 (S2)', 'S3' => 'Strata 3 (S3)'], $daf->pendidikan_terakhir, array('class' => 'form-control', 'required' => '', 'id' => 'pendidikan_terakhir')) }}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Ibadah Sunnah</label>
                        {{ Form::textarea('ibadah_sunnah', $daf->ibadah_sunnah, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'id' => 'ibadah_sunnah', 'placeholder' => 'contoh:
  1. Tahajud
  2. Witir
  3. dll')) }}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Pekerjaan</label>
                        {{ Form::text('pekerjaan', $daf->pekerjaan, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Pekerjaan', 'id' => 'pekerjaan')) }}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Visi Pernikahan</label>
                        {{ Form::text('visi_pernikahan', $daf->visi_pernikahan, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apa visi pernikahan Anda', 'id' => 'visi_pernikahan')) }}
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      {{ Form::submit('Ubah Data', array('class' => 'btn', 'style' => 'background-color: #d86162; color: #ffffff')) }}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
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

<script src="{{ asset('/js/app.js') }}"></script>
<script type="text/javascript">
  $('#edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    // var iduser = button.data('iduser')
    var alamat = button.data('alamat')
    var handphone = button.data('handphone')
    var pendidikan = button.data('pendidikan')
    var ibadahsunnah = button.data('ibadahsunnah')
    var pekerjaan = button.data('pekerjaan')
    var visi = button.data('visi')
    var ktp = button.data('ktp')

    var modal = $(this)
    // modal.find('.modal-body #id_user').val(iduser)
    modal.find('.modal-body #alamat_tinggal_saat_ini').val(alamat);
    modal.find('.modal-body #handphone').val(handphone);
    modal.find('.modal-body #pendidikan_terakhir').val(pendidikan);
    modal.find('.modal-body #ibadah_sunnah').val(ibadahsunnah);
    modal.find('.modal-body #pekerjaan').val(pekerjaan);
    modal.find('.modal-body #visi_pernikahan').val(visi);
    modal.find('.modal-body #ktp').val(ktp);
  });
</script>

@endsection