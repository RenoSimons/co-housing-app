@extends('layouts.app')

@section('content')
<div class="row mt-3 p-3">
    <div class="container">
        <h1>Plaats een zoekertje en vind je geschikte co-house partner</h1>
        <hr>

        <div class="progress-indicator d-flex justify-content-center mt-5">
            <div class="progress-element">
                <div class="circle dark font-weight-bold">1</div>
                <span class="progress-title">Beschrijving</span>
            </div>
            <div class="progress-element">
                <div class="circle light font-weight-bold" id="circle2">2</div>
                <span class="progress-title">Specificaties</span>
            </div>
            <div class="progress-element">
                <div class="circle light font-weight-bold" id="circle3">3</div>
                <span class="progress-title">Foto's</span>
            </div>
        </div>

        <div class="mt-5">
            <form action="{{ url('/publish') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('POST') }}
                <div id="section1">
                    <h4 class="header-dark p-2 mb-0">Titel van je zoekertje</h4>
                    <input type="text" name="title" class="form-control" id="intro-form1" required maxlength="200">
                    <small id="chars-left1"></small>

                    <h4 class="mt-4 header-dark p-2 mb-0">Korte beschrijving van de woonplaats</h4>
                    <div class="form-outline w-100">
                        <textarea class="form-control" name="description_house" id="intro-form2" required maxlength="500" rows="6"></textarea>
                    </div>
                    <small id="chars-left2"></small>

                    <h4 class="mt-4 header-dark p-2 mb-0">Korte beschrijving van de huisgenoten</h4>
                    <div class="form-outline w-100">
                        <textarea class="form-control" name="description_mates" id="intro-form3" rows="6" maxlength="500"></textarea>
                    </div>
                    <small id="chars-left3"></small>
                </div>

                <div id="section2" class="hidden">
                    <h4 class="mb-4 mt-4 header-dark p-2 mb-0">Specificaties woning</h4>
                    <div class="d-md-flex mt-2">
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
                                    <p class="search-title">Straatnaam</p>
                                </div>
                                <input type="text" name="street" id="city-field" class="form-control" required>
                                <input type="hidden" name="lat" id="latitude_input" />
                                <input type="hidden" name="long" id="longitude_input" />
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
                                <input type="number" name="surface" id="surface-field" placeholder="m²" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                                    <p class="search-title">Prijs <small>(maandelijks in €)</small></p>
                                </div>
                                <input type="number" name="budget" id="budget-field" placeholder="€" class="form-control" required>
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
                    <h4 class="mb-4 mt-4 header-dark p-2 mb-0">Extra opties</h4>
                    <div class="d-md-flex mt-2">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/toilet.png')}}" class="search-icons">
                                    <p class="search-title">Eigen toilet</p>
                                </div>
                                <select class="form-control" name="toilet">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/kitchen.png')}}" class="search-icons">
                                    <p class="search-title">Gedeelde keuken</p>
                                </div>
                                <select class="form-control" name="kitchen">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/shower.png')}}" class="search-icons">
                                    <p class="search-title">Eigen badkamer</p>
                                </div>
                                <select class="form-control" name="own_bathroom">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/pets.png')}}" class="search-icons">
                                    <p class="search-title">Huisdieren</p>
                                </div>
                                <select class="form-control" name="pets">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wash-machine.png')}}" class="search-icons">
                                    <p class="search-title">Wasmachine</p>
                                </div>
                                <select class="form-control" name="washing_machine">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <img src="{{URL::asset('/images/icons/wifi.png')}}" class="search-icons">
                                    <p class="search-title">Wi-Fi</p>
                                </div>
                                <select class="form-control" name="wifi">
                                    <option>Ja</option>
                                    <option>Nee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4 header-dark p-2 mb-0">Startdatum verhuur</h4>
                    <div class="form-group w-50 w-md-25">
                        <input autocomplete="off" class="date form-control" name="start_date" id="date-field" type="text">
                    </div>
                </div>
                <div id="section3" class="hidden">
                    <h4 class="mt-4 header-dark p-2 mb-4">Voeg foto's van de kamer en woning toe</h4>
                    <div class="input-group mt-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="gallery-photo-add" accept="image/*" multiple="multiple" name="photos[]" type="file" class="form-control border-0 hidden">
                        <label id="upload-label" for="gallery-photo-add" class="font-weight-light text-muted"> </label>
                        <div class="input-group-append d-flex align-content-center">
                            <label for="gallery-photo-add" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Open bestanden</small></label>
                        </div>
                    </div>

                    <div class="gallery mt-2 d-flex flex-wrap justify-content-center">

                    </div>
                </div>
                <div class="mt-3">
                    <a class='btn save-btn mt-3 hidden mr-3' id="b1">Vorige</a>
                    <a class='btn save-btn mt-3' id="b2">Volgende</a>
                    <a class='btn save-btn mt-3 hidden' id="b21">Volgende</a>
                    <button type="submit" class='btn save-btn mt-3 hidden' id="b3">Publiceer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<!-- MAPS LOCATION PICKER -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAehWThfsI8HCI_LASIJkA3gJ-qED15i5E"></script>


<script type="text/javascript">
    //Google maps
    var searchInput = 'city-field';
    $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
            componentRestrictions: {
                country: "BE"
            }
        });
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();
            document.getElementById('latitude_input').value = near_place.geometry.location.lat();
            document.getElementById('longitude_input').value = near_place.geometry.location.lng();
        });
    });

    $(document).on('change', '#'+searchInput, function () {
        document.getElementById('latitude_input').value = '';
        document.getElementById('longitude_input').value = '';
    });
    
    // Multiple images preview in browser   
    $(function() {
        let imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    if (i >= 10) {
                        logErrorMessage('Maximum aantal van 10 is bereikt');
                        break;
                    }

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr({
                                'src': event.target.result,
                                'class': 'img-fluid rounded ml-1 mt-1',
                                'id': i
                            })
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

    // Datepicker
    $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>


@endsection