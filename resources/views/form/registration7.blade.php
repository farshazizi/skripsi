@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration7.store']) !!}

				{{ Form::hidden('id_user') }}

				{{ Form::label('umur_calon_pasangan', 'Kategori umur pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('umur_calon_pasangan', ['' => 'Pilihan', 'Muda' => 'Muda', 'Dewasa' => 'Dewasa', 'Tua' => 'Tua'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randUmur') }}

				{{ Form::label('tb_calon_pasangan', 'Kategori tinggi badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('tb_calon_pasangan', ['' => 'Pilihan', 'Pendek' => 'Pendek', 'Sedang' => 'Sedang', 'Tinggi' => 'Tinggi'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randTb') }}
				{{-- {{ Form::label('randUmur', 'randUmur randUmur', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('randUmur', null, array('class' => 'form-control', 'placeholder' => 'Nama lengkap')) }} --}}

				{{ Form::label('merokok_calon_pasangan', 'Apakah Anda menerima calon pasangan yang merokok', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('merokok_calon_pasangan', ['' => 'Pilihan', 'Iya, tidak masalah' => 'Iya, tidak masalah', 'Iya, asalkan berniat untuk berhenti' => 'Iya, asalkan berniat untuk berhenti', 'Tidak, saya tidak suka perokok' => 'Tidak, saya tidak suka perokok'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::label('penghasilan_calon_pasangan', 'Rata-rata penghasilan calon pasangan Anda (perbulan)', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('penghasilan_calon_pasangan', ['' => 'Pilihan', 'Miskin' => '< Rp4.000.000', 'Sedang' => 'Rp4.000.000 - Rp6.000.000', 'Kaya' => '> Rp6.000.000'], null, array('class' => 'form-control', 'required' => '')) }}

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
				{{ Form::select('bb_calon_pasangan', ['' => 'Pilihan', 'Kurus' => 'Kurus', 'Berisi' => 'Berisi', 'Gemuk' => 'Gemuk'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randBb') }}

			    {{ Form::label('karakter_pasangan', 'Ceritakan karakter pasangan seperti apa yang Anda inginkan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('karakter_pasangan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%', 'placeholder' => 'Ceritakan karakter pasangan seperti apa yang Anda inginkan')) }}

			    {{-- <?php
			    	if (?>$jenis_kelamin == "Laki-laki"<?php) {?>
			    		{{ Form::label('status_pasangan', 'Status pasangan Anda', array('style' => 'margin-top: 20px')) }}
						{{ Form::select('status_pasangan', ['' => 'Pilihan', 'Belum menikah' => 'Belum menikah', 'Janda belum punya anak' => 'Janda belum punya anak', 'Janda sudah punya anak' => 'Janda sudah punya anak'], null, array('class' => 'form-control', 'required' => '')) }}
			    	<?php} elseif (?>$jenis_kelamin == "Perempuan"<?php) {?>
			    		{{ Form::label('status_pasangan', 'Status pasangan Anda', array('style' => 'margin-top: 20px')) }}
						{{ Form::select('status_pasangan', ['' => 'Pilihan', 'Belum menikah' => 'Belum menikah', 'Duda belum punya anak' => 'Duda belum punya anak', 'Duda sudah punya anak' => 'Duda sudah punya anak'], null, array('class' => 'form-control', 'required' => '')) }}
			    	<?php}
			    ?> --}}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
{{-- @include('partials/_javascript') --}}