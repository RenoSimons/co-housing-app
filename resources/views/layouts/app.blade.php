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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div id="app" class="overflow-hidden">
        <nav class="navbar sticky navbar-expand-md navbar-light bg-white shadow-sm pt-3 pb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="title-left">
                    <a href="{{url('/')}}" class="text-decoration-none black-text"><h3>Co-housing made easy</h3></a>
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
                                    <a class="nav-link black-text btn login-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item ml-3">
                                    <a class="nav-link black-text btn login-btn" href="{{ route('register') }}">{{ __('Registreer') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="user-avatar">
                                @if (strlen(Auth::user()->avatar()) > 0)
                                    <img class="user-avatar" src="{{ URL::asset('storage/user_images/'. Auth::user()->avatar()) }}" alt="Avatar">
                                @else   
                                    <img class="unknown-user" src="{{URL::asset('/images/icons/unknown-user.png')}}" alt="empty image">
                                @endif
                                
                            </div>
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link black-text dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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

                                    <a class="dropdown-item" href="">
                                        {{ __('Favorieten') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main>
            @yield('content')
        </main>
    </div>
    </div>
</body>
</html>
