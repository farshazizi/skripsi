@extends('user/home')
@section('content')

{{-- <div class="content-wrapper py-3">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="content-wrapper py-3">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
          <i class="fa fa-table"></i>
          Riwayat pasangan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal</th>
                <th>Alasan</th>
                {{-- <th>Keterangan</th> --}}
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($log as $log)
                <tr>
                  <td>{{ $i++ }}</td>
                  @if($log->jenis_kelamin == "Laki-laki")
                  <td>Ukhti</td>
                  @endif
                  @if($log->jenis_kelamin == "Perempuan")
                  <td>Akhi</td>
                  @endif
                  <td>{{ $log->created_at }}</td>
                  <td>{{ $log->alasan }}</td>
                  {{-- @if($log->id_penolak == Auth::user()->id)
                  <td>-</td>
                  @endif
                  @if($log->id_menolak == Auth::user()->id)
                  <td>Ditolak</td>
                  @endif --}}
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection