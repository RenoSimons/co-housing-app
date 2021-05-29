@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 p-0">
    <div class="row d-flex landing-section">
        <div class="col-md-12 col-lg-6 left-column">
            <div class="row">
                <div class="search-card">
                    <form action="{{ url('/cohousings/filterhouses') }}" method="GET" class="search-form mt-5 mb-5">
                        {{ method_field('GET') }}
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <p class="search-title">Locatie</p>
                                </div>
                                <select class="form-control" name="region">
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <p class="search-title">Budget</p>
                                </div>
                                <select class="form-control" name="budget">
                                    <option>Eender</option>
                                    <option>€300-400</option>
                                    <option>€400-500</option>
                                    <option>€500-600</option>
                                    <option>> €600</option>
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

                            <div class="form-group mt-1">
                                <button class="btn search-btn"><span class="ml-3">Zoek</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 left-column">
            <div class="row">
                <!-- empty column -->
            </div>
        </div>
        <div class="scroll-down d-flex justify-content-center w-100">
            <img src="{{URL::asset('/images/icons/scroll-down.png')}}" id="scroll-icon" alt="scroll naar beneden" class="scroll-img">
        </div>
    </div>
</div>

<div class="container p-0 second-section">
    <div class="row d-flex justify-content-between mt-5">
        <div class="col-md-3 promo-card text-center pt-4">
            <div class="promo-logo">
                <img src="{{URL::asset('/images/icons/search-location.png')}}" alt="" class="promo-logo-img">
            </div>
            <div class="mt-3">
                <h4 class="white">Vind op locatie</h4>
            </div>
            <div class="mt-3">
                <p class="white">
                    Vind jouw geschike co-house familie. Gebruik de filters om de juiste locatie in te stellen en ga aan de slag!
                </p>
            </div>
            <div class="mt-3 mb-3">
                <button class="btn cta-white">Vind huis</button>
            </div>
        </div>
        <div class="col-md-3 promo-card text-center pt-4">
            <div class="promo-logo">
                <img src="{{URL::asset('/images/icons/knowledge.png')}}" alt="" class="promo-logo-img">
            </div>
            <div class="mt-3">
                <h4 class="white">Bied aan</h4>
            </div>
            <div class="mt-3">
                <p class="white">
                    Op zoek naar een nieuwe housemate? Plaats een zoekertje en kom met de geschikte persoon in contact!
                </p>
            </div>
            <div class="mt-3 mb-3">
                <button class="btn cta-white">Vind housemate</button>
            </div>
        </div>
        <div class="col-md-3 promo-card text-center pt-4">
            <div class="promo-logo">
                <img src="{{URL::asset('/images/icons/network.png')}}" alt="" class="promo-logo-img">
            </div>
            <div class="mt-3">
                <h4 class="white">Connecteer</h4>
            </div>
            <div class="mt-3">
                <p class="white">
                    Ons platform connecteert alle mensen die actief zijn om te co-housen! Vind en connecteer met mensen.
                </p>
            </div>
            <div class="mt-3 mb-3">
                <button class="btn cta-white">Leg connecties</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row d-flex third-section justify-content-center">
        <div class="make-account-box">
            <a href="/register" class="text-decoration-none">
                <h4 class="white m-0">Maak een account</h4>
            </a>
        </div>
        <div class="make-account-text d-flex">
            <span class="arrows-left white ml-3">
                < < </span>
                    <span class="arrows-text font-italic white ml-3">
                        Maak een account en ga aan de slag
                    </span>
        </div>
        <div id="particles-js"></div>
    </div>
</div>

<div class="container fifth-section mt-5 mb-5 p-0">
    <div id="map-frontpage">

    </div>
</div>

<div class="container mt-5 fourth-section p-0">
    <div class="d-flex align-center">
        <img src="{{URL::asset('/images/icons/stats.png')}}" alt="statistieken" class="stat-icon">
        <h2 class="mb-0 ml-4">Statistieken</h2>
    </div>
    <div class="d-flex justify-content-between mt-4">
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/users.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white m-0 ml-md-3">200 gebruikers</h4>
            </div>
        </div>
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/house.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white m-0 ml-md-3">154 huizen</h4>
            </div>
        </div>
        <div class="d-flex stat-row">
            <div class="stat-card p-3 d-flex align-center">
                <img src="{{URL::asset('/images/icons/speech-bubble.png')}}" alt="gebruikers logo" class="stats-logo-img">
                <h4 class="white m-0 ml-md-3">150 connecties</h4>
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
                center: new google.maps.LatLng(50.8465573, 4.351697),
                zoom: 8,
                mapId: 'dark'
            }

            map = new google.maps.Map(document.getElementById("map-frontpage"), mapOptions);
        }

        // Google map
        let coordinates = [];

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: "/getcoordinates",

            success: function(response) {
                coordinates = response;

                coordinates.forEach(function(coordinates) {
                    const marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(coordinates.lat),
                            lng: parseFloat(coordinates.long)
                        },
                        icon: 'http://localhost:8000/images/icons/marker-logo.png',
                        map: map,
                    });
                    marker.addListener("click", () => {
                        $.ajax({
                            type: 'POST',
                            url: "/getmarkerdata",
                            data: {
                                id: coordinates.id
                            },

                            success: function(response) {
                                let urlString = "http://" + window.location.host + "/storage/house_images/";
                                let imagesArray = [];
                                let images = JSON.stringify(response[0])
                                let imageString = images.split(',');

                                imageString.forEach(function(item, index) {
                                    let newString = item.replace(/\\/g, '').replace('{"img_urls":"[', '').replace(']"}', '').replace('"', '');
                                    imagesArray.push(newString);
                                })

                                let street = response[1][0].street;
                                let budget = response[1][0].budget;
                                let housemates = response[1][0].housemates;
                                let start_date = response[1][0].start_date;
                                let type_house = response[1][0].type_house;
                                let title = response[1][0].title;
                                let id = response[1][0].id;

                                const contentString =
                                    `<div class="info-window">
                                        <div class="title d-flex justify-content-between">
                                            <div class="d-flex align-items-center mt-2 mr-2">
                                                <img src="{{URL::asset('/images/icons/pin.png')}}" class="info-window-icons">
                                                <p class="search-title mb-0 ml-2">${street}</p>
                                            </div>
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="info-window-icons">
                                                <p class="search-title mb-0 ml-2">€${budget}/mnd</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2 mb-2">
                                            <div class="info-window-images">
                                                <img src="${urlString + imagesArray[0].replace('[', '')}" class="info-window-img" alt="foto van huis">
                                            </div>
                                            <div class="info-window-text ml-2">
                                                <p>${title}</p>
                                                <p><small>Intrekdatum: ${start_date}</small></p>
                                                <a href="/cohousings/${id}" class="info-window-cta">Meer info</a>
                                            </div>
                                        </div>
                                    </div>`


                                const infowindow = new google.maps.InfoWindow({
                                    content: contentString,
                                });

                                infowindow.open(map, marker);
                            }
                        });
                    })
                })
            }
        });
    });
</script>

@endsection