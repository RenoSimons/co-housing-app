@extends('layouts.app')

@section('content')
<div class="container mt-5" id="favorites">
    <div class="row d-flex justify-content-around">
        <div class="col-md-3">
            <x-accountNavigation />
        </div>
        <div class="col-md-9">
            <h5 class="p-3 header-dark">Jouw voorstelling als huurder</h5>

            @if ($user_post == null)
            <small>Je hebt je nog niet kandidaat gesteld om te huren</small>
            <div class="mt-3 mb-4">
                <a href="{{ url('application') }}" class="read-more-btn">Stel jezelf voor als kandidaat</a>
            </div>
            @else
            <div class="application-card shadow-sm rounded d-md-flex mt-4 mb-4 p-3">
                <div class="col-md-4">
                    <img class="img-fluid m-2" src="https://picsum.photos/400" alt="">
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <h4 class="m-2">User title here</h4>

                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                            <span>{{ $user_post->location }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                            <span>{{ $user_post->type_house }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                            <span>{{ $user_post->budget }}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                            <span>{{ $user_post->gender }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                            <span>{{ $user_post->age }} jaar</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                            <span>{{ $user_post->start_date }}</span>
                        </div>
                    </div>

                    <p>{{ $user_post->intro }}</p>

                    <div class="action-btns d-flex justify-content-between">
                        <span class="edit-btn" id="my-application-btn">Wijzig</span>  
                        <span class="delete-btn" id="delete-application">Verwijder</span> 
                    </div>
                </div>

                <x-edit-application :post="$user_post" />
            </div>
            @endif

            <h5 class="p-3 header-dark">Jouw cohouse(s) in de aanbieding</h5>
            @if ($house_offers == null)
            <small>Je hebt nog geen cohouse aanbieding(en) gemaakt</small>
            <div class="mt-4 mb-4">
                <a href="{{ url('findrenter') }}" class="read-more-btn">Bied een cohouse aan</a>
            </div>
            @else
            @foreach($house_offers as $house_offer)
            <div class="application-card shadow-sm rounded d-md-flex mt-4 mb-4 p-3">
                <div class="col-md-4">
                    <img class="img-fluid m-2" src="{{ URL::asset('storage/house_images/'. $house_offer->img_urls[0]) }}" alt="">
                </div>
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <h4 class="m-2">User title here</h4>

                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                            <span>{{ $house_offer->province }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                            <span>{{ $house_offer->type_house }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                            <span>€{{ $house_offer->budget }}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                            <span>{{ $house_offer->housemates }}</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                            <span>{{ $house_offer->surface }} m²</span>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                            <span>{{ $house_offer->start_date }}</span>
                        </div>
                    </div>

                    <p>{{ $house_offer->title }}</p>

                    <div class="action-btns d-flex justify-content-between">
                        <span class="edit-btn" id="{{$house_offer->id}}">Wijzig</span>  
                        <span class="delete-btn" id="delete-offer{{$house_offer->id}}">Verwijder</span> 
                    </div>
                </div>
                <x-edit-house-offer :offer="$house_offer" />
            </div>
            @endforeach
        @endif
    </div>
</div>

<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

@endsection