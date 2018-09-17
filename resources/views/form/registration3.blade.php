@extends('layouts.app')

@section('content')

<div class="limiter">
    {{-- <div class="container-login100"> --}}
        <div class="login100-more-form" style="background-image: url(/images/back_baru.jpg); width: 100%; height: 100%">
        	<div class="container">
				<div class="row" style="padding-bottom: 3%; padding-top: 3%; ">
					<div class="col-md-6" style="background-color: white; margin-left: 27%; border-radius: 8px; box-shadow: 0px 0px 4px #2d2d2d">
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

						    {{ Form::submit('Next', array('class' => 'btn btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 5%; width: 20%; margin-left: 80%; right: 16px; background-color: #d86162; color: white')) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
        </div>
    {{-- </div> --}}
</div>

@endsection
