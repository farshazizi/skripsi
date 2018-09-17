@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="login100-more-home" style="background-image: url('{{ asset('images/latar_baru.jpg') }}'); width: 100%;">
            <div class="card col-md-6 container" style="margin-top: 8%; border-radius: 8px">
                <div class="card-body" style="padding-top: 8%">
                    <img src="{{ asset('images/mencari.jpg') }}" style="margin-left: 43%; margin-bottom: 5%; width: 18%">
                    <h3 style="color: #d86162; text-align: center;">Calon pasangan kamu sudah dekat</h3><br>
                    <p style="margin-bottom: 5%; text-align: center; font-size: 16px">
                        Calon pasangan kamu sedang kami proses, harap sabar menunggu atau kamu dapat menghubungi kami untuk info lebih lanjut.
                    </p>
                    {{-- <form>
                        <a class="btn btn-md" style="color: white; margin-left: 40%; background-color: #d86162; width: 135px" href="{{ route('registration.store') }}" role="button">
                            Mulai Taaruf
                        </a>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection