<!-- Offer house modal -->
<div class="modal fade edit-house-offer-modal" id="edit-house-offer-modal{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="mb-0">Wijzig post</h4>
                <span class="hidden postIdSelector" id="post{{$offer->id}}"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="mb-2 search-title">Titel van je zoekertje</p>
                    <input type="text" name="title" class="form-control" id="intro-form1-{{$offer->id}}" value="{{$offer->title}}" maxlength="200">
                    <small id="chars-left1"></small>
                </div>
                <div class="form-group">
                    <p class="mb-2 search-title">Korte beschrijving van de woonplaats</p>
                    <textarea name="description_house" class="form-control" id="intro-form2-{{$offer->id}}" maxlength="500" rows="6">{{$offer->house_description}}</textarea>
                    <small id="chars-left2"></small>
                </div>
                <div class="form-group">
                    <p class="mb-2 search-title">Korte beschrijving van de huisgenoten</p>
                    <textarea class="form-control" name="description_mates" id="intro-form3-{{$offer->id}}" rows="6" maxlength="500">{{$offer->housemates_description}}</textarea>
                    <small id="chars-left3"></small>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                        <p class="search-title">Regio</p>
                    </div>
                    <select class="form-control fc1" name="location" id="edit-location">
                        <option {{ $offer->province == 'Antwerpen' ? 'selected' : ''}}>Antwerpen</option>
                        <option {{ $offer->province == 'Gent' ? 'selected' : ''}}>Gent</option>
                        <option {{ $offer->province == 'Brugge' ? 'selected' : ''}}>Brugge</option>
                        <option {{ $offer->province == 'Leuven' ? 'selected' : ''}}>Leuven</option>
                        <option {{ $offer->province == 'Brussel' ? 'selected' : ''}}>Brussel</option>
                        <option {{ $offer->province == 'Bergen' ? 'selected' : ''}}>Bergen</option>
                        <option {{ $offer->province == 'Namen' ? 'selected' : ''}}>Namen</option>
                        <option {{ $offer->province == 'Luik' ? 'selected' : ''}}>Luik</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/location.png')}}" class="search-icons">
                        <p class="search-title">Straatnaam</p>
                    </div>
                    <input type="text" name="street" id="city-field{{$offer->id}}" value="{{ $offer->street }}" class="form-control" required>
                    <input type="hidden" name="lat" id="latitude_input{{$offer->id}}" value="{{$offer->lat}}"/>
                    <input type="hidden" name="long" id="longitude_input{{$offer->id}}" value="{{$offer->long}}"/>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                        <p class="search-title">Type huurwoning</p>
                    </div>
                    <select class="form-control fc8" name="type_building" id="type_building">
                        <option {{ $offer->type_house == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                        <option {{ $offer->type_house == 'Huis' ? 'selected' : '' }}>Huis</option>
                        <option {{ $offer->type_house == 'Duplex' ? 'selected' : '' }}>Duplex</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/measuring-tape.png')}}" class="search-icons">
                        <p class="search-title">Oppervlakte <small>m²</small></p>
                    </div>
                    <input type="number" name="surface" id="surface-field" value="{{$offer->surface}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                        <p class="search-title">Prijs <small>(maandelijks in €)</small></p>
                    </div>
                    <input type="number" name="budget" id="budget-field" value="{{$offer->budget}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/multiple-users-silhouette.png')}}" class="search-icons">
                        <p class="search-title">Aantal huisgenoten</p>
                    </div>
                    <select class="form-control fc2" name="housemates">
                        <option {{ $offer->housemates == '1' ? 'selected' : '' }}>1</option>
                        <option {{ $offer->housemates == '2' ? 'selected' : '' }}>2</option>
                        <option {{ $offer->housemates == '3' ? 'selected' : '' }}>3</option>
                        <option {{ $offer->housemates == '4' ? 'selected' : '' }}>4</option>
                        <option {{ $offer->housemates == '5' ? 'selected' : '' }}>5</option>
                        <option {{ $offer->housemates == '6' ? 'selected' : '' }}>6</option>
                        <option {{ $offer->housemates == '7' ? 'selected' : '' }}>7</option>
                        <option {{ $offer->housemates == '8' ? 'selected' : '' }}>8</option>
                        <option {{ $offer->housemates == '9' ? 'selected' : '' }}>9</option>
                        <option {{ $offer->housemates == '10' ? 'selected' : '' }}>10</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/toilet.png')}}" class="search-icons">
                        <p class="search-title">Eigen toilet</p>
                    </div>
                    <select class="form-control fc3" name="toilet">
                        <option {{ $offer->own_toilet == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->own_toilet == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/kitchen.png')}}" class="search-icons">
                        <p class="search-title">Gedeelde keuken</p>
                    </div>
                    <select class="form-control fc4" name="kitchen">
                        <option {{ $offer->shared_kitchen == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->shared_kitchen == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/shower.png')}}" class="search-icons">
                        <p class="search-title">Eigen badkamer</p>
                    </div>
                    <select class="form-control fc5" name="own_bathroom">
                        <option {{ $offer->own_bathroom == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->own_bathroom == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/pets.png')}}" class="search-icons">
                        <p class="search-title">Huisdieren</p>
                    </div>
                    <select class="form-control fc5" name="pets">
                        <option {{ $offer->pets == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->pets == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wash-machine.png')}}" class="search-icons">
                        <p class="search-title">Wasmachine</p>
                    </div>
                    <select class="form-control fc6" name="washing_machine">
                        <option {{ $offer->washing_machine == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->washing_machine == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wifi.png')}}" class="search-icons">
                        <p class="search-title">Wi-Fi</p>
                    </div>
                    <select class="form-control fc7" name="wifi">
                        <option {{ $offer->wifi == 'Ja' ? 'selected' : '' }}>Ja</option>
                        <option {{ $offer->wifi == 'Nee' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                        <p class="search-title">Intrekdatum</p>
                    </div>
                    <input autocomplete="off" id="date-input-edit-application{{$offer->id}}" class="date form-control" value="{{ $offer->start_date }}" name="start_date" type="text" required>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <span class="save-btn2" id="save-btn-{{$offer->id}}">Opslaan</span>
            </div>
        </div>
    </div>
</div>

