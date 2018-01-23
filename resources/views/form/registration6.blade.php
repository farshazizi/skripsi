@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration6.store']) !!}

				{{ Form::hidden('id_user') }}

			    {{-- {{ Form::label('kelebihan', 'Ceritakan tentang kelebihan Anda', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('kelebihan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Ceritakan tentang kelebihan Anda')) }}

			    {{ Form::label('kekurangan', 'Ceritakan tentang  kekurangan Anda', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('kekurangan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Ceritakan tentang  kekurangan Anda')) }} --}}

			    {{ Form::label('deskripsi_diri', 'Deskripsikan diri Anda', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('deskripsi_diri', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Deskripsikan diri Anda')) }}

			    {{ Form::label('visi_pernikahan', 'Apa visi pernikahan Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('visi_pernikahan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Apa visi pernikahan Anda')) }}

			    {{-- {{ Form::label('misi_pernikahan', 'Apa misi pernikahan Anda?', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::textarea('misi_pernikahan', null, array('class' => 'form-control', 'required' => '', 'style' => 'height: 20%; resize: none', 'placeholder' => 'Apa misi pernikahan Anda')) }} --}}

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