@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Vind personen die zich kandidaat stellen om te co-housen</h1>
        <hr>
    </div>
    <div class="container d-md-flex p-0 mt-md-5 p-md-3">
        <div class="col-md-4 mt-2 mb-4 mb-md-0 mt-md-0">
            <div class="filters shadow-sm rounded p-3">
                <h4>Filter personen</h4>
                <hr>
                <form action="{{ url('/personen/filter') }}" method="post" class="mt-3">
                    @csrf
                    {{ method_field('POST') }}

                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                            <p class="search-title">Regio</p>
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

                    <div class="form-group"> 
                        <button class="btn search-btn w-100 mt-3"><span class="ml-3">Zoek</span></button> 
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            @if ( count($applications) > 0)
                @foreach ($applications as $application)
                    <div class="application-card shadow-sm rounded d-md-flex mb-4 p-3">
                        <div class="col-md-4">
                            <img class="img-fluid" src="https://picsum.photos/400" alt="">
                        </div>
                        <div class="col-md-8">
                            <h4 class="m-2">User title here</h4>

                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                                    <span>{{ $application->location }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                                    <span>{{ $application->type_house }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                                    <span>{{ $application->surface }}</span>
                                </div>   
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                                    <span>{{ $application->housemates }} pers.</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <span>{{ $application->budget }}</span>
                                </div>
                                <div class="d-flex">
                                    <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                                    <span>{{ $application->start_date }}</span>
                                </div>    
                            </div>
                            
                            <p>{{ $application->intro }}</p>

                            <div class="action-btns d-flex justify-content-between">
                                <button class="save-btn">Bekijk profiel</button>
                                <button class="save-btn">Contacteer</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="p-3">
                <h4>Sorry, geen personen gevonden op basis van jouw filter</h4>
            </div>    
            @endif
        </div>
    </div>
@endsection