@extends('layouts.app')

@section('content')
<div class="container p-2 p-md-0 mt-1 mt-md-5" id="offer-wrapper">
    <h1>Co-housings in de aanbieding</h1>
    <hr>

    <div class="row shadow-sm mt-4">
        <form action="{{ url('/') }}" method="post" class="w-100 p-3 ">
            <div class="d-md-flex justify-content-between">
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                        <p class="search-title">Regio</p>
                    </div>
                    <select class="form-control" name="region">
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
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                        <p class="search-title">Type huurwoning</p>
                    </div>
                    <select class="form-control" name="type_building">
                        <option>Eender</option>
                        <option>Appartement</option>
                        <option>Huis</option>
                        <option>Duplex</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                        <p class="search-title">Oppervlakte</p>
                    </div>
                    <select class="form-control" name="surface">
                        <option>Eender</option>
                        <option>10 - 20m²</option>
                        <option>20 - 30m²</option>
                        <option>30 - 40m²</option>
                        <option>40 - 50m²</option>
                        <option>> 50m²</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                        <p class="search-title">Aantal huisgenoten</p>
                    </div>
                    <select class="form-control" name="housemates">
                        <option>Eender</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>> 5</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                        <p class="search-title">Budget <small>(maandelijks)</small></p>
                    </div>
                    <select class="form-control" name="budget">
                        <option>Eender</option>
                        <option>€200-300</option>
                        <option>€300-400</option>
                        <option>€400-500</option>
                        <option>€500-600</option>
                        <option>> €600</option>
                    </select>
                </div>
            </div>
            <div class="form-group m-0">
                <button class="btn search-btn"><span class="ml-3">Filter</span></button>
            </div>
        </form>
    </div>

    <div class="d-block d-md-flex flex-wrap justify-content-between mt-4 w-100">
        @if ( count($rentoffers) > 0)
            @foreach ($rentoffers as $rentoffer)
            <div class="card w-49 mb-4">
                <img class="card-img-top" src="{{ URL::asset('storage/house_images/'. $rentoffer->img_urls[0]) }}" alt="Foto van huis">
                <div class="card-overlay d-flex justify-content-between align-items-center">
                    <span class="house-type">
                        {{ $rentoffer->type_house }}
                    </span>
                    <span class="mr-2">
                        @if( ! Auth::user()->hasFavorited($rentoffer->id))
                            <img src="{{URL::asset('/images/icons/heart-empty.png')}}" id="{{ $rentoffer->id }}" class="heart-icon">
                        @else
                            <img src="{{URL::asset('/images/icons/heart-full.png')}}" id="{{ $rentoffer->id }}" class="heart-icon">
                        @endif
                    </span>
                </div>
                    
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                            <h5 class="card-title">{{ $rentoffer->province }}</h5>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                            <h5 class="card-title">€{{ $rentoffer->budget }}/mnd</h5>
                        </div>
                        <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                            <h5 class="card-title">{{ $rentoffer->housemates }}</h5>
                        </div>
                    </div>
                    <div class="text">
                        <p>{{ $rentoffer->house_description }}</p>
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

    $(".heart-icon").click(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var id = $(this).attr('id');
   
        $.ajax({
            type:'POST',
            url: "/favorite",
            data:{ id:id },

            success:function(response) {
                const id = response[0];
                const isFavorited = response[1];
                
                if (isFavorited) {
                    $('#'+id).attr("src", "{{URL::asset('/images/icons/heart-full.png')}}")
                } else {
                    $('#'+id).attr("src", "{{URL::asset('/images/icons/heart-empty.png')}}")
                }
            }
        });
	});
</script>


@endsection