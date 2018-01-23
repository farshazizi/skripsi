@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row" style="margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			@foreach($errors->all() as $error)
				{{ $error }}<br>
			@endforeach
			{!! Form::open(['route' => 'registration.store']) !!}

				{{ Form::hidden('id_akun') }}

				{{ Form::hidden('posisi') }}

			    {{ Form::label('nama_lengkap', 'Nama Lengkap', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('nama_lengkap', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Nama lengkap')) }}

			    {{ Form::label('tanggal_lahir', 'Tanggal Lahir', array('style' => 'margin-top: 20px')) }}
			    {{ Form::date('tanggal_lahir', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('jenis_kelamin', 'Jenis Kelamin', array('style' => 'margin-top: 20px')) }}
			    <br>
			    {{-- {{ Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'], null, array('class' => 'form-control', 'required' => '')) }} --}}
			    {{-- {{ Form:radio('jenis_kelamin', 'laki-laki') }} --}}
			    {{ Form::radio('jenis_kelamin', 'Laki-laki', false, array('required' => '')) }}
			    {{ Form::label('jenis_kelamin', 'Laki-laki') }}
			    <br>

				{{ Form::radio('jenis_kelamin', 'Perempuan') }}
				{{ Form::label('jenis_kelamin', 'Perempuan') }}
				<br>

				{{-- {{ Auth::user()->alamat_email }} --}}
				{{-- <label style="margin-top: 20px">Alamat Email</label><br>
				<input type="alamat_email" class="form-control" name="alamat_email" placeholder="Alamat Email" style="width: 100%" value="{{ Auth::user()->email }}" disabled="disabled"> --}}
			    {{ Form::label('alamat_email', 'Alamat Email', array('style' => 'margin-top: 20px')) }}
			    {{ Form::email('alamat_email', $value = Auth::user()->email, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Email', 'disabled' => 'disabled')) }}

			    {{ Form::label('handphone', 'No. Handphone', array('style' => 'margin-top: 20px')) }}
			    {{ Form::number('handphone', null, array('class' => 'form-control', 'required' => '', 'min' => '0', 'placeholder' => 'No. Handphone')) }}

			    {{ Form::label('alamat_tempat_tinggal', 'Alamat Tempat Tinggal', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('alamat_tempat_tinggal', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Tempat Tinggal')) }}

			    {{ Form::label('pekerjaan', 'Pekerjaan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('pekerjaan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Pekerjaan')) }}

			    {{ Form::label('suku', 'Suku', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('suku', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Suku')) }}

			    {{ Form::label('status_pernikahan', 'Status Pernikahan', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('status_pernikahan', ['' => 'Status Pernikahan', 'Sudah pernah menikah, tidak memiliki anak' => 'Sudah pernah menikah, tidak memiliki anak', 'Sudah pernah menikah dan memiliki anak' => 'Sudah pernah menikah dan memiliki anak', 'Belum pernah menikah' => 'Belum pernah menikah'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('penghasilan', 'Berapa Penghasilan Anda Perbulan Saat Ini', array('style' => 'margin-top: 20px')) }}
			    {{ Form::select('penghasilan', ['' => 'Penghasilan Perbulan', '500000 - 3500000' => 'Rp500.000 - Rp3.500.000', '3500000 - 4000000' => 'Rp3.500.000 - Rp4.000.000', '4000000 - 6000000' => 'Rp4.000.000 - Rp6.000.000', '6000000 - 8000000' => 'Rp6.000.000 - Rp8.000.000', '8000000 - 12000000' => 'Rp8.000.000 - Rp12.000.000'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('izin_menikah', 'Izin Menikah/Restu Menikah', array('style' => 'margin-top: 20px')) }}
			    <br>

			    {{ Form::radio('izin_menikah', 'Sudah diizinkan', false, array('required' => '')) }}
			    {{ Form::label('izin_menikah', 'Sudah diizinkan') }}
			    <br>

				{{ Form::radio('izin_menikah', 'Belum diizinkan') }}
				{{ Form::label('izin_menikah', 'Belum diizinkan') }}
				<br>

			    {{ Form::label('alamat_tinggal_saat_ini', 'Alamat Tinggal Saat Ini', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('alamat_tinggal_saat_ini', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Tinggal Saat Ini')) }}

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
