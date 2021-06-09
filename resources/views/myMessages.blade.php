@extends('layouts.app')

@section('content')
<div class="container-fluid-md container-lg mt-2 mt-md-5" id="app">
  <div class="row d-flex justify-content-around">
    <div class="col-md-3">
      <x-accountNavigation />
    </div>
    <div class="col-md-9" id="message-section">
        <private-chat-component></private-chat-component>
    </div>
  </div>
</div>
@endsection