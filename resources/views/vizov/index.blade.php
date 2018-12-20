<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Вызов специалиста')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">

</head>
<body>
	<!--<h1 class="text-center">dfddfd</h1>
	Menu-->
	@include('/guests/header')
	@include('parts.successe')
	<div class="containerfluid">
		<div class="row text-center">
			<div class="col-sm-3">
				@include('/guests/uslugi')
			</div>
			<div class="col-sm-6">
				@yield('content')
			</div>
		</div>
	</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
<script type="text/javascript">
    $('.autoplay').slick({
    	dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
});
</script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
@yield('script')
</body>
</html>