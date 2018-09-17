@extends('layouts.app')

@section('content')

<div class="limiter">
    {{-- <div class="container-login100"> --}}
        <div class="login100-more-form" style="background-image: url(/images/background_form.jpg); width: 100%; height: 100%">
        	<div class="container">
				<div class="row" style="padding-bottom: 3%; padding-top: 3%; ">
					<div class="col-md-6" style="background-color: white; margin-left: 27%; border-radius: 8px; box-shadow: 0px 0px 0.5px #2d2d2d">
						{!! Form::open(['route' => 'registration2.store']) !!}
			    
						    {{ Form::hidden('id_user') }}

						    {{ Form::label('tinggi_badan', 'Tinggi Badan (cm)', array('style' => 'margin-top: 20px')) }}
						    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    {{ Form::number('tinggi_badan', null, array('class' => 'form-control', 'required' => '', 'min' => '0', 'maxlength' => '3', 'placeholder' => 'Tinggi badan dalam satuan (cm)')) }}

						    {{ Form::label('berat_badan', 'Berat Badan (kg)', array('style' => 'margin-top: 20px')) }}
						    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    {{ Form::number('berat_badan', null, array('class' => 'form-control', 'required' => '', 'min' => '0', 'maxlength' => '3', 'placeholder' => 'Berat badan dalam satuan (kg)')) }}

						    {{ Form::label('gol_darah', 'Golongan Darah', array('style' => 'margin-top: 20px')) }}
						    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    <br>
						    {{-- {{ Form::select('gol_darah', ['' => 'Pilih Golongan Darah', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O'], null, array('class' => 'form-control', 'required' => '')) }} --}}
						    {{ Form::radio('gol_darah', 'A', false, array('required' => '')) }}
						    {{ Form::label('gol_darah', 'A', array('style' => 'width: 50%')) }}

						    {{ Form::radio('gol_darah', 'B') }}
						    {{ Form::label('gol_darah', 'B') }}
						    <br>

							{{ Form::radio('gol_darah', 'AB') }}
							{{ Form::label('gol_darah', 'AB', array('style' => 'width: 50%')) }}

							{{ Form::radio('gol_darah', 'O') }}
							{{ Form::label('gol_darah', 'O') }}
							<br>

						    {{ Form::label('merokok', 'Apakah Anda Merokok', array('style' => 'margin-top: 20px')) }}
						    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    {{ Form::select('merokok', ['' => 'Pilihan Anda', 'Saya merokok' => 'Saya merokok', 'Saya merokok namun berniat untuk berhenti' => 'Saya merokok namun berniat untuk berhenti', 'Saya tidak merokok sama sekali' => 'Saya tidak merokok sama sekali'], null, array('class' => 'form-control', 'required' => '')) }}

						    {{ Form::label('riwayat_kesehatan', 'Tuliskan riwayat kesehatan Anda', array('style' => 'margin-top: 20px')) }}
						    {{ Form::label('#', '*', array('style' => 'margin-top: 20px; color: red')) }}
						    {{ Form::textarea('riwayat_kesehatan', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Tuliskan riwayat penyakit Anda', 'style' => 'height: 10%; resize: none')) }}

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
