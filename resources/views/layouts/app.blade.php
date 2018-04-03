<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">


    <title>LINQUE</title>

    <!-- LOADING STYLE & SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/iziToast.min.css') }}">
    <style>
		.no-js #loader {
			display: none;
		}

		.js #loader {
			display: block;
			position: absolute;
			left: 100px;
			top: 0;
		}

		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(img/loading.gif) center no-repeat #fff;
		}
	</style>
	<script>
        document.onreadystatechange = function(e)
        {
            $(".se-pre-con").show("fast");
        };
		window.onload = function(e)
        {
            $(".se-pre-con").fadeOut("slow");
        };
        
    </script>
    @yield('css')
  </head>
  <body>
  <div class="se-pre-con"></div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="img/dog.png" width="30" height="30" class="d-inline-block align-top" alt="">
            LINQUE
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @yield('nav')
        </ul>
        <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
                </a>
                <div class="dropdown-menu py-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="material-icons">account_circle</i> My Profile
                    </a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="material-icons">exit_to_app</i> Logout
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-info text-white my-2 my-sm-0" type="submit">Enter</button>
        </form>
        
    </div>
    </nav>
    @yield('body')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz43XZBpKwAsWxokyUqFYcZuzlJKm3Y24&callback=initMap">
    </script>
    <script src="{{ asset('assets/iziToast.min.js') }}" type="text/javascript"></script>
    @yield('script')
  </body>
</html>