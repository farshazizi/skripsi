@extends('user/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <table border="0">
            @foreach($daf as $daf)
            <tr>
              <td style="width: 20%" class="text-center">
                <img src="/images/foto_diri/{{ $daf->foto_diri }}" class="rounded-circle" style="width: 75%; height: auto;">
              </td>
              <td style="width: 40%">
                <table style="width: 100%">
                  <tr>
                    <td style="padding-left: 16px"><h4>{{ $daf->nama_lengkap }}</h3></td>
                  </tr>
                  <tr>
                    <td style="padding-left: 16px">Siap bertaaruf dengan kamu</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 16px; padding-top: 16px; width: 50%">
                      <button type="button" class="btn btn-primary" style="margin-right: 8px; width: 30%">Terima</button>
                      <!-- Button trigger modal 1 -->
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" style="width: 30%">
                        Tolak
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <center><img src="/images/icon_user/broken-heart.svg" class="rounded-circle" style="width: 12%; height: auto; margin-top: 8px; margin-bottom: 8px"></center>
                              <center><h4 style="margin-top: 16px; margin-bottom: 16px">Apakah kamu yakin?</h4></center>
                              <p style="margin-top: 8px; margin-bottom: 8px"><center>Sudah pastikah hatimu untuk menolak calon pasangan ini</center></p>
                              <center>
                              <!-- Button trigger modal 2 -->
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#alasan" style="margin-left: 8px; margin-right: 8px; width: 25%">Iya</button>
                              <!-- Modal -->
                              <div class="modal fade" id="alasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-left: 8px; margin-right: 8px; width: 25%">Tidak</button>
                              </center>
                            </div>
                            {{-- <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div> --}}
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
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection