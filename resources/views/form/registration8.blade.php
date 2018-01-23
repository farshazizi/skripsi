@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration8.store']) !!}

				{{ Form::hidden('id_user') }}

				{{ Form::label('ktp', 'Upload KTP', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('ktp', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Cantumkan berupa link')) }}

			    {{ Form::label('foto_diri', 'Upload foto diri terbaru (6 bulan terakhir)', array('style' => 'margin-top: 20px')) }}
			    {{ Form::text('foto_diri', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Cantumkan berupa link')) }}

			    {{ Form::label('akte_cerai', 'Upload akte cerai janda/duda', array('style' => 'margin-top: 20px')) }}
				{{-- {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    {{ Form::text('akte_cerai', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Cantumkan berupa link')) }}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Finish', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
{{-- @include('partials/_javascript') --}}