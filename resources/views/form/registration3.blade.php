@extends('layouts.app')

@section('content')

{{-- @include('partials/_header') --}}
<div class="container">
	<div class="row" style="margin-top: 0%; margin-bottom: 5%">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'registration3.store']) !!}

				{{ Form::hidden('id_user') }}
				
			    {{ Form::label('nama_ayah', 'Nama Ayah', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('nama_ayah', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Nama Ayah')) }}

			    {{ Form::label('suku_ayah', 'Suku Ayah', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('suku_ayah', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Suku Ayah')) }}

			    {{ Form::label('nama_ibu', 'Nama Ibu', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('nama_ibu', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Nama Ibu')) }}

			    {{ Form::label('suku_ibu', 'Suku Ibu', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('suku_ibu', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Suku Ibu')) }}

			    {{ Form::label('alamat_ortu', 'Alamat Orang Tua Saat Ini', array('style' => 'margin-top: 20px')) }}
			    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
			    {{ Form::text('alamat_ortu', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Alamat Orang Tua Saat Ini')) }}

			    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
			    <p style="font-size: 12px; color: red; margin-top: 5px">* Beri tanda "-" jika tidak ada</p>

			    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; position: absolute; right: 16px')) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
{{-- @include('partials/_javascript') --}}