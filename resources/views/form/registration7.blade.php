@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration7.store']) !!}

				{{ Form::hidden('id_user') }}

				{{ Form::label('umur_pasangan', 'Kategori umur pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('umur_pasangan', ['' => 'Pilihan', 'Muda' => 'Muda', 'Parobaya' => 'Parobaya', 'Tua' => 'Tua'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randUmur') }}

				{{ Form::label('tb_calon_pasangan', 'Kategori tinggi badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('tb_calon_pasangan', ['' => 'Pilihan', 'Pendek' => 'Pendek', 'Sedang' => 'Sedang', 'Tinggi' => 'Tinggi'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randTb') }}

				{{ Form::label('merokok_calon_pasangan', 'Apakah Anda menerima calon pasangan yang merokok', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('merokok_calon_pasangan', ['' => 'Pilihan', 'Iya, tidak masalah' => 'Iya, tidak masalah', 'Iya, asalkan berniat untuk berhenti' => 'Iya, asalkan berniat untuk berhenti', 'Tidak, saya tidak suka perokok' => 'Tidak, saya tidak suka perokok'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::label('penghasilan_calon_pasangan', 'Kategori penghasilan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
				{{ Form::select('penghasilan_calon_pasangan', ['' => 'Pilihan', 'Miskin' => '< Rp3.500.000', 'Berkecukupan' => 'Rp3.500.001 - Rp4.000.000', 'Sedang' => 'Rp4.000.001 - Rp6.000.000', 'x' => 'Rp6.000.001 - Rp8.000.000', 'Kaya' => '> Rp8.000.001'], null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::hidden('randPenghasilan') }}

				{{-- {{ Form::label('penghasilan_calon_pasangan', 'Rataan penghasilan calon pasangan per bulan', array('style' => 'margin-top: 20px')) }}
			    {{ Form::number('penghasilan_calon_pasangan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'ex: 4500000')) }} --}}
			    {{-- {{ Form::number_format(number)('', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'ex: 4500000')) }} --}}

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

				{{-- {{ Form::label('suku_domisili_pasangan', 'Apakah suku domisili pasangan Anda penting untuk Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('suku_domisili_pasangan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apakah suku domisili pasangan Anda penting untuk Anda')) }} --}}

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