@extends('layouts.app')

@section('content')
<div class="container mt-5" id="app">
  <div class="row d-flex justify-content-around">
    <div class="col-md-3">
      <x-accountNavigation />
      {{Auth::user()->name}}
    </div>
    <div class="col-md-9" id="message-section">
        <private-chat-component></private-chat-component>
    </div>
  </div>
</div>
@endsection