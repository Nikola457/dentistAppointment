<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="World's most popular password manager. Sign up for free!">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>LastPass | The most popular password manager</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('images/LastPass-icon.jpg') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('css/LineIcons.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <div id="app" style="width:100%">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent" style="margin-top:10px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="headingNav">E-Dentist</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-4 mb-lg-0" id="navbar-admin">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">HOME</a>
                </li>
                <li>
                    <a class="nav-link" href="#service">FEATURES</a>
                </li>
                <li>
                    <a class="nav-link" href="#pricing">PLANS</a>
                </li>
                <li>
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                @if (!Auth::guest())
                @if(Auth::user()->name ==  "admin")
                <li><a  class="nav-link" href="{{ url('patients') }}"> SVI PACIJENTI</a></li>
                <li> <a class="nav-link" href="{{ url('dashboard') }}"> ZAKAZANI TERMINI</a></li>
                <li><a class="nav-link" href="{{ url('unscheduled') }}"> NEZAKAZANI TERMINI</a></li>
            @endif
            @endif
            
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#06a3da; font-size:18px;">
                            {{ Auth::user()->name }}    
                        </button>
                     
                            <div class="dropdown-menu bg-transparent dropdown-menu-end" id="navbarDropDown"
                            style="text-align:center margin-top:-20px;" aria-labelledby="navbarDropdown">
                            <a style="color:#06a3da" class="dropdown-item" style="padding:10px;" href="/dashboard">Dashboard</a>
                            <a style="color:#06a3da" class="dropdown-item" style="padding:10px;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                      </div>
                    @endguest
                </ul>
</div>
            </div>
        </div>
    </nav>

</body>

</html>
