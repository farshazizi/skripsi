@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('images/azi.jpg');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" style="background-image: url('images/ok.png');">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-6 control-label" style="color: white">E-Mail Address</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-6 control-label" style="color: white">Password</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn" style="width: 160px; background-color: #d86162; color: white; 
                                border-radius: 25px; box-shadow: 1px 2px 5px #2d2d2d; margin-top: 2%">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
       
    {{-- <div class="container">  
        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset('/images/b.png') }}" style="width: 100%; height: 500px" />
            </div>
        </div>
    </div> --}}
   

@endsection
