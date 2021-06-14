@extends('layouts.app')

@section('content')
<div class="container mt-4 mt-md-5 mb-4 mb-md-0" id="login-form">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">
                <div class="login-card-header d-flex align-center">
                    <img class="unknown-user mr-5" src="{{URL::asset('/images/icons/logo.png')}}">
                    <h4 class="modal-title" id="exampleModalLongTitle">Login</h4>
                </div>
                <div class="card-body mt-3 p-1">
                    <form method="POST" action="{{ route('login') }}" id="login-form-2">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Paswoord') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Herinner Mij') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn page-login-btn">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group row mb-0 mt-2 d-flex justify-content-center">
                            <div>
                                @if (Route::has('password.request'))
                                <a class="btn  white-text" href="{{ route('password.request') }}">
                                        {{ __('Paswoord Vergeten?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

