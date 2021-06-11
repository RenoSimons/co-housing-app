<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>

<body>
    <div class="overflow-hidden">
        <nav class="navbar sticky navbar-expand-md navbar-light bg-white shadow-sm pt-3 pb-3">
            <div class="container-fluid p-md-0">
                <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <div class="animated-icon1"><span></span><span></span><span></span></div>
                </button>

                <div class="title-left ml-0 ml-md-3">
                    <a href="{{url('/')}}" class="text-decoration-none black-text"><img class="unknown-user" src="{{URL::asset('/images/icons/logo.png')}}"> </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ml-sm-2 ">
                            <a class="nav-link black-text nav-btn" href="{{ route('cohousings') }}">{{ __('Vind co-house') }}</a>
                        </li>
                        <li class="nav-item ml-sm-2 ml-md-4 ml-lg-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('persons') }}">{{ __('Vind huurder') }}</a>
                        </li>
                        <li class="nav-item ml-sm-2 ml-md-4 ml-lg-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('findrenter') }}">{{ __('Stel te huur') }}</a>
                        </li>
                        <li class="nav-item ml-sm-2 ml-md-4 ml-lg-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('application') }}">{{ __('Stel jezelf voor') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-center">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link black-text btn login-btn" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item ml-0 ml-md-3">
                            <a class="nav-link black-text btn login-btn" href="{{ route('register') }}">{{ __('Registreer') }}</a>
                        </li>
                        @endif
                        @else

                        @auth
                        <li class="nav-item dropdown">
                            <div class="d-flex">
                                <img src="{{URL::asset('/images/icons/bell.png')}}" data-toggle="drop2" class="search-icons mr-0 d-none d-md-flex mb-1" id="notify-belll" alt="notificatie bel">
                                <div class="notification-circle"></div>
                            </div>
                            <div class="dropdown-menu drop2" aria-labelledby="notify-belll">

                            </div>
                        </li>

                        @endauth

                        <li class="ml-4 nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link black-text dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Mijn account
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('messages') }}">
                                    {{ __('Mijn berichten') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('myapplications') }}">
                                    {{ __('Mijn posts') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('user') }}">
                                    {{ __('Mijn profiel') }}
                                </a>

                                <a class="dropdown-item" href="{{ URL::to('/profile', Auth::user()->id) }}">
                                    {{ __('Bekijk mijn online profiel') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('myfavorites') }}">
                                    {{ __('Favorieten') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="slider-box hide-overflow">
            <div id="message-slider" class="d-flex hide-box w-md-100">
                <img src="{{URL::asset('/images/icons/uitroepteken.png')}}" class="exclamation-mark" alt="uitroepteken">
                <span class="ml-2" id="message-text"></span>
            </div>
        </div>

        <main>
            @yield('content')
        </main>
        @guest
        <!-- Login modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <img class="unknown-user mr-5" src="{{URL::asset('/images/icons/logo.png')}}">
                        <h4 class="modal-title" id="exampleModalLongTitle">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-loginModal />
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                @if (Route::has('password.request'))
                                <a class="btn  white-text" href="{{ route('password.request') }}">
                                    {{ __('Paswoord Vergeten?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                    </div>
                </div>
            </div>
        </div>
        @endguest
    </div>

    <div class="footer pt-2">
        <div class="container h-100">
            <div class="d-flex justify-content-between align-center">
                <div class="col-md-4 p-2">
                    <div class="d-flex align-center">
                        <img class="logo-footer ml-2" src="{{URL::asset('/images/icons/logo.png')}}">
                        <h4 class="white-text mb-0 ml-2 ml-md-4">Co-housing België</h4>
                    </div>
                </div>
                <div class="col-md-4 p-2 d-flex justify-content-center">
                    <ul class="d-flex flex-column justify-content-between">
                        <li><a class="" href="{{ route('cohousings') }}">{{ __('Vind co-house') }}</a></li>
                        <li><a class="" href="{{ route('persons') }}">{{ __('Vind huurder') }}</a></li>
                        <li><a class="" href="{{ route('findrenter') }}">{{ __('Stel te huur') }}</a></li>
                        <li><a class="" href="{{ route('application') }}">{{ __('Stel jezelf voor') }}</a></li>
                        @auth <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li> @endauth
                    </ul>
                </div>
                <div class="col-md-4 p-2 d-flex justify-content-center">
                    @auth
                    <ul class="d-flex flex-column justify-content-between">
                        <li><a class="" href="{{ route('messages') }}">{{ __('Mijn berichten') }}</a></li>
                        <li><a class="" href="{{ route('myapplications') }}">{{ __('Mijn posts') }}</a></li>
                        <li><a class="" href="{{ route('myfavorites') }}">{{ __('Favorieten') }}</li>
                        <li><a class="" href="{{ route('user') }}">{{ __('Mijn profiel') }}</a></li>
                        <li><a class="" href="{{ URL::to('/profile', Auth::user()->id) }}">{{ __('Bekijk mijn online profiel') }}</a></li>
                    </ul>
                    @else
                    <ul class="d-flex flex-column justify-content-around">
                        <li class="nav-item ml-0">
                            <a class="nav-link black-text btn login-btn mt-0" href="{{ route('register') }}">{{ __('Registreer') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link black-text btn mt-3 login-btn" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>

            <div class="row d-flex justify-content-center border-white mb-2">
                <p class="white-text cp-text mb-0 mt-2">© All rights reserved - Bachelor Project Reno Simons</p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="application/javascript" src="/public/js/app.js" defer></script>
</body>

</html>