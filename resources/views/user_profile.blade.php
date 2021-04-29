@extends('layouts.app')

@section('content')
<div class="row mt-3 p-3">
        <div class="container">
            <h1>Account details</h1>
            <h4>Vervolledig je account om later snellere applicaties te kunnen doen</h4>
            <small class="form-text text-muted">Het vervolledigen van uw account is niet verplicht maar optioneel. Het verhoogt echter de slaagkans van sollicitaties en uw gegevens zullen niet gedeeld worden met derde partijen</small>
            <small>OPGELET! Uw gegevens die u hier invult zullen publiek op uw profiel worden weergegeven</small>
            
            <div>
                <x-feedback-msg />
            </div>
        </div>  
    </div>

    <div class="container account-detail-wrapper mt-3 ">
        <div class="col-md-4">
            <div class="row shadow-lg p-3 mt-2">
                <h4>Upload een foto</h4>
                <!-- Uploaded image area-->
                <div class="image-area mt-2">
                    <img id="imageResult" src="{{URL::asset('/images/upload_img.png')}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                </div>
                
                <!-- Upload image input-->
                <div class="input-group mt-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Open bestand...</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Open bestand</small></label>
                    </div>
                </div>  
            </div>
            
            <div class="row shadow-lg p-3 mt-5">
                <h4>Jouw gegevens</h4>
                <div class="input-group">
                    <form action="{{ url('/birthplace') }}" method="post" >
                        @csrf
                        {{ method_field('POST') }}
    
                        <div class="form-group">
                            <label>Naam:</label> <b>{{ $login_details[0] }}</b>
                        </div>
                        <div class="form-group">
                            <label>Email address:</label> <b>{{ $login_details[1] }}</b>
                        </div>
                        <div class="form-group">
                            <label>Geboorteplaats</label>
                            <input type="text" placeholder="{{ $user_details->birthplace }}" name="birthplace" id="birthInput" class="form-control" >
                        </div>
                        <div>
                            <button disabled id="save-birth" class='btn save-btn' type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>     
        </div>

        <div class="col-md-8 ml-md-5">
            <div class="row shadow-lg p-3 mt-5 mt-lg-2">
                <h4>Schrijf een aantrekkelijke intro tekst over jezelf voor latere applicaties</h4>
                <div class="form-outline w-100">
                    <form action="{{ url('/introtext') }}" method="post" >
                        @csrf
                        {{ method_field('POST') }}
                        <label for="intro-form">Promoot en verkoop jezelf op een eerlijke manier voor meer succes</label>
                        <textarea class="form-control" placeholder="{{ $user_details->intro_text }}" name="intro_text" id="intro-form" rows="10"></textarea>
                        <div>
                            <button disabled id="save-intro" class='btn save-btn mt-3' type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row shadow-lg p-3 mt-5">
                <h4>Hobbies en interesses</h4>
                <div class="form-outline w-100">
                    <form action="{{ url('/hobbies') }}" method="post" >
                        @csrf
                        {{ method_field('POST') }}
                        <label for="intro-form">Omschrijf je hobbies en interesses</label>
                        <textarea class="form-control" placeholder="{{ $user_details->hobby_text }}" name="hobbies" id="hobby-form" rows="5"></textarea>
                        <div>
                            <button disabled id="save-hobbies" class='btn save-btn mt-3' type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>          
            </div>

            <div class="row shadow-lg p-3 mt-5">
                <h4>Financiële status</h4>
                <div class="input-group">
                    <form action="{{ url('/status') }}" method="post" >
                        @csrf
                        {{ method_field('POST') }}
                        <select class="form-control" name="status" id="status-form">
                            <option>Student</option>
                            <option>Werknemer</option>
                            <option>Werkzoekende</option>
                        </select>
                        <div>
                            <button disabled id="save-status" class='btn save-btn mt-3' type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
@endsection
