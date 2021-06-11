@extends('layouts.app')

@section('content')
<div class="row mt-3 p-3">
    <div class="container">
        <h1>Stel jezelf voor als potentiële huurder</h1>
        <hr>

        @if ($user_has_application == null)
        <h4>Vul onderstaande informatie in om in contact te komen met de persoon die een plek heeft op basis van jouw benodigdheden</h4>

        <div class="mt-4">
            <form action="{{ url('/publishpost') }}" method="post" enctype="multipart/form-data">
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
                                <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                                <p class="search-title">Geslacht</p>
                            </div>
                            <select class="form-control" name="gender">
                                <option>Man</option>
                                <option>Vrouw</option>
                                <option>X</option>
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
                                <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                                <p class="search-title">Leeftijd</p>
                            </div>
                            <input type="number" name="age" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                                <p class="search-title">Intrekdatum</p>
                            </div>
                            <input autocomplete="off" class="date form-control" name="start_date" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="row p-3 mt-4">
                    <h4 class="header-dark p-2 mb-0 w-100">Schrijf een aantrekkelijke intro tekst over jezelf waarin je jezelf voorstelt als huurder</h4>
                    <textarea class="form-control" name="intro" rows="10" required></textarea>
                </div>

                <div class="p-3 mt-4">
                    <h4 class="header-dark p-2 mb-2 rounded">Upload een foto van jezelf</h4>
                    <!-- Uploaded image area-->
                    <div class="w-50">
                        <div class="image-area mt-2">
                            <img id="output" src="{{URL::asset('/images/upload_img.png')}}" alt="empty image" class="img-fluid rounded shadow-sm mx-auto d-block">
                        </div>
                        <!-- Upload image input-->
                        <div class="input-group mt-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" accept="image/*" name="file" onchange="loadFile(event)" class="form-control d-none border-0" required>
                            <label id="upload-label" for="upload" class="font-weight-light text-muted d-none">Open bestand...</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4 dark-pill"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small>Open bestand</small></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class='btn save-btn mt-3' type="submit">Publiceer applicatie</button>
                </div>
            </form>
        </div>
        @else
        <div class="">
            <h4>Sorry, maximum 1 voorstel per persoon is mogelijk</h4>
            <p>Ga naar 'Mijn account' onder posts en pas je voorgaande post aan.</p>
            <a href="{{ route('myapplications') }}" class="read-more-btn mt-4">Ga naar mijn posts</a>
        </div>
        @endif
    </div>
</div>

<script>
    $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });

    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
        $('#save-image').removeAttr("disabled");
    };
</script>

@endsection