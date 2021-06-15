@extends('layouts.app')

@section('content')
<div class="container mt-5 d-md-flex" id="public-profile-wrapper">
    @if ($user_details[0]['is_private'] == 0)
    <div class="col-md-4 mb-5 mr-2 p-0 pl-md-2 pr-md-2 mr-lg-5">
        <div class="user-name">
            <h1 class="mb-0">{{ $username->name }}</h1>

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
                    <img src=" {{URL::asset('/images/icons/pin.png')}}" class="search-icons">
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
                    @if ($username->id !== Auth()->id())
                    <button class="contact-btn w-75 mb-4">Contacteer</button>
                    @else
                    <a href="/user" class="save-btn p-2 mb-4">Wijzig mijn profiel</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-5 p-0 pl-md-2 pr-md-2">
        <div class="mt-5 pt-md-3">
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

        <div class="looking-for mt-5">
            <h4 class="header-dark p-2">Op zoek naar een woning?</h4>

            @if ( $application !== 'false')

            <div class="d-flex align-center mt-3">
                <img class="attention-logo" src="{{URL::asset('/images/icons/attention.png')}}" alt="attentie">
                <h4 class="ml-2 ml-md-3 mb-0">Deze persoon is op zoek naar een co-house</h4>
            </div>
            <div class="mt-4">
                <a href="" data-toggle="modal" data-target="#applicationModal" class="read-more-btn">Open het zoekertje van deze persoon</a>
            </div>

            <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header pb-0 d-flex justify-content-between">
                            <h4 class="modal-title" id="exampleModalLongTitle">Zoekertje van {{ $username->name }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $application->intro }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <p class="search-title">{{ $application->location }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                                    <p class="search-title">{{ $application->type_house }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                                    <p class="search-title">{{ $application->gender }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <p class="search-title">€{{ $application->budget }} <small>(maandelijks)</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                                    <p class="search-title">{{ $application->age }} jaar</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                                    <p class="search-title">{{ $application->start_date }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary dark-text" data-dismiss="modal">Sluit</button>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>Deze persoon is momenteel niet op zoek naar een co-house</p>
            @endif
        </div>
        <!-- Contact modal-->
        <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content pb-1">
                    <div class="modal-header d-flex justify-content-between">
                        <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0 mb-2">
                        <span class="hidden" id="poster_id">{{ $username->id }}</span>
                        <h4>Stuur een bericht naar {{ $username->name }}</h4>
                        <x-contactModal class="mt-2 mb-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <h1 class="header-dark p-3">Sorry, het profiel van {{ $username->name}} is privé</h1>
        <button class="contact-btn mt-2 mt-md-3 w-25">Stuur een bericht naar {{ $username->name }}</button>
    </div>
    @endif
</div>



@endsection