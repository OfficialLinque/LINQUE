@extends('layouts.app')

@section('nav')
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('dhome') }}">Product <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('order') }}">Orders <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" >Location <span class="sr-only">(current)</span></a>
</li>
						
@endsection

@section('body')
<div class="album bg-light w-100" style="margin-top:56px;">
    <div id="container-fluid w-100">
        <div id="map" class="m-0 p-0" style="width: 100%; height: calc(100vh - 56px);">

        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
@endsection

