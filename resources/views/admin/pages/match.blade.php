@extends('admin/home')
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
	            {{-- <th>Suku</th> --}}
	            <th>Status Pernikahan</th>
	            <th>Domisili</th>
	            <th>Status</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php $i = 1; ?>
				@foreach($daf as $daf)
					<tr>
						<td>{{ $i++ }}</td>
						<td>
							@if($daf->status == 1 && $daf->validasi == 2 || $daf->status == 5 && $daf->validasi == 2)
							<a href="/admin/match/{{ $daf->nama_lengkap }}">{{ $daf->nama_lengkap }}</a>
							@endif
							@if($daf->status == 2 || $daf->status == 3 || $daf->status == 4)
							{{ $daf->nama_lengkap }}
							@endif
							@if($daf->status == 1 && $daf->validasi == 0 || $daf->status == 5 && $daf->validasi == 0)
							{{ $daf->nama_lengkap }}
							@endif
						</td>
						<td>
							<?php
                        		// Tanggal Lahir
								$birthday = $daf->tanggal_lahir;
								
								// Convert Ke Date Time
								$biday = new DateTime($birthday);
								$today = new DateTime();
								
								$diff = $today->diff($biday);
								
								// Display
								//echo "Tanggal Lahir: ". date('d M Y', strtotime($birthday)) .'<br />';
								echo $diff->y ." tahun";
                        	?>
						</td>
						<td>{{ $daf->jenis_kelamin }}</td>
						{{-- <td>{{ $daf->suku }}</td> --}}
						<td>{{ $daf->status_pernikahan }}</td>
						<td>{{ $daf->alamat_tinggal_saat_ini }}</td>
						<td style="text-align: center;">
							@if($daf->status == 1 || $daf->status == 5)
							<button type="button" class="btn btn-sm btn-danger" disabled>Belum Berpasangan</button>
							@endif
							@if($daf->status == 2 || $daf->status == 3)
							<button type="button" class="btn btn-sm btn-warning" style="color: #000000" disabled>Sedang Bertukar Form</button>
							@endif
							@if($daf->status == 4)
							<button type="button" class="btn btn-sm btn-success" style="color: #ffffff" disabled>Sedang Bertaarufan</button>
							@endif
						</td>
						{{-- <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td> --}}
						{{-- <td>{{ $post->created_at }}</td> --}}
						{{-- <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td> --}}
						{{-- <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td> --}}
					</tr>
				@endforeach
	        </tbody>
	      </table>
	    </div>
	  </div>
	  {{-- <div class="card-footer small text-muted">
	    //
	  </div> --}}
	</div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

@endsection