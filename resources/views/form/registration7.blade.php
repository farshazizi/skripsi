@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration7.store']) !!}

				{{ Form::hidden('id_user') }}

				{{ Form::label('umur_calon_pasangan', 'Kategori umur pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('umur_calon_pasangan', ['' => 'Pilihan', 'Remaja' => 'Remaja (<= 27 tahun)', 'Dewasa' => 'Dewasa (24 - 32 tahun)', 'Tua' => 'Tua (>= 29 tahun)'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randUmur') }}

				{{ Form::label('tb_calon_pasangan', 'Kategori tinggi badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('tb_calon_pasangan', ['' => 'Pilihan', 'Pendek' => 'Pendek (<= 167 cm)', 'Sedang' => 'Sedang (161 cm - 174 cm)', 'Tinggi' => 'Tinggi (>= 169 cm)'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randTb') }}

				{{ Form::label('merokok_calon_pasangan', 'Apakah Anda menerima calon pasangan yang merokok', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('merokok_calon_pasangan', ['' => 'Pilihan', 'Iya, tidak masalah' => 'Iya, tidak masalah', 'Iya, asalkan berniat untuk berhenti' => 'Iya, asalkan berniat untuk berhenti', 'Tidak, saya tidak suka perokok' => 'Tidak, saya tidak suka perokok'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::label('penghasilan_calon_pasangan', 'Rata-rata penghasilan calon pasangan Anda (perbulan)', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('penghasilan_calon_pasangan', ['' => 'Pilihan', 'Rendah' => '< Rp8.000.000', 'Sedang' => 'Rp3.500.000 - Rp12.000.000', 'Tinggi' => '> Rp8.000.000'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randPenghasilan') }}

				{{ Form::label('suku_calon_pasangan', 'Apakah suku calon pasangan Anda penting untuk Anda?', array('style' => 'margin-top: 20px')) }}
			    <br>
			    {{ Form::radio('suku_calon_pasangan', 'Iya', false, array('required' => '')) }}
			    {{ Form::label('suku_calon_pasangan', 'Iya') }}
			    <br>
				{{ Form::radio('suku_calon_pasangan', 'Tidak') }}
				{{ Form::label('suku_calon_pasangan', 'Tidak') }}
				<br>

				{{ Form::label('bb_calon_pasangan', 'Kategori berat badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('bb_calon_pasangan', ['' => 'Pilihan', 'Kurus' => 'Kurus (<= 64 kg)', 'Berisi' => 'Berisi (51 kg - 74 kg)', 'Gemuk' => 'Gemuk (>= 66 kg)'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randBb') }}

				{{-- status pasangan --}}
				<label id="l_status_calon_pasangan" style="margin-top: 20px">Status pasangan Anda</label>
				{{-- jenis kelamin laki-laki --}}
				{{-- {{$jekel->jenis_kelamin}} --}}
				@if($jekel->jenis_kelamin == "Laki-laki")
			    {{ Form::select('status_calon_pasangan', ['' => 'Status calon pasangan', 'Janda belum memiliki anak' => 'Janda belum memiliki anak', 'Janda sudah memiliki anak' => 'Janda sudah memiliki anak', 'Belum pernah menikah' => 'Belum pernah menikah'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{-- <select id="status_calon_pasangan"  class="form-control">
					<option value="">Status calon pasangan</option>
					<option id="Janda belum memiliki anak" name="Janda belum memiliki anak" value="Janda belum memiliki anak">Janda belum memiliki anak</option>
					<option id="Janda sudah memiliki anak" name="Janda sudah memiliki anak" value="Janda sudah memiliki anak">Janda sudah memiliki anak</option>
					<option id="Belum pernah menikah" name="Belum pernah menikah" value="Belum pernah menikah">Belum pernah menikah</option> --}}
				{{-- </select> --}}
				
				@elseif($jekel->jenis_kelamin == "Perempuan")
				{{-- jenis kelamin perempuan --}}
			    {{ Form::select('status_calon_pasangan', ['' => 'Status calon pasangan', 'Duda belum memiliki anak' => 'Duda belum memiliki anak', 'Duda sudah memiliki anak' => 'Duda sudah memiliki anak', 'Belum pernah menikah' => 'Belum pernah menikah'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{-- <select id="status_calon_pasangan" class="form-control">
					<option value="">Status calon pasangan</option>
					<option id="Duda belum memiliki anak" name="Duda belum memiliki anak" value="Duda belum memiliki anak">Duda belum memiliki anak</option>
					<option id="Duda sudah memiliki anak" name="Duda sudah memiliki anak" value="Duda sudah memiliki anak">Duda sudah memiliki anak</option>
					<option id="Belum pernah menikah" name="Belum pernah menikah" value="Belum pernah menikah">Belum pernah menikah</option>
				</select> --}}
				@endif

			    {{ Form::label('karakter_pasangan', 'Ceritakan karakter pasangan seperti apa yang Anda inginkan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('karakter_pasangan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%', 'placeholder' => 'Ceritakan karakter pasangan seperti apa yang Anda inginkan')) }}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection
{{-- @include('partials/_javascript') --}}