@extends('layouts.app')

@section('content')
	<div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('images/bg-01.jpg'); width: 100%">
				<div class="card mb-3" {{-- style="margin-top: 10%; margin-right: 20%; margin-left: 20%" --}} style="width: 40%; height: auto; margin-top: 10%; margin-left: 30%">
					<img class="card-img-top" src="{{ asset('/images/back.jpg') }}" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Harap menunggu hasil matchmaking</h5>
					</div>
				</div>
				{{-- <div class="card mb-3">
				  <img class="card-img-top" src="{{ asset('/images/back.jpg') }}" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Card title</h5>
				    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				  </div>
				</div> --}}
            </div>
        </div>
    </div>

@endsection
{{-- @include('partials/_javascript') --}}