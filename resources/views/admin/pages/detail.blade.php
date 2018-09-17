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
			<ol class="breadcrumb">
				{{-- <li class="breadcrumb-item">
					<a href="/admin/match">Match</a>
				</li>
				<li class="breadcrumb-item active">Detail {{ $daf->nama_lengkap }}</li> --}}
				<a href="/admin/match">
		        	<i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
		        </a>
			</ol>

			{{-- div pencari --}}
			<div class="card-body">
			    <div class="table-responsive">
			    	<div class="row">
			    		<div class="col text-center">			    		
							<img src="/images/foto_diri/{{ $daf->foto_diri }}" style="width: 70%; height: auto; border-radius: 8px">
			    		</div>
			    		<div class="col-8">
			    			<table>
			                    <thead>
			                    	<tr>
			                            <td><b>Id user</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->id_user }}</td>
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
						      			<td><b>Tinggi badan</b></td>
						      			<td></td>
						      			<td>:</td>
						      			<td>{{ $daf->tinggi_badan }} <b>cm</b></td>
						      			<td></td>
						      		</tr>
						      		<tr>
						      			<td><b>Berat badan</b></td>
						      			<td></td>
						      			<td>:</td>
						      			<td>{{ $daf->berat_badan }} <b>cm</b></td>
						      			<td></td>
						      		</tr>
			                        <tr>
			                            <td><b>Penghasilan</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>Rp{{ $daf->penghasilan }}</td>
			                            <td></td>
			                        </tr>
			                        <tr>
			                            <td><b>Status pernikahan</b></td>
			                            <td></td>
			                            <td>:</td>
			                            <td>{{ $daf->status_pernikahan }}</td>
			                            <td></td>
			                        </tr>			                        
			                    </thead>
			                </table>
			    		</div>
			    	</div>

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
							      			<td><b>Visi Pernikahan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->visi_pernikahan }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Suku Ayah</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->suku_ayah }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Suku Ibu</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->suku_ibu }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Riwayat Kesehatan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->riwayat_kesehatan }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Pekerjaan</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->pekerjaan }}</td>
							      		</tr>
							      		<tr>
							      			<td><b>Pendidikan Terakhir</b></td>
							      			<td>:</td>
							      			<td>{{ $daf->pendidikan_terakhir }}</td>
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
			    	{{-- div tutup pencari --}}

			    	{{-- kirim email --}}
			    	{{-- <button>Haiii</button> --}}
			    	{{-- <form class="form-horizontal" method="POST" action="{{ route('match.postEmail') }}">
					    {{ csrf_field() }}
					    @foreach()
					    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

					        <div class="col-md-6">
					            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

					            @if ($errors->has('email'))
					                <span class="help-block">
					                    <strong>{{ $errors->first('email') }}</strong>
					                </span>
					            @endif
					        </div>
					    </div>

					    <div class="form-group">
					        <div class="col-md-6 col-md-offset-4">
					            <button type="submit" class="btn btn-primary">
					                Taarufkan
					            </button>
					        </div>
					    </div>
					</form> --}}
			    	{{-- tutup kirim email --}}

			    	<div class="row" style="margin-top: 2%">
			    	@if(count($name) > 0)
			    	<?php $i=1; ?>
			    	@foreach($name as $data)
			    		<div class="col-4">
			    			<div class="card" style="width: 20rem;">
								<div style="text-align: center;">
								<img src="/images/foto_diri/{{ $data->foto_diri }}" alt="Card image cap" style="width:80%; height:auto; margin: 8px; border-radius: 8px">
								</div>
								<div class="card-body">
									<table>
										<tr>
											<td><b>Id user</b></td>
											<td>:</td>
											<td>{{ $data->id_user }}</td>
											<td></td>
										</tr>
										<tr>
											<td><b>Nama Lengkap</b></td>
											<td>:</td>
											<td>{{ $data->nama_lengkap }}</td>
											<td></td>
										</tr>
										<tr>
											<td><b>Usia</b></td>
				                            <td>:</td>
											<td>
												<?php
				                        		// Tanggal Lahir
												$birthday = $data->tanggal_lahir;
												
												// Convert Ke Date Time
												$biday = new DateTime($birthday);
												$today = new DateTime();
												
												$diff = $today->diff($biday);
												
												// Display
												//echo "Tanggal Lahir: ". date('d M Y', strtotime($birthday)) .'<br />';
												echo $diff->y ;?> <b>tahun</b>
											</td>
				                            {{-- <td>{{ $data->usia }} tahun</today> --}}
										</tr>
										<tr>
							      			<td><b>Tinggi badan</b></td>
							      			<td>:</td>
							      			<td>{{ $data->tinggi_badan }} <b>cm</b></td>
							      			<td></td>
							      		</tr>
							      		<tr>
							      			<td><b>Berat badan</b></td>
							      			<td>:</td>
							      			<td>{{ $data->berat_badan }} <b>kg</b></td>
							      			<td></td>
							      		</tr>
				                        <tr>
					                        <td><b>Penghasilan</b></td>
					                        <td>:</td>
					                        <td>Rp{{ $data->penghasilan }}</td>
					                        <td></td>
				                        </tr>
				                        <tr>
					                        <td><b>No. Hp</b></td>
					                        <td>:</td>
					                        <td>{{ $data->handphone }}</td>
					                        <td></td>
				                        </tr>
				                        <tr>
					                        <td><b>Tingkat kecocokan</b></td>
					                        <td>:</td>
					                        <td>{{ $data->nilai }}%</td>
					                        <td></td>
				                        </tr>
									</table>

									<!-- Button Modal -->
									<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#Matcher1{{ $data->id_user }}" style="margin-top: 5%;">
										View More
									</button>

									<form method="POST" action="{{ route('match.postEmail') }}">
										{{ csrf_field() }}
										<input hidden="" name="id_penerima" value="{{$data->id_user}}">
										<input hidden="" name="id_pengirim" value="{{$daf->id_user}}">
										<input hidden="" name="jenis_kelamin" value="{{$data->jenis_kelamin}}">
							            <button type="submit" class="btn btn-primary btn-md btn-block" style="margin-top: 5%">
							                Taarufkan
							            </button>
									</form>
									
									<!-- Modal -->
									<div class="modal fade" id="Matcher1{{ $data->id_user }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<table>
									      		<tr>
									      			<td><b>Visi Pernikahan</b></td>
									      			<td>:</td>
									      			<td>{{ $data->visi_pernikahan }}</td>
									      		</tr>
									      		<tr>
									      			<td><b>Suku Ayah</b></td>
									      			<td>:</td>
									      			<td>{{ $data->suku_ayah }}</td>
									      		</tr>
									      		<tr>
									      			<td><b>Suku Ibu</b></td>
									      			<td>:</td>
									      			<td>{{ $data->suku_ibu }}</td>
									      		</tr>
									      		<tr>
									      			<td><b>Riwayat Kesehatan</b></td>
									      			<td>:</td>
									      			<td>{{ $data->riwayat_kesehatan }}</td>
									      		</tr>
									      		<tr>
									      			<td><b>Pekerjaan</b></td>
									      			<td>:</td>
									      			<td>{{ $data->pekerjaan }}</td>
									      		</tr>
									      		<tr>
									      			<td><b>Pendidikan Terakhir</b></td>
									      			<td>:</td>
									      			<td>{{ $data->pendidikan_terakhir }}</td>
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
			    		</div>
		    		@endforeach
		    		@else
		    		<div class="col-12">
		    			<center><p>TIDAK ADA YANG COCOK</p></center>
		    		</div>
		    		@endif
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
			<div class="card-footer small text-muted">
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

@endsection