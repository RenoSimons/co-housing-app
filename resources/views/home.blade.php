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
    </div>
</div>

<div class="container p-5">
    <div class="row d-flex justify-content-space-between mt-5">
        <div class="promo-card">
            <div class="promo-logo">
                <img src="{{URL::asset('/images/icons/search-location.png')}}" alt="" class="promo-logo-img">
            </div>
        </div>
        <div class="promo-card">
            <div class="promo-logo">
            <img src="{{URL::asset('/images/icons/network.png')}}" alt="" class="promo-logo-img">
            </div>
        </div>
        <div class="promo-card">
            <div class="promo-logo">
                <img src="{{URL::asset('/images/icons/knowledge.png')}}" alt="" class="promo-logo-img">
            </div>
        </div>
    </div>
</div>
@endsection