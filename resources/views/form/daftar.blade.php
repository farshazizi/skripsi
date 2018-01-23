@include('partials/_header')
<div class="container" style="background-image: url( {{ asset('/images/ground_new.jpg') }}); width: 100%; height: 100%">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="background-color: white; margin-top: 5%">
			{!! Form::open(['route' => 'daftar.store']) !!}

			    {{ Form::label('nama_lengkap', 'Nama Lengkap', array('style' => 'margin-top: 10px')) }}
			    {{ Form::text('nama_lengkap', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('tanggal_lahir', 'Tanggal Lahir', array('style' => 'margin-top: 0px')) }}
			    {{ Form::date('tanggal_lahir', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('jenis_kelamin', 'Jenis Kelamin', array('style' => 'margin-top: 0px')) }}
			    {{ Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'], null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('alamat_email', 'Alamat Email', array('style' => 'margin-top: 0px')) }}
			    {{ Form::email('alamat_email', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::label('handphone', 'No. Handphone', array('style' => 'margin-top: 0px')) }}
			    {{ Form::number('handphone', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 10px; margin-bottom: 10px')) }}
			    
			{!! Form::close() !!}
		</div>

		<div class="col-lg-4 col-lg-offset-4" style="text-align: center; color: white">
			<p class="copyright">&copy; qtaaruf.com - All Rights Reserved</p>
		</div>
	</div>
</div>
@include('partials/_javascript')