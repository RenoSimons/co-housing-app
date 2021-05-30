@extends('layouts.app')

@section('content')
<div class="container mt-5" id="favorites">
    <div class="row d-flex justify-content-around">
        <div class="col-md-3">
            <x-accountNavigation />
        </div>
        <div class="col-md-9" id="favorite-section">
            @if(count($favorites) > 1)
                @foreach ($favorites as $key => $array)
                    @foreach ($array as $favorite)
                    <div class="favorite-card mb-5" id="favorite{{$key}}">
                        <div class="favorite-card-header d-flex justify-content-between p-3">
                            <div class="d-flex align-items-center mt-2">
                                <img src="{{URL::asset('/images/icons/pin-white.png')}}" class="search-icons">
                                <p class="search-title">{{ $favorite->street }}</p>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                            <img src="{{URL::asset('/images/icons/calendar-white.png')}}" class="search-icons">
                            <p class="search-title">{{ $favorite->start_date }}</p>
                        </div>
                            
                        </div>
                        <div class="favorite-card-body p-3">
                            <p>{{ $favorite->title}}</p>
                        </div>
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-content-middle">
                                <a href="" class="read-more-btn">Bekijk zoekertje</a>
                                <img src="{{URL::asset('/images/icons/garbage-can.png')}}" id="{{$favorite_ids[$key]}}" class="garbage-icon">
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            @else
            <div>
                <h1>Nog geen favorieten toegevoegd</h1>
            </div>
            @endif 
        </div>
    </div>
</div>
@endsection