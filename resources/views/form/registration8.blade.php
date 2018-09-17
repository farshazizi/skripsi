@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="login100-more-form" style="background-image: url(/images/background_form.jpg); width: 100%; height: 100%">
        	<div class="container">
        		<div class="row" style="padding-bottom: 3%; padding-top: 3%; ">
					<div class="col-md-6" style="background-color: white; margin-left: 27%; border-radius: 8px; box-shadow: 0px 0px 4px #2d2d2d">
						{!! Form::open(['route' => 'registration8.store','files'=>true, 'enctype'=>'multipart/form-data']) !!}

							{{ Form::hidden('id_user') }}

							{{ Form::label('ktp', 'Upload KTP', array('style' => 'margin-top: 20px')) }}
							{{ Form::label('', '*', array('style' => 'margin-top: 20px; color: red')) }}<br>
						    {{ Form::file('ktp', null, array('class' => 'form-control', 'placeholder' => 'Cantumkan berupa link', 'required' => '')) }}

						    {{ Form::label('foto_diri', 'Upload foto diri terbaru (6 bulan terakhir)', array('style' => 'margin-top: 20px')) }}
							{{ Form::label('', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    {{ Form::file('foto_diri', null, array('class' => 'form-control', 'placeholder' => 'Cantumkan berupa link', 'required' => '')) }}<br>

						    @if($jandu->status_pernikahan == "Pernah menikah, tidak memiliki anak" || $jandu->status_pernikahan == "Pernah menikah dan memiliki anak")
						    {{ Form::label('akte_cerai', 'Upload akte cerai janda/duda', array('style' => 'margin-top: 20px')) }}
							{{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}<br>
						    {{ Form::file('akte_cerai', null, array('class' => 'form-control', 'placeholder' => 'Cantumkan berupa link')) }}
						    @endif

						    {{-- {{ Form::label('#', '* Beri tanda "-" jika tidak ada', array('style' => 'margin-top: 20px; color: red')) }} --}}
						    <p style="font-size: 12px; color: red; margin-top: 5px">* Wajib diisi</p>

						    {{ Form::submit('Finish', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 3%; margin-bottom: 3%; ; background-color: #d86162; color: white')) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
