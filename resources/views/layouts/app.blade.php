<!DOCTYPE html>
<html lang="en">
    <head>
    {{-- <title>Login V13</title> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!--===============================================================================================-->  
        {{-- <link rel="icon" type="image/png" href="temp_form/images/icons/favicon.ico"/> --}}
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/animate/animate.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/select2/select2.min.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="temp_form/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="temp_form/css/util.css">
        <link rel="stylesheet" type="text/css" href="temp_form/css/main.css">
    <!--===============================================================================================-->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
        <link rel="icon" href="{{ asset('/images/icon.png') }}">
        <title>qtaaruf</title>
    </head>
    <body style="background-color: #999999;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="/"><img src="{{ asset('/images/logo.png') }}" style="width: 64px; height: auto; margin-left: 40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a class="nav-item nav-link active" href="{{ route('login') }}" style="margin-left: 1065px">Login <span class="sr-only"></span></a>
                        <a class="nav-item nav-link active" href="{{ route('register') }}">Register <span class="sr-only"></span></a>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-left: 1105px">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" style="margin-left: 1105px">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">&nbsp;
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </div>
            </nav>
        @yield('content')

     
    <!--===============================================================================================-->
        <script src="temp_form/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/vendor/bootstrap/js/popper.js"></script>
        <script src="temp_form/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/vendor/daterangepicker/moment.min.js"></script>
        <script src="temp_form/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="temp_form/js/main.js"></script>

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    </body>
</html>