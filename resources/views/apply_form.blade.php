@extends('layouts.app')

@section('content')
<div class="row mt-3 p-3">
    <div class="container">
        <h1>Stel jezelf voor als potentiële huurder</h1>
        <h4>Vul onderstaande informatie in om in contact te komen met de juiste persoon die een plek heeft op basis van jouw benodigdheden</h4>
        
        <div class="mt-4">
            <form action="{{ url('/publish') }}" method="post">
                @csrf
                {{ method_field('POST') }}
                <div class="d-md-flex">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                <p class="search-title">Locatie</p>
                            </div>
                            <select class="form-control" name="location">
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
                    </div>

                    <div class="col-sm-12 col-md-6">
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
                    </div>
                </div>

                <div class="row p-3 mt-4">
                    <h4>Schrijf een aantrekkelijke intro tekst over jezelf waarin je jezelf voorstelt als huurder</h4>
                    <textarea class="form-control" name="intro" rows="10" required>{{ $user_details->intro_text }}</textarea>

                    <div>
                        <button  id="save-status" class='btn save-btn mt-3' type="submit">Publiceer applicatie</button>
                    </div>
                </div>


               
            </form>

        </div>   
    </div>  
</div>

@endsection