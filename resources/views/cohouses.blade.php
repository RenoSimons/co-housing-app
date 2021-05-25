@extends('layouts.app')

@section('content')
<div class="container p-2 p-md-0 mt-1 mt-md-5" id="offer-wrapper">
    <h1>Co-housings in de aanbieding</h1>
    <hr>

    <div class="row shadow-sm mt-md-4">
        <form action="{{ url('/cohousings/filterhouses') }}" method="GET" class="w-100 p-3">
            {{ method_field('GET') }}
            <div id="filter-box" class="d-md-flex justify-content-between">
                <div class="form-group collapser">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                        <p class="search-title">Regio</p>
                    </div>
                    <select class="form-control btn_listener" name="region" id="region-input">
                        <option>Eender</option>
                        <option>Antwerpen</option>
                        <option>Gent</option>
                        <option>Brugge</option>
                        <option>Leuven</option>
                        <option>Brussel</option>
                        <option>Bergen</option>
                        <option>Namen</option>
                        <option>Luik</option>
                    </select>
                </div>
                <div class="form-group collapser">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                        <p class="search-title">Type huurwoning</p>
                    </div>
                    <select class="form-control btn_listener" name="type_building">
                        <option>Eender</option>
                        <option>Appartement</option>
                        <option>Huis</option>
                        <option>Duplex</option>
                    </select>
                </div>

                <div class="form-group collapser">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                        <p class="search-title">Oppervlakte</p>
                    </div>
                    <select class="form-control btn_listener" name="surface">
                        <option>Eender</option>
                        <option>10 - 20m²</option>
                        <option>20 - 30m²</option>
                        <option>30 - 40m²</option>
                        <option>40 - 50m²</option>
                        <option>> 50m²</option>
                    </select>
                </div>
                <div class="form-group collapser">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                        <p class="search-title">Aantal huisgenoten</p>
                    </div>
                    <select class="form-control btn_listener" name="housemates">
                        <option>Eender</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>> 5</option>
                    </select>
                </div>

                <div class="form-group collapser">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                        <p class="search-title">Budget <small>(maandelijks)</small></p>
                    </div>
                    <select class="form-control btn_listener" name="budget">
                        <option>Eender</option>
                        <option>€200-300</option>
                        <option>€300-400</option>
                        <option>€400-500</option>
                        <option>€500-600</option>
                        <option>> €600</option>
                    </select>
                </div>
            </div>
            <div class="form-group m-0 d-flex justify-content-between">
                <button class="btn filter-btn" type="submit" disabled><span class="ml-3">Filter</span></button>
                <div class="size-icons">
                    <img src="{{URL::asset('/images/icons/small.png')}}" id="icon-small" class="sizing-icons hidden" alt="Compact">
                    <img src="{{URL::asset('/images/icons/large.png')}}" id="icon-big" class="sizing-icons" alt="groot">
                    <img src="{{URL::asset('/images/icons/collapse.png')}}" id="icon-collapse" class="collapse-icon uncollapsed d-md-none" alt="groot">  
                </div>
            </div>
        </form>
    </div>
    <div class="d-block d-md-flex flex-wrap justify-content-between mt-4 w-100">
        @if ( count($rentoffers) > 0)
            @foreach ($rentoffers as $rentoffer)
            <div class="card w-30 mb-4">
                <img class="card-img-top" src="{{ URL::asset('storage/house_images/'. $rentoffer->img_urls[0]) }}" alt="Foto van huis">
                <div class="card-overlay d-flex justify-content-between align-items-center">
                    <span class="house-type">
                        {{ $rentoffer->type_house }}
                    </span>
                    <span class="mr-2">
                        @auth
                            @if( ! Auth::user()->hasFavorited($rentoffer->id))
                                <img src="{{URL::asset('/images/icons/heart-empty.png')}}" id="{{ $rentoffer->id }}" class="heart-icon">
                            @else
                                <img src="{{URL::asset('/images/icons/heart-full.png')}}" id="{{ $rentoffer->id }}" class="heart-icon">
                            @endif
                        @endauth
                    </span>
                </div>
                    
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons smaller">
                            <h5 class="card-title">{{ $rentoffer->province }}</h5>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons smaller">
                            <h5 class="card-title">€{{ $rentoffer->budget }}/mnd</h5>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons smaller">
                            <h5 class="card-title">{{ $rentoffer->housemates }}</h5>
                        </div>
                    </div>
                    <div class="text mt-2">
                        <p>{{ $rentoffer->title }}</p>
                    </div>
                    <div class="action-btn">
                        <a href="/cohousings/{{ $rentoffer->id }}" class="read-more-btn">Lees meer</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="p-3">
            <h4>Sorry, geen cohousings gevonden op basis van jouw filter</h4>
        </div>
        @endif
    </div>
</div>

<script type="text/javascript">


</script>


@endsection