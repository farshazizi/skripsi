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
			    {{-- {{ Form::text('pendidikan_terakhir', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'contoh: Pendidikan terakhir Anda')) }} --}}
			    {{ Form::select('pendidikan_terakhir', ['' => 'Pilihan', 'TK' => 'Taman Kanak-kanak (TK)', 'SD' => 'Sekolah Dasar (SD)', 'SMP' => 'Sekolah Menengah Pertama (SMP)/sederajat', 'SMA' => 'Sekolah Menengah Atas (SMA)/sederajat', 'Diploma' => 'Diploma I/II/III/sederajat', 'S1' => 'Strata 1 (S1)', 'S2' => 'Strata 2 (S2)', 'S3' => 'Strata 3 (S3)'], null, array('class' => 'form-control', 'required' => '')) }}


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
			    {{ Form::textarea('keahlian_khusus', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'placeholder' => 'contoh:
1. Memasak
2. Menyanyi
3. dll')) }}

				{{-- {{ Form::label('moto', 'Apa moto hidup Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('moto', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Tuliskan moto hidup Anda')) }}

			    {{ Form::label('hobi', 'Apa hobi Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('hobi', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'placeholder' => 'contoh:
1. Membaca
2. Menulis
3. dll')) }} --}}

				{{ Form::label('jamaah_diikuti', 'Apa jamaah yang Anda ikuti?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{-- {{ Form::text('jamaah_diikuti', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apa jamaah yang Anda ikuti')) }} --}}
			    {{ Form::select('jamaah_diikuti', ['' => 'Pilihan', 'Muhammadiyah' => 'Muhammadiyah', 'Nahdatul Ulama (NU)' => 'Nahdatul Ulama (NU)', 'Other' => 'Other'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('ibadah_sunnah', 'Sebutkan ibadah sunnah harian', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('ibadah_sunnah', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 112px; resize: none', 'placeholder' => 'contoh:
1. Tahajud
2. Witir
3. dll')) }}

				{{ Form::label('deskripsi_diri', 'Deskripsikan diri Anda', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('deskripsi_diri', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Deskripsikan diri Anda')) }}

			    {{ Form::label('visi_pernikahan', 'Apa visi pernikahan Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('visi_pernikahan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apa visi pernikahan Anda')) }}

			    {{ Form::label('kehidupan_rumah_tangga', 'Kehidupan rumah tangga seperti apa yang Anda inginkan?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('kehidupan_rumah_tangga', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Kehidupan rumah tangga seperti apa yang Anda inginkan')) }}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
{{-- @include('partials/_javascript') --}}