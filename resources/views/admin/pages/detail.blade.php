@extends('admin/home')
@section('content')

<div class="content-wrapper py-3">
	<div class="container-fluid">
		<!-- Example Tables Card -->
		<div class="card mb-3">
			<div class="card-header">
			    <i class="fa fa-table"></i>
			    Detail {{ $daf->nama_lengkap }}
				{{-- <a href="/admin/match">Match</a> / {{ $daf->nama_lengkap}} --}}
			</div>
			<div class="card-body">
			    <div class="table-responsive">
			    	<div class="row">
			    		<div class="col text-center">			    		
							<img src="{{ asset('/images/partners/fitrah2.jpg') }}" alt="Responsive image" class="rounded-circle" style="width: 70%; height: auto">
			    		</div>
			    		<div class="col-8">
			    			<table>
			                    <thead>
			                    	<tr>
			                            <td><b>Id user</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->id }}</td>
			                            <td></td>
			                        </tr>
			                        <tr>
			                            <td><b>Nama Lengkap</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->nama_lengkap }}</td>
			                            <td></td>
			                        </tr>
			                        <tr>
			                            <td><b>Usia</b></td>
			                            <td></td>
			                            <td>:</td>
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
												echo $diff->y ;?> <b>tahun</b>
				                        	
				                        	{{-- {{ $daf->tanggal_lahir }} <b>tahun</b> --}}
				                        </td>
			                            <td></td>
			                        </tr>
			                        <tr>
			                            <td><b>Status pernikahan</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->status_pernikahan }}</td>
			                            <td></td>
			                        </tr>
			                        <tr>
			                            <td><b>Alamat tempat tinggal saat ini</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->alamat_tinggal_saat_ini }}</td>
			                            <td></td>
			                        </tr>
			                         <tr>
			                            <td><b>No. Handphone</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->handphone }}</td>
			                            <td></td>
			                        </tr>
			                    </thead>
			                </table>
			    		</div>
			    	</div> {{-- div tutup row --}}
			    	<div class="row">
			    		<div class="col">
			    		</div>
			    		<div class="col-8">
			    			<!-- Button Modal -->
							<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#ViewMore">
							View More
							</button>
							<!-- Modal -->
							<div class="modal fade" id="ViewMore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">More Details</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<table>
							      		<tr>
							      			<td><b>Nama lengkap</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->nama_lengkap }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Tinggi badan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->tinggi_badan }} <b>cm</b></td>
							      		</tr>
							      		<tr>
							      			<td><b>Berat badan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->berat_badan }} <b>cm</b></td>
							      		</tr>
							      		<tr>
							      			<td><b>Riwayat Kesehatan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->riwayat_kesehatan }}</td>
							      		</tr>
							      	</table>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
							      </div>
							    </div>
							  </div>
							</div>
							<!-- Close Modal -->
			    		</div>
			    	</div>
			    	<div class="row" style="margin-top: 2%">
			    		<div class="col-4">
			    			<div class="card" style="width: 20rem;">
								<img class="card-img-top" src="{{ asset('images/menikah.png') }}" alt="Card image cap" style="width:100%; height:auto;">
								<div class="card-body">
									<table>
										<tr>
											<td><b>Id user</b></td>
											<td>:</td>
											<td>{{ $daf->id_user }}</td>
										</tr>
										<tr>
											<td><b>Nama Lengkap</b></td>
											<td>:</td>
											<td>{{ $daf->nama_lengkap }}</td>
										</tr>
										<tr>
											<td><b>Usia</b></td>
				                            <td>:</td>
				                            <td>{{ $daf->tanggal_lahir }} tahun</td>
										</tr>
										<tr>
				                            <td><b>Domisili</b></td>
				                            <td>:</td>
				                            <td>{{ $daf->alamat_tinggal_saat_ini }}</td>
				                            <td></td>
				                        </tr>
				                        <tr>
					                        <td><b>No. Handphone</b></td>
					                        <td>:</td>
					                        <td>{{ $daf->handphone }}</td>
					                        <td></td>
				                        </tr>
									</table>
									<!-- Button Modal -->
									<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#Matcher1" style="margin-top: 5%;">
									View More
									</button>
									<!-- Modal -->
									<div class="modal fade" id="Matcher1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Close Modal -->
								</div>
							</div>	
			    		</div>
			    		<div class="col-4">
			    			<div class="card" style="width: 20rem;">
								<img class="card-img-top" src="{{ asset('images/menikah.png') }}" alt="Card image cap" style="width:100%; height:auto;">
								<div class="card-body">
									<table>
										<tr>
											<td><b>Id user</b></td>
											<td>:</td>
											<td>{{ $daf->id_user }}</td>
										</tr>
										<tr>
											<td><b>Nama Lengkap</b></td>
											<td>:</td>
											<td>{{ $daf->nama_lengkap }}</td>
										</tr>
										<tr>
											<td><b>Usia</b></td>
				                            <td>:</td>
				                            <td>{{ $daf->tanggal_lahir }} tahun</td>
										</tr>
										<tr>
			                            <td><b>Domisili</b></td>
			                            <td>:</td>
			                            <td>{{ $daf->alamat_tinggal_saat_ini }}</td>
			                            <td></td>
			                        </tr>
			                         <tr>
			                            <td><b>No. Handphone</b></td>
			                            <td>:</td>
			                            <td>{{ $daf->handphone }}</td>
			                            <td></td>
			                        </tr>
									</table>
									<!-- Button Modal -->
									<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#Matcher2" style="margin-top: 5%;">
									View More
									</button>
									<!-- Modal -->
									<div class="modal fade" id="Matcher2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Close Modal -->
								</div>
							</div>	
			    		</div>
			    		<div class="col-4">
			    			<div class="card" style="width: 20rem;">
								<img class="card-img-top" src="{{ asset('images/menikah.png') }}" alt="Card image cap" style="width:100%; height:auto;">
								<div class="card-body">
									<table>
										<tr>
											<td><b>Id user</b></td>
											<td>:</td>
											<td>{{ $daf->id_user }}</td>
										</tr>
										<tr>
											<td><b>Nama Lengkap</b></td>
											<td>:</td>
											<td>{{ $daf->nama_lengkap }}</td>
										</tr>
										<tr>
											<td><b>Usia</b></td>
				                            <td>:</td>
				                            <td>{{ $daf->tanggal_lahir }} tahun</td>
										</tr>
										<tr>
			                            <td><b>Domisili</b></td>
			                            <td>:</td>
			                            <td>{{ $daf->alamat_tinggal_saat_ini }}</td>
			                            <td></td>
			                        </tr>
			                         <tr>
			                            <td><b>No. Handphone</b></td>
			                            <td>:</td>
			                            <td>{{ $daf->handphone }}</td>
			                            <td></td>
			                        </tr>
									</table>
									<!-- Button Modal -->
									<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#Matcher3" style="margin-top: 5%;">
									View More
									</button>
									<!-- Modal -->
									<div class="modal fade" id="Matcher3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Close Modal -->
								</div>
			    		</div>
			    	</div>
			    	{{-- <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
				        <thead>
				        	<tr></tr>
				        </thead>
				        <tbody>
							<tr></tr>
				        </tbody>
			    	</table> --}}
			    </div>
			</div>
			<div class="card-footer small text-muted">
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

@endsection