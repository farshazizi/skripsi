@extends('admin/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">
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
	            <th>Status</th>
	            {{-- <th>Email</th> --}}
	            {{-- <th>Domisili</th> --}}
	            {{-- <th>No. Handphone</th> --}}
	            <th>KTP</th>
	            <th>Akte Cerai</th>
	            <th>Validasi</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php $i = 1; ?>
				@foreach($daf as $daf)
					<tr>
						<td>{{ $i++ }}</td>
						{{-- <td>{{ $daf->nama_lengkap }}</td> --}}
						<td>
							<a href="/admin/user/{{ $daf->nama_lengkap }}">{{ $daf->nama_lengkap }}</a>
						</td>
						<td>{{ $daf->usia }} tahun</td>
						<td>{{ $daf->jenis_kelamin }}</td>
						<td>{{ $daf->status_pernikahan }}</td>
						{{-- <td>{{ $daf->alamat_email }}</td> --}}
						{{-- <td>{{ $daf->alamat_tinggal_saat_ini }}</td> --}}
						{{-- <td>{{ $daf->handphone }}</td> --}}
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ktp<?php echo $i; ?>">KTP</button>
                            <div class="modal fade" id="ktp<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Berkas Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('/images/ktp/' . $daf->ktp) }}" style="width: 75%; height: 50%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</td>
						<td>
							@if($daf->akte_cerai != "Tidak ada")
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aktecerai<?php echo $i; ?>">Akte Cerai</button>
                            <div class="modal fade" id="aktecerai<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Berkas Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('/images/akte_cerai/' . $daf->akte_cerai) }}" style="width: 75%; height: 50%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($daf->akte_cerai == "Tidak ada")
                            Tidak Ada
                            {{-- <button type="button" class="btn btn-primary">Tidak Ada</button> --}}
                            @endif()
						</td>
						<td style="width: 10%">
							<center>
								@if($daf->validasi == 0)
								<img src="{{ asset('/images/icon_user/minus.svg') }}" style="width: 20px; height: auto;">
								@endif
								@if($daf->validasi == 1)
								<img src="{{ asset('/images/icon_user/cancel.svg') }}" style="width: 20px; height: auto;">
								@endif
								@if($daf->validasi == 2)
								<img src="{{ asset('/images/icon_user/checklist.svg') }}" style="width: 20px; height: auto;">
								@endif
							</center>
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
	    Updated yesterday at 11:59 PM
	  </div> --}}
	</div>
  </div>
</div>

@endsection