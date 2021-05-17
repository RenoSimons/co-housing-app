@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 p-0">
    <div class="row d-flex landing-section">
        <div class="col-md-12 col-lg-6 left-column">
            <div class="row">
                <div class="search-card">
                    <form class="search-form mt-5 mb-5">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <p class="search-title">Locatie</p>
                                </div>
                                <select class="form-control">
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
                                <select class="form-control">
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
                                <select class="form-control">
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
                                <select class="form-control">
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
                                <select class="form-control">
                                    <option>Eender</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>> 5</option>
                                </select>
                            </div>

                            <div class="form-group ">
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
    </div>
</div>

<div class="container-fluid vh-100 p-0">
    <div class="row d-flex second-section">

    </div>
</div>

<div class="container p-0" id="cities">
    <div class="row">
        <h2 class="p-3 pt-4">Vind een woning in één van onderstaande steden</h2>
    </div>
    
    <div class="row">
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Antwerpen</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/antwerpen.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Gent</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/gent.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Brugge</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/brugge.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Leuven</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/leuven.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Brussel</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/brussel.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
        <div class="col-md-6 city-card">
            <a href="" class="hover-img">
                <div class="img-overlay">
                    <span class="overlay-title">Luik</span>
                </div>
                <div class="city-img">
                    <img src="{{URL::asset('/images/luik.jpg')}}" class="city-img">
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
