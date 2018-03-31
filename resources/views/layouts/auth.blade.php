<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LINQUE</title>

    <!-- LOADING STYLE & SCRIPT -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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

     <!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css" >
	<link href="{{ asset('css/paper-kit.css?v=2.1.0') }}" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.2.0/css/iziToast.css" rel="stylesheet">

	<!--     Fonts and icons     -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />

    <!-- OWNSTYLE -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        


</head>
<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('img/login-image.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 ml-auto mr-auto">
                    @yield('authenticate')
                    </div>
                </div>

            </div>
        </div>
    </div>
    @yield('modal')
        
    <!-- Core JS Files -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="{{ asset('js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>

    <!--  Paper Kit Initialization snd functons -->
	<script src="{{ asset('js/paper-kit.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.2.0/js/iziToast.js"></script>
    
    
    @yield('script')

</body>
</html>
