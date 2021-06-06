@extends('layouts.app')

@section('content')
<div class="container" id="co-house-detail-wrapper">
    <div class="row mt-2 mt-ml-2 ml-md-0 mt-md-5 d-flex justify-content-between w-100">
        <div class="d-flex">
            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
            <h4>{{ $house_details->province }}</h4>
        </div>
        <div class="mr-2">
            @auth
            @if( ! Auth::user()->hasFavorited($house_details->id))
            <img src="{{URL::asset('/images/icons/heart-empty.png')}}" id="{{ $house_details->id }}" class="mr-2 heart-icon">
            @else
            <img src="{{URL::asset('/images/icons/heart-full.png')}}" id="{{ $house_details->id }}" class="mr-2 heart-icon">
            @endif
            @endauth
        </div>
    </div>
    <!-- PREVIEW FOTOS -->
    <div class="row w-100" id="image-row">
        <div class="col-sm-12 col-md-12 col-lg-6 p-1">
            <div class="image-box pt-1" value="1">
                <img src="" alt="foto van huis" id="main-img" class="img-fluid carousel-thumbnail rounded">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-3 p-1 space-evenly">
            <div class="image-box" id="box1" value="2">
                <img src="" alt="foto van huis" class="img-fluid carousel-thumbnail presentation-img">
            </div>
            <div class="image-box" id="box2" value="3">
                <img src="" alt="foto van huis" id="kak" class="img-fluid carousel-thumbnail presentation-img pt-1">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-3 p-1 space-evenly">
            <div class="image-box" id="box3" value="4">
                <img src="" alt="foto van huis" class="img-fluid carousel-thumbnail presentation-img">
            </div>
            <div class="dark-overlay image-box" value="5">
                <img src="" alt="foto van huis" id="overlay-img" class="img-fluid carousel-thumbnail presentation-img pt-1">
                <div class="centered">
                    <span class="overlay-text">Nog <span id="pics-left"></span> foto's</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-end">
        <div class="d-flex align-items-center justify-content-end mt-2 pr-3">
            <img src="{{URL::asset('/images/icons/views-icon.png')}}" class="views-icon">
            <span class="ml-2">{{ $house_details->views }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="title-text mt-2">
                {{ $house_details->title }}
            </div>
            <div class="mt-4">
                <h4>Details voor huurder</h4>
            </div>
            <div class="specs mt-2 d-flex ">
                <div class="specs-column">
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                        <p class="search-title">{{ $house_details->street }}</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                        <p class="search-title">{{ $house_details->type_house }}</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                        <p class="search-title">{{ $house_details->surface }}m²</p>
                    </div>
                </div>
                <div class="mt-2 ml-5 specs-column">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                        <p class="search-title"> €{{ $house_details->budget }} <small>/ maand</small></p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                        <p class="search-title">{{ $house_details->housemates }} huisgenoten</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                        <p class="search-title">Beschikbaar vanaf: {{ $house_details->start_date }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h4>Introductie woning</h4>
                <div class="secription-text mt-2">
                    <p>{{ $house_details->house_description }}</p>
                </div>
            </div>
            <div class="mt-4">
                <h4>Introductie huisgenoten</h4>
                <div class="secription-text mt-2">
                    <p>{{ $house_details->housemates_description }}</p>
                </div>
            </div>
            <div class="mt-4">
                <h4>Voorzieningen in de woning</h4>
                <div class="mt-3 d-flex">
                    <div class="specs-column">
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/toilet.png')}}" class="search-icons">
                            <p class="search-title"> Eigen toilet: {{ $house_details->own_toilet }}</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/kitchen.png')}}" class="search-icons">
                            <p class="search-title"> Gedeelde keuken: {{ $house_details->shared_kitchen }}</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/shower.png')}}" class="search-icons">
                            <p class="search-title"> Eigen badkamer: {{ $house_details->own_bathroom }}</p>
                        </div>
                    </div>
                    <div class="ml-5 specs-column">
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/pets.png')}}" class="search-icons">
                            <p class="search-title"> Huisdieren mogelijk: {{ $house_details->pets }}</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/wash-machine.png')}}" class="search-icons">
                            <p class="search-title"> Wasmachine: {{ $house_details->washing_machine }}</p>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/wifi.png')}}" class="search-icons">
                            <p class="search-title"> Wi-Fi: {{ $house_details->wifi }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-5">
                <small>Zoekertje geplaatst op {{ $house_details->created_at }}</small>
            </div>
        </div>
        <div class="col-md-4">
            <!-- VERHUURDER BOX -->
            <div class="seller-box mt-2 p-2">
                <div class="user-avatar-section mt-3">
                    @if ( strlen( $poster_details->img_url) > 0)
                    <img class="user-avatar-post" src="{{ URL::asset('storage/user_images/'. $poster_details->img_url) }}" alt="Avatar">
                    @else
                    <small>Deze verhuurder heeft nog geen profielfoto</small>
                    @endif
                </div>
                <p class="user-name">
                <h5>{{ $poster->name }}</h5>
                <small class="very-small">Lid sinds {{$poster->created_at}} </small>
                </p>
                <p>
                    <button class="contact-btn">Contacteer verhuurder</button>
                </p>
            </div>
            <!-- GOOGLE MAP -->
            <div class="map-box mt-5 mb-5">
                <div id="map"></div>

                <div class="d-none" id="lat">{{$house_details->lat}}</div>
                <div class="d-none" id="long">{{$house_details->long}}</div>
            </div>
        </div>
    </div>

    <!-- Image carousel in modal-->
    <div class="modal fade" id="carousel-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content pb-1">
                <div class="modal-header d-flex justify-content-between">
                    <button type="button" class="close black" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Images come here with JS -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon prev-next-icon" value="prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon prev-next-icon" value="next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                    <span class="hidden" id="poster_id">{{ $poster->id }}</span>
                    <h4>Stuur een bericht naar {{ $poster->name }}</h4>
                    <x-contactModal class="mt-2 mb-2" />
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOI5IIhJ3yW2ZIApd_bq9K_xP9a7Q6vE0"></script>
    <script>
        // Get the javascript map and locations
        $(document).ready(function() {
            let map;
            initMap();

            function initMap() {
                var mapOptions = {
                    center: new google.maps.LatLng($('#lat').html(), $('#long').html()),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }

                map = new google.maps.Map(document.getElementById("map"), mapOptions);

                const marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat($('#lat').html()),
                        lng: parseFloat($('#long').html())
                    },
                    map: map,
                });
            }

        });
    </script>

    @endsection