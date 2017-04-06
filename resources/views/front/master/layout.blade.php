<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 13:58
 */
?>
<!DOCTYPE html>
<html lang="ru" xml:lang="ru">
<head>
	<meta charset="utf-8">

	@yield('head')

	<!-- Favicons Icon -->
	<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico"
		  type="image/x-icon"/>

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS Style -->
	<link rel="stylesheet" href="{{ url('css/animate.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/revslider.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/owl.carousel.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/owl.theme.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/font-awesome.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css">
	@yield('style')
	<link rel="stylesheet" href="{{ url('css/custom.css') }}" type="text/css">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600'
		  rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page">
	@include('front.master.header')
	@include('front.widgets.breadcrumbs')
	@yield('content')
	@include('front.master.footer')
</div>
<!-- JavaScript -->
<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ url('js/owl.carousel.min.js') }}"></script>
@yield('scripts')
<script type="text/javascript" src="{{ url('js/common.js') }}"></script>
<script type="text/javascript" src="{{ url('js/custom.js') }}"></script>
</body>
</html>