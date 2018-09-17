@extends('user/home')
@section('content')

<div class="content-wrapper py-3">
  <div class="container-fluid">

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/user/calon-pasangan">
          <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
        </a>
      </li>
    </ol>

    <div class="card mb-3">
      <div class="card-body">

        @foreach($daf as $daf)
        {!! Form::model($daf, ['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal','route'=>['ubah-kriteria.update', $daf->id]]) !!}
        {{ method_field('PATCH') }}{{csrf_field()}}
        <table border="0">
          <tr>
            <td>
              {{ Form::label('umur_calon_pasangan', 'Kategori umur pasangan Anda', array('style' => 'margin-top: 20px')) }}
            </td>
            <td style="padding-left: 24px; width: 55%">
              {{ Form::select('umur_calon_pasangan', ['' => 'Pilihan', 'Remaja' => 'Remaja (<= 27 tahun)', 'Dewasa' => 'Dewasa (24 - 32 tahun)', 'Tua' => 'Tua (>= 29 tahun)'], $daf->umur_calon_pasangan, array('class' => 'form-control', 'required' => '')) }}
              {{ Form::hidden('randUmur') }}
            </td>
          </tr>
          <tr>
            <td>
              {{ Form::label('tb_calon_pasangan', 'Kategori tinggi badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
            </td>
            <td style="padding-left: 24px">
              {{ Form::select('tb_calon_pasangan', ['' => 'Pilihan', 'Pendek' => 'Pendek (<= 167 cm)', 'Sedang' => 'Sedang (161 cm - 174 cm)', 'Tinggi' => 'Tinggi (>= 169 cm)'], $daf->tb_calon_pasangan, array('class' => 'form-control', 'required' => '')) }}
              {{ Form::hidden('randTb') }}
            </td>
          </tr>
          <tr>
            <td>
              {{ Form::label('bb_calon_pasangan', 'Kategori berat badan calon pasangan Anda', array('style' => 'margin-top: 20px')) }}
            </td>
            <td style="padding-left: 24px">
              {{ Form::select('bb_calon_pasangan', ['' => 'Pilihan', 'Kurus' => 'Kurus (<= 64 kg)', 'Berisi' => 'Berisi (51 kg - 74 kg)', 'Gemuk' => 'Gemuk (>= 66 kg)'], $daf->bb_calon_pasangan, array('class' => 'form-control', 'required' => '')) }}
              {{ Form::hidden('randBb') }}
            </td>
          </tr>
          <tr>
            <td>
              {{ Form::label('penghasilan_calon_pasangan', 'Rata-rata penghasilan calon pasangan Anda (perbulan)', array('style' => 'margin-top: 20px')) }}
            </td>
            <td style="padding-left: 24px">
              {{ Form::select('penghasilan_calon_pasangan', ['' => 'Pilihan', 'Rendah' => '< Rp8.000.000', 'Sedang' => 'Rp3.500.000 - Rp12.000.000', 'Tinggi' => '> Rp8.000.000'], $daf->penghasilan_calon_pasangan, array('class' => 'form-control', 'required' => '')) }}
              {{ Form::hidden('randPenghasilan') }}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              {{ Form::submit('Next', array('class' => 'btn btn-md btn-block', 'style' => 'margin-top: 3%; background-color: #d86162; color: white')) }}
            </td>
          </tr>
        </table>
              
        {!! Form::close() !!}
        @endforeach
      </div>
    </div>
  </div>
</div

@endsection