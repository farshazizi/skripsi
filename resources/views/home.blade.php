@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                {{-- {!! Form::open(['route' => 'registration1.store']) !!}
                    {{ Form::submit('Next', array('class' => 'btn btn-primary btn-md btn-block')) }}
                {!! Form::close() !!} --}}
                <form>
                    {{-- <button class="btn btn-primary btn-md btn-block"> --}}
                        <a class="btn btn-primary btn-md btn-block" style="color: white" href="{{ route('registration.store') }}" role="button">
                            Next
                        </a>
                    {{-- </button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
