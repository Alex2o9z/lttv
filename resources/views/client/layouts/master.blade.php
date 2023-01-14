<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/plyr.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/default-skin.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/logostyle.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('public/frontend/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('public/frontend/icon/favicon-32x32.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/frontend/icon/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/frontend/icon/apple-touch-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/frontend/icon/apple-touch-icon-144x144.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>@yield('title') | LTtv</title>

</head>
<body class="body">

<!-- Content -->

@include('client.layouts.header')

@yield('content')

@include('client.layouts.footer')

<!-- End Content -->

	<!-- JS -->
	<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/wNumb.js')}}"></script>
	<script src="{{asset('public/frontend/js/nouislider.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/plyr.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.morelines.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/photoswipe.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/photoswipe-ui-default.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>

</html>