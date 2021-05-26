@extends('layouts.app')

@section('content')
<div class="container" id="co-house-detail-wrapper">
    <div class="row mt-2 mt-ml-2 ml-md-0 mt-md-5">
        <div class="d-flex">
            <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
            <h4>{{ $house_details->province }}</h4>
        </div>
    </div>
    <!-- Preview Images -->
    <div class="row w-100" id="image-row">
        <div class="col-sm-12 col-md-12 col-lg-6 p-1">
            <div class="image-box pt-1">
                <img src="" alt="foto van huis" id="main-img" class="img-fluid rounded">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-3 p-1 space-evenly">
            <div class="image-box" id="box1">
                <img src="" alt="foto van huis" class="img-fluid presentation-img">
            </div>
            <div class="image-box" id="box2">
                <img src="" alt="foto van huis" id="kak" class="img-fluid presentation-img pt-1">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-3 p-1 space-evenly">
            <div class="image-box" id="box3">
                <img src="" alt="foto van huis" class="img-fluid presentation-img">
            </div>
            <div class="dark-overlay image-box">
                <img src="" alt="foto van huis" id="overlay-img" class="img-fluid presentation-img pt-1">
                <div class="centered">
                    <span class="overlay-text">Nog <span id="pics-left"></span> foto's</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Image carousel in modal-->
    <div class="modal fade" id="carousel-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <!-- Images come here with JS -->
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carousel-modal">
    Launch demo modal
    </button>

</div>

<script>

</script>

@endsection