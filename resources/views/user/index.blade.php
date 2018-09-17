@extends('user/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">
    <!-- Example Tables Card -->
  <div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Data Pendaftar qtaaruf
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Usia</th>
              <th>Jenis Kelamin</th>
              <th>Email</th>
              <th>Domisili</th>
              <th>No. Handphone</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">
      Updated yesterday at 11:59 PM
    </div>
  </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

@endsection