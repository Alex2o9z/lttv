
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/admin.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/logostyle.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/customstyle.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('public/admin/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('public/admin/icon/favicon-32x32.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="LT team">
	<title>@yield('title') | Admin LTtv</title>

</head>
<body>

<!-- Content -->

<div id="divCheckbox" style="display: none;">@yield('index')</div>

@include('admin.layouts.header')

@include('admin.layouts.sliderbar')

@yield('content')


<!-- End Content -->

	<!-- JS -->
	<script src="{{asset('public/admin/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('public/admin/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/admin/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/admin/js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('public/admin/js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{asset('public/admin/js/select2.min.js')}}"></script>
	<script src="{{asset('public/admin/js/admin.js')}}"></script>
</body>
</html>

















<!-- Template from:
https://themeforest.net/user/dmitryvolkov/portfolio -->