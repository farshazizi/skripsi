<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('partials/_header')
    </head>
    <body>
        {{-- @include('partials/_message') --}}
        <div class="fh5co-loader"></div>
        <div id="page">
            @include('partials/_nav')
            
            @yield('content')
            <div class="gototop js-top">
                <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
            </div>
        
            <div id="fh5co-started">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center fh5co-heading-subscribe">
                            <h2>Subscribe</h2>
                            {{-- <h3>Dapatkan e-book dan tips-tips menarik tentang membangun keluarga sakinah.</h3> --}}
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                            {{-- <form method="POST" action="subscribe/input.php" class="form-inline"> --}}
                                <div class="col-md-6 col-sm-6">
                                    {!! Form::open(['route' => 'welcome.store']) !!}
                                        {{-- {{ Form::label('alamat_email', 'Email', array('class' => 'sr-only')) }} --}}
                                        {{ Form::email('email_subscribe', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Email')) }}
                                    {{-- <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" id="subscribe" name="subscribe" required>
                                    </div>  --}}
                                </div>
                                <div class="col-md-6 col-sm-6">
                                        {{ Form::submit('Subscribe', array('class' => 'btn btn-default btn-block')) }}
                                    {{-- <button type="submit" class="btn btn-default btn-block">Subscribe</button> --}}
                                    {!! Form::close() !!}
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials/_footer')
        @include('partials/_javascript')
    </body>
</html>