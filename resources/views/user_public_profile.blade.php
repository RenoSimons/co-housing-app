@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-md-flex">
        <div class="col-md-6">
            <div class="user-name">
                <h1>{{ $username[0] }}</h1>
            </div>

            <div class="profile-picture mt-2">
                @if (strlen($user_details[0]['img_url']) > 0)
                    <img class="img-fluid" src="{{ URL::asset('storage/user_images/'. $user_details[0]['img_url'] ) }}" alt="user profile picture" >
                @else
                    <span>Deze gebruiker heeft geen foto gepubliceerd</span>
                @endif
                
            </div>

            <div class="personal-info">
                <div class="d-flex ml-2 mt-4">
                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                    @if (strlen($user_details[0]['birthplace']) > 0)
                        <strong>{{ $user_details[0]['birthplace'] }}</strong>
                    @else
                        <strong>Onbekend</strong>
                    @endif
                </div>

                <div class="d-flex ml-2 mt-4">
                    <img src="{{URL::asset('/images/icons/information-button.png')}}" class="search-icons">
                    @if (strlen($user_details[0]['status']) > 0)
                        <strong>{{ $user_details[0]['status'] }}</strong>
                    @else
                        <strong>Onbekend</strong>
                    @endif
                </div>
            </div>   
        </div>

        <div class="col-md-6">
            <div class="mt-5">
                <h4>Over mezelf</h4>
                @if (strlen($user_details[0]['intro_text']) > 0)
                    <p>{{ $user_details[0]['intro_text']}}</p>
                @else
                    <span>Deze gebruiker heeft nog geen intro tekst gepubliceerd</span>
                @endif
            </div>

            <div class="hobbies mt-5">
                <h4>Mijn hobbies en interesses</h4>
                @if (strlen($user_details[0]['hobby_text']) > 0)
                    <p>{{ $user_details[0]['hobby_text']}}</p>
                @else
                    <span>Deze gebruiker heeft nog geen hobbies of interesses gepubliceerd</span>
                @endif
            </div>
        </div>
    </div>



@endsection