@extends('layouts.app')

@section('content')
<div class="container mt-5 d-md-flex" id="public-profile-wrapper">
    @if ($user_details[0]['is_private'] == 0)
    <div class="col-md-6 mb-5">
        <div class="user-name">
            <h1  class="mb-0">{{ $username->name }}</h1>

            @if($username->created_at)
            <small>Lid sinds: {{$username->created_at->format('m-d-Y ')}}</small>
            @else
            @endif
        </div>
        <div class="text-center user-box">
            <div class="d-flex justify-content-center ml-2 mt-4">
                @if (strlen($user_details[0]['fb_link']) > 0)
                <a href="$user_details[0]['fb_link']">
                    <img src="/images/icons/facebook-icon.png" class="search-icons" alt="facebook icoon">
                </a>
                @else
                <small>Geen Facebook account gekoppeld</small>
                @endif

                @if (strlen($user_details[0]['insta_link']) > 0)
                <a href="$user_details[0]['insta_link']">
                    <img src="/images/icons/instagram-icon.png" class="ml-3 search-icons" alt="instagram icoon">
                </a>
                @else
                <small>Geen Instagram account gekoppeld</small>
                @endif
            </div>
            <div class="profile-picture mt-2">
                @if (strlen($user_details[0]['img_url']) > 0)
                <img class="img-fluid w-75 mt-2 rounded" src="{{ URL::asset('storage/user_images/'. $user_details[0]['img_url'] ) }}" alt="user profile picture">
                @else
                <span>Deze gebruiker heeft geen foto gepubliceerd</span>
                @endif

            </div>

            <div class="personal-info d-flex flex-column justify-content-center">
                <div class="d-flex ml-2 mt-4 justify-content-center"">
                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                    @if (strlen($user_details[0]['birthplace']) > 0)
                    <strong>Afkomstig van {{ $user_details[0]['birthplace'] }}</strong>
                    @else
                    <strong>Afkomstig van Onbekend</strong>
                    @endif
                </div>

                <div class="d-flex ml-2 mt-4 justify-content-center">
                    <img src="{{URL::asset('/images/icons/information-button.png')}}" class="search-icons">
                    @if (strlen($user_details[0]['status']) > 0)
                    <strong>Status: {{ $user_details[0]['status'] }}</strong>
                    @else
                    <strong>Status: Onbekend</strong>
                    @endif
                </div>

                <div class="d-flex ml-2 mt-4 justify-content-center">
                    <button class="contact-btn w-75 mb-4">Contacteer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mt-5">
            <h4 class="header-dark p-2">Over mezelf</h4>
            @if (strlen($user_details[0]['intro_text']) > 0)
            <p>{{ $user_details[0]['intro_text']}}</p>
            @else
            <span>Deze gebruiker heeft nog geen intro tekst gepubliceerd</span>
            @endif
        </div>

        <div class="hobbies mt-5">
            <h4 class="header-dark p-2">Mijn hobbies en interesses</h4>
            @if (strlen($user_details[0]['hobby_text']) > 0)
            <p>{{ $user_details[0]['hobby_text']}}</p>
            @else
            <span>Deze gebruiker heeft nog geen hobbies of interesses gepubliceerd</span>
            @endif
        </div>
    </div>
    @else
    <div class="container">
        <h1 class="header-dark p-3">Sorry, het profiel van {{  $username->name}} is privé</h1>
        <button class="contact-btn mt-2 mt-md-3 w-25">Stuur een bericht naar {{  $username->name }}</button>
    </div>
    @endif
</div>



@endsection