@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="login100-more-home" style="background-image: url('images/latar_baru.jpg'); width: 100%;">
            <div class="card col-md-6 container" style="margin-top: 8%; border-radius: 8px">
                <div class="card-body">
                    <img src="images/hearts.png" style="margin-left: 43%; margin-bottom: 5%; width: 18%">
                    <p style="margin-bottom: 5%; text-align: center; font-size: 16px">
                        Demi Allah Yang Maha Mengetahui, saya menyatakan bahwa saya sudah siap untuk menikah dan berikhtiar taaruf secara syar'i.
                    </p>
                    <form>
                        <a class="btn btn-md" style="color: white; margin-left: 40%; background-color: #d86162; width: 135px" href="{{ route('registration.store') }}" role="button">
                            Mulai Taaruf
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
