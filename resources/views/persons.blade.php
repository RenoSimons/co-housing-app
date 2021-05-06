@extends('layouts.app')

@section('content')
    <div class="container d-md-flex mt-5 p-3">
        <div class="col-md-4">
            <div class="filters">
                cdcdc
            </div>
        </div>
        <div class="col-md-8">
            @foreach ($applications as $application)
                <div class="application-card d-flex mb-md-4">
                    <div class="col-4">
                        <img class="img-fluid" src="https://picsum.photos/400" alt="">
                    </div>
                    <div class="col-8">
                        <h4>User title here</h4>
                        <div class="d-flex justify-content-between">
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
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                <span>{{ $application->budget }}</span>
                            </div>
                            <div class="d-flex">
                            <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                                <span>{{ $application->housemates }}</span>
                            </div>
                        </div>
                        
                        <p>{{ $application->intro }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection