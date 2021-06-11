@extends('layouts.app')

@section('content')
<div class="container-fluid-md container-lg mt-2 mt-md-5" id="change-profile">
    <div class="row d-flex justify-content-around">
        <div class="col-md-3">
            <x-accountNavigation />
        </div>
        <div class="col-md-9 mt-5 mt-md-0" id="change-profile-section">
            <div class="d-flex justify-content-between align-center">
                <h1 class="mb-0">Profiel details</h1>
                <div id="toggle-profile">
                    @if ( $user_details->is_private == 0)
                        <input type="checkbox" checked data-toggle="toggle" data-on="Publiek" data-off="Privé" data-onstyle="success" data-offstyle="danger">
                    @else
                        <input type="checkbox" data-toggle="toggle" data-on="Publiek" data-off="Privé" data-onstyle="success" data-offstyle="danger">
                    @endif
                </div>
            </div>
            
            <hr>
            <h4>Vervolledig je profiel om later snellere applicaties te kunnen doen</h4>
            <small class="form-text text-muted">Het vervolledigen van uw account is niet verplicht maar optioneel. Het verhoogt echter de slaagkans van sollicitaties en uw gegevens zullen niet gedeeld worden met derde partijen</small>

            <div>
                <x-feedback-msg />
            </div>

            <div class="account-detail-wrapper mt-3 ">
                <div class="row shadow-lg p-3 mb-5 mt-sm-0 mt-lg-2">
                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <h4 class="header-dark p-2 rounded">Upload een foto</h4>
                        <!-- Uploaded image area-->
                        <div class="image-area mt-2">
                            @if (strlen($user_details->img_url) > 0)
                            <img id="output" src="{{ URL::asset('storage/user_images/'. $user_details->img_url) }}" alt="empty image" class="img-fluid rounded shadow-sm mx-auto d-block">
                            @else
                            <img id="output" src="{{URL::asset('/images/upload_img.png')}}" alt="empty image" class="img-fluid rounded shadow-sm mx-auto d-block">
                            @endif
                        </div>
                        <!-- Upload image input-->
                        <form action="https://co-housing-app-3i8mx.ondigitalocean.app/store" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="input-group mt-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" accept="image/*" name="file" onchange="loadFile(event)" class="form-control border-0">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Open bestand...</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4 dark-pill"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class=" white-text">Open bestand</small></label>
                                </div>
                            </div>

                            <button disabled id="save-image" class='btn save-btn mt-3 mb-2 mb-md-0' type="submit">Opslaan</button>
                        </form>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <h4 class="header-dark p-2 rounded">Jouw gegevens</h4>

                        <div class="form-group">
                            <label>Naam:</label> <b>{{ $login_details[0] }}</b>
                        </div>
                        <div class="form-group">
                            <label>Email:</label> <b>{{ $login_details[1] }}</b>
                        </div>
                        <div class="form-group">
                            <label>Facebook account link:</label>
                            <input type="text" value="{{ $user_details->fb_link }}" name="fb-link" id="fbInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Instagram account link:</label>
                            <input type="text" value="{{ $user_details->insta_link }}" name="insta-link" id="instaInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Geboorteplaats</label>
                            <input type="text" value="{{ $user_details->birthplace }}" name="birthplace" id="birthInput" class="form-control">
                        </div>
                        <div>
                            <button disabled id="save-personal-details" class='btn save-btn' type="submit">Opslaan</button>
                        </div>
                    </div>
                </div>
                <div class="row shadow-lg p-3">
                    <h4 class="header-dark p-2 w-100 rounded">Schrijf een aantrekkelijke intro tekst over jezelf voor latere applicaties</h4>
                    <div class="form-outline w-100">
                        <label for="intro-form">Laat de verhuurders meer weten over wie je bent. Hoe leuker je jezelf beschrijft hoe meer kans je hebt om gecontacteerd te worden door een verhuurder!</label>
                        <textarea class="form-control" name="intro_text" id="intro-form4" rows="7" maxlength="1000">{{ $user_details->intro_text }}</textarea>
                        <small id="chars-left4"></small>
                        <div>
                            <button disabled id="save-intro" class='btn save-btn mt-3' type="submit">Opslaan</button>
                        </div>
                    </div>
                </div>

                <div class="row shadow-lg p-3 mt-5">
                    <h4 class="header-dark p-2 w-100 rounded">Hobby's en interesses</h4>
                    <div class="form-outline w-100">
                        <label for="intro-form">Omschrijf je hobby's en interesses</label>
                        <textarea class="form-control" id="hobby-form" rows="7" maxlength="1000">{{ $user_details->hobby_text }}</textarea>
                        <small id="chars-left5"></small>
                        <div>
                            <button disabled id="save-hobbies" class='btn save-btn mt-3' type="submit">Opslaan</button>
                        </div>
                    </div>
                </div>

                <div class="row shadow-lg p-3 mt-5 mb-5">
                    <h4 class="header-dark p-2 w-100 rounded">Financiële status</h4>
                    <div class="input-group mt-2">
                        <select class="form-control" name="status" id="status-form">
                            <option {{ $user_details->status == 'Student' ? 'selected' : ''}}>Student</option>
                            <option {{ $user_details->status == 'Werknemer' ? 'selected' : ''}}>Werknemer</option>
                            <option {{ $user_details->status == 'Werkzoekende' ? 'selected' : ''}}>Werkzoekende</option>
                        </select>
                    </div>
                    <div>
                        <button disabled id="save-status" class='btn save-btn mt-3' type="submit">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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