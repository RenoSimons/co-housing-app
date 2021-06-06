<!-- Login modal -->
<div class="modal fade" id="edit-application-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="mb-0">Wijzig post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/pin.png')}}" class="search-icons">
                        <p class="search-title">Locatie</p>
                    </div>
                    <select class="form-control" name="location" id="edit-location">
                        <option {{ $post->location == 'Antwerpen' ? 'selected' : ''}}>Antwerpen</option>
                        <option {{ $post->location == 'Gent' ? 'selected' : ''}}>Gent</option>
                        <option {{ $post->location == 'Brugge' ? 'selected' : ''}}>Brugge</option>
                        <option {{ $post->location == 'Leuven' ? 'selected' : ''}}>Leuven</option>
                        <option {{ $post->location == 'Brussel' ? 'selected' : ''}}>Brussel</option>
                        <option {{ $post->location == 'Bergen' ? 'selected' : ''}}>Bergen</option>
                        <option {{ $post->location == 'Namen' ? 'selected' : ''}}>Namen</option>
                        <option {{ $post->location == 'Luik' ? 'selected' : ''}}>Luik</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/home.png')}}" class="search-icons">
                        <p class="search-title">Type huurwoning</p>
                    </div>
                    <select class="form-control" name="type_building" id="type_building">
                        <option {{ $post->type_house == 'Eender' ? 'selected' : '' }}>Eender</option>
                        <option {{ $post->type_house == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                        <option {{ $post->type_house == 'Huis' ? 'selected' : '' }}>Huis</option>
                        <option {{ $post->type_house == 'Duplex' ? 'selected' : '' }}>Duplex</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/sex.png')}}" class="search-icons">
                        <p class="search-title">Geslacht</p>
                    </div>
                    <select class="form-control" name="gender" id="edit-gender">
                        <option {{ $post->gender == 'Man' ? 'selected' : '' }}>Man</option>
                        <option {{ $post->gender == 'Vrouw' ? 'selected' : '' }}>Vrouw</option>
                        <option {{ $post->gender == 'X' ? 'selected' : '' }}>X</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/wallet-filled-money-tool.png')}}" class="search-icons">
                        <p class="search-title">Budget <small>(maandelijks)</small></p>
                    </div>
                    <select class="form-control" name="budget" id="edit-budget">
                        <option {{ $post->budget == 'Eender' ? 'selected' : ''}}>Eender</option>
                        <option {{ $post->budget == '€200-300' ? 'selected' : ''}}>€200-300</option>
                        <option {{ $post->budget == '€300-400' ? 'selected' : ''}}>€300-400</option>
                        <option {{ $post->budget == '€400-500' ? 'selected' : ''}}>€400-500</option>
                        <option {{ $post->budget == '€500-600' ? 'selected' : ''}}>€500-600</option>
                        <option {{ $post->budget == '>€600' ? 'selected' : ''}}>€600</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/age-group.png')}}" class="search-icons">
                        <p class="search-title">Leeftijd</p>
                    </div>
                    <input type="number" id="age-input-edit-application" name="age" class="form-control" value="{{ $post->age }}" required>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center">
                        <img src="{{URL::asset('/images/icons/calendar.png')}}" class="search-icons">
                        <p class="search-title">Intrekdatum</p>
                    </div>
                    <input autocomplete="off" id="date-input-edit-application" class="date form-control" value="{{ $post->start_date }}" name="start_date" type="text" required>
                </div>
                <div>
                    <textarea class="form-control" name="intro" rows="10" id="edit-intro" required>{{ $post->intro }}</textarea>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <span class="save-btn2" id="save-edit-application">Opslaan</span>
            </div>
        </div>
    </div>
</div>