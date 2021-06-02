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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="app" class="overflow-hidden">
        <nav class="navbar sticky navbar-expand-md navbar-light bg-white shadow-sm pt-3 pb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="title-left">
                    <a href="{{url('/')}}" class="text-decoration-none black-text"><img class="unknown-user" src="{{URL::asset('/images/icons/logo.png')}}"> </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link black-text nav-btn" href="{{ route('cohousings') }}">{{ __('Vind co-house') }}</a>
                        </li>
                        <li class="nav-item ml-md-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('persons') }}">{{ __('Vind huurder') }}</a>
                        </li>
                        <li class="nav-item ml-md-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('findrenter') }}">{{ __('Stel te huur') }}</a>
                        </li>
                        <li class="nav-item ml-md-5 mt-xs-2">
                            <a class="nav-link black-text nav-btn" href="{{ route('application') }}">{{ __('Stel jezelf voor') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link black-text btn login-btn" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item ml-3">
                            <a class="nav-link black-text btn login-btn" href="{{ route('register') }}">{{ __('Registreer') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link black-text dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Mijn account
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ URL::to('/profile', Auth::user()->id) }}">
                                    {{ __('Bekijk mijn online profiel') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('application') }}">
                                    {{ __('Mijn applicaties') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('user') }}">
                                    {{ __('Mijn profiel') }}
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
        <div class="slider-box overflow-hidden">
            <div id="message-slider" class="d-flex">
                <img src="{{URL::asset('/images/icons/uitroepteken.png')}}" class="exclamation-mark" alt="uitroepteken">
                <span class="ml-2" id="message-text"></span>
            </div>
        </div>

        <main>
            @yield('content')
        </main>

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
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>