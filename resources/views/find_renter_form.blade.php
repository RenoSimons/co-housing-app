@extends('layouts.app')

@section('content')
<div class="row mt-3 p-3">
    <div class="container">
        <h1>Plaats een zoekertje en vind je geschikte co-house partner</h1>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-4">
            <form action="{{ url('/publish') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('POST') }}
                <h4 class="mb-2">Titel van je zoekertje</h4>
                <input type="text" name="title" placeholder="titel" class="form-control" required>

                <h4 class="mb-2 mt-4">Specificaties woning die je ter verhuur stelt</h4>
                <div class="d-md-flex">
                    <div class="col-sm-12 col-md-6">
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
                                <img src="{{URL::asset('/images/icons/location.png')}}" class="search-icons">
                                <p class="search-title">Gemeente</p>
                            </div>
                            <input type="text" name="city" placeholder="Borgerhout" class="form-control" required>
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
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                                <p class="search-title">Oppervlakte <small>m²</small></p>
                            </div>
                            <input type="number" name="surface" placeholder="m²" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                <p class="search-title">Prijs <small>(maandelijks in €)</small></p>
                            </div>
                            <input type="number" name="budget" placeholder="€" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                                <p class="search-title">Aantal huisgenoten</p>
                            </div>
                            <select class="form-control" name="housemates">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">Startdatum verhuur</h4>
                <div class="form-group w-50 w-md-25">
                    <input class="date form-control" name="start_date" type="text">
                </div>
                
                <h4 class="mt-4">Korte beschrijving van de woonplaats</h4>
                <div class="form-outline w-100">
                    <textarea class="form-control" name="description_house" id="intro-form" rows="6"></textarea>   
                </div>

                <h4 class="mt-4">Korte beschrijving van de huisgenoten</h4>
                <div class="form-outline w-100">
                    <textarea class="form-control" name="description_mates" id="intro-form" rows="6"></textarea>   
                </div>

                <h4 class="mt-4">Voeg foto's van de kamer en woning toe</h4>
                <div class="input-group mt-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="gallery-photo-add" accept="image/*" multiple="multiple" name="photos[]" type="file" class="form-control border-0 hidden">
                    <label id="upload-label" for="gallery-photo-add" class="font-weight-light text-muted"> </label>
                    <div class="input-group-append d-flex align-content-center">
                        <label for="gallery-photo-add" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Open bestanden</small></label>
                    </div>
                </div>

                <div id="error-msg" class="mt-4 hidden alert alert-danger">
                    
                </div>

                <div class="gallery mt-2 d-flex flex-wrap justify-content-center">
                    
                </div>
                
                <button type="submit" class='btn save-btn mt-3'>Publiceer</button>
            </form>
        </div>
    </div>
</div>


<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    
    $(function() {
        
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    if(i >= 10) {
                        logErrorMessage('Maximum aantal van 10 is bereikt');
                        break;
                    }

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr({
                            'src': event.target.result, 
                            'class': 'img-fluid rounded ml-1 mt-1',
                            'id': i})
                        .appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });

    function logErrorMessage(msg) {
        $('#error-msg').removeClass('hidden');
        $('#error-msg').html(msg);
    }

    $('.date').datepicker({  
       format: 'dd-mm-yyyy'
    });  

</script>


@endsection