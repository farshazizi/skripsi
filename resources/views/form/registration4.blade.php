@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration4.store']) !!}
			
				{{ Form::hidden('id_user') }}

				{{-- {{ Form::label('sd', 'Dimana Sekolah Dasar (SD) Anda?', array('style' => 'margin-top: 20px')) }}
				{{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
	    		{{ Form::text('sd', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: SDN 1 Surabaya')) }}
			    
			    {{ Form::label('smp', 'Dimana Sekolah Menengah Pertama (SMP) Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('smp', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: SMPN 1 Surabaya')) }}

			    {{ Form::label('sma', 'Dimana Sekolah Menengah Atas (SMA) Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('sma', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: SMAN 1 Surabaya')) }} --}}

			    {{-- {{ Form::label('perguruan_tinggi', 'Dimana Perguruan Tinggi Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('perguruan_tinggi', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Dimana Perguruan Tinggi Anda')) }} --}}
			    
			    {{ Form::label('pendidikan_terakhir', 'Pendidikan terakhir Anda', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('pendidikan_terakhir', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: Pendidikan terakhir Anda')) }}


			    {{-- {{ Form::label('prestasi', 'Prestasi apa yang pernah Anda raih?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('prestasi', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 10%; resize: none', 'placeholder' => 'contoh:
1. Juara 1 mengaji tingkat Nasional 2017
2. Juara 1 mengaji tingkat Nasional 2017
3. dll')) }}

			    {{ Form::label('organisasi', 'Organisasi apa yang pernah Anda ikuti?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('organisasi', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'contoh:
1. Ketua Himpunan Mahasiswa 2017
2. Ketua BEM Fakultas 2017
3. dll')) }}

			    {{ Form::label('pengalaman_kerja', 'Sebutkan pengalaman kerja Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('pengalaman_kerja', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'contoh:
1. IT Consultant
2. Project Manager
3. dll')) }} --}}

			    {{ Form::label('keahlian_khusus', 'Apa keahlian khusus yang Anda miliki?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('keahlian_khusus', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'contoh:
1. Memasak
2. Menyanyi
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