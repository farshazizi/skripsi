@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration5.store']) !!}

				{{ Form::hidden('id_user') }}

			    {{ Form::label('moto', 'Apa moto hidup Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('moto', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Tuliskan moto hidup Anda')) }}

			    {{ Form::label('hobi', 'Apa hobi Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('hobi', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'placeholder' => 'contoh:
1. Membaca
2. Menulis
3. dll')) }}

			    {{-- {{ Form::label('website_kunjangan', 'Website apa yang sering Anda kunjungi?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('website_kunjangan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 12%', 'placeholder' => 'contoh: www.qtaaruf.com')) }}

			    {{ Form::label('tokoh_favorit', 'Siapa tokoh favorit Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('tokoh_favorit', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: Nabi Muhammad')) }}

			    {{ Form::label('buku_favorit', 'Apa buku favorit Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('buku_favorit', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: al-quran')) }} --}}

			    {{ Form::label('jamaah_diikuti', 'Apa jamaah yang Anda ikuti?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{-- {{ Form::text('jamaah_diikuti', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apa jamaah yang Anda ikuti')) }} --}}
			    {{ Form::select('jamaah_diikuti', ['' => 'Pilihan', 'Muhammadiyah' => 'Muhammadiyah', 'Nahdatul Ulama (NU)' => 'Nahdatul Ulama (NU)', 'Other' => 'Other'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('ibadah_sunnah', 'Sebutkan ibadah sunnah harian?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('ibadah_sunnah', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'placeholder' => 'contoh:
1. Tahajud
2. Witir
3. dll')) }}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
{{-- @include('partials/_javascript') --}}