@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row" style="margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			@foreach($errors->all() as $error)
				{{ $error }}<br>
			@endforeach
			{!! Form::open(['route' => 'registration.store']) !!}

				{{ Form::hidden('id_user') }}

				{{ Form::hidden('posisi') }}

			    {{ Form::label('nama_lengkap', 'Nama Lengkap', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('nama_lengkap', $value = Auth::user()->name, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Nama lengkap', 'disabled' => 'disabled')) }}

			    {{ Form::label('tanggal_lahir', 'Tanggal Lahir', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::date('tanggal_lahir', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('jenis_kelamin', 'Jenis Kelamin', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    <br>
				{{-- <input type="radio" name="jenis_kelamin" value="other"> Other
			    <input type="radio" name="jenis_kelamin" value="male"> Male<br>
				<input type="radio" name="jenis_kelamin" value="female"> Female<br> --}}

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
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::number('handphone', null, array('class' => 'form-control', 'required' => '', 'min' => '0', 'placeholder' => 'No. Handphone')) }}

			    {{ Form::label('alamat_tempat_tinggal', 'Alamat Tempat Tinggal', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('alamat_tempat_tinggal', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Tempat Tinggal')) }}

			    {{ Form::label('pekerjaan', 'Pekerjaan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('pekerjaan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Pekerjaan')) }}

			    {{-- {{ Form::label('suku', 'Suku', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('suku', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Suku')) }} --}}

			    {{ Form::label('status_pernikahan', 'Status Pernikahan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
				{{ Form::select('status_pernikahan', ['' => 'Status Pernikahan', 'Sudah pernah menikah, tidak memiliki anak' => 'Sudah pernah menikah, tidak memiliki anak', 'Sudah pernah menikah dan memiliki anak' => 'Sudah pernah menikah dan memiliki anak', 'Belum pernah menikah' => 'Belum pernah menikah'], null, array('class' => 'form-control', 'required' => '', 'id' => 'status_pernikahan')) }}
				{{-- <select id="status_pernikahan" class="form-control">
					<option value="">Status Pernikahan</option>
					<option id="Sudah pernah menikah, tidak memiliki anak" value="Sudah pernah menikah, tidak memiliki anak">Sudah pernah menikah, tidak memiliki anak</option>
					<option id="Sudah pernah menikah dan memiliki anak" value="Sudah pernah menikah dan memiliki anak">Sudah pernah menikah dan memiliki anak</option>
					<option id="Belum pernah menikah" value="Belum pernah menikah">Belum pernah menikah</option>
				</select> --}}

				<label id="l_jumlahAnak" style="margin-top: 20px" hidden>Jumlah anak</label>
				<label id="l_wajibIsi" style="margin-top: 20px; color: red" hidden>*</label>
				<input id="i_jumlahAnak" type="number" name="i_jumlahAnak" hidden="" class="form-control" placeholder="Jumlah anak">
				{{-- {{ Form::label('l_jumlahAnak', 'Jumlah anak', array('style' => 'margin-top: 20px')) }}
				{{ Form::number('i_jumlahAnak', null, array('class' => 'form-control', 'placeholder' => 'Jumlah Anak', 'type' => 'hidden')) }} --}}

			    {{ Form::label('penghasilan', 'Berapa Penghasilan Anda Perbulan Saat Ini (perbulan)', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::select('penghasilan', ['' => 'Penghasilan Perbulan', '<4000000' => '< Rp4.000.000', '4000000-6000000' => 'Rp4.000.000 - Rp6.000.000', '>6000000' => '> Rp6.000.000'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('izin_menikah', 'Izin Menikah/Restu Menikah', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    <br>

			    {{ Form::radio('izin_menikah', 'Sudah diizinkan', false, array('required' => '')) }}
			    {{ Form::label('izin_menikah', 'Sudah diizinkan') }}
			    <br>

				{{ Form::radio('izin_menikah', 'Belum diizinkan') }}
				{{ Form::label('izin_menikah', 'Belum diizinkan') }}
				<br>

			    {{ Form::label('alamat_tinggal_saat_ini', 'Alamat Tinggal Saat Ini', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('alamat_tinggal_saat_ini', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Tinggal Saat Ini')) }}

			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
<script src="{{ asset('js/status.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	$('#i_jumlahAnak').hide();
	  $('#status_pernikahan').on('change', function() {
	    if ($(this).val() == "") {
        	$('#l_jumlahAnak').hide();
        	$('#l_wajibIsi').hide();
        	$('#i_jumlahAnak').hide();
	    } else if ($(this).val() == "Sudah pernah menikah, tidak memiliki anak") {
        	$('#l_jumlahAnak').hide();
        	$('#l_wajibIsi').hide();
        	$('#i_jumlahAnak').hide();
	    } else if ($(this).val() == "Sudah pernah menikah dan memiliki anak") {
        	$('#l_jumlahAnak').show();
        	$('#l_wajibIsi').show();
        	$('#i_jumlahAnak').show();
	    } else if ($(this).val() == "Belum pernah menikah") {
        	$('#l_jumlahAnak').hide();
        	$('#l_wajibIsi').hide();
        	$('#i_jumlahAnak').hide();
	    }
	  });
	});
</script>
@endsection
