<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'ABServis')</title>
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
				<div class="autoplay">
		    		<div>
		    			<div class="card" style="width: 18rem; margin: 0 auto;">
						  <img class="card-img-top" src="{{asset('images/ChKop.jpg')}}" alt="Magaz">
						  <div class="card-body">
						    <h5 class="card-title">Магазин</h5>
						    <p class="card-text">Здесь Вы можете приобрести по выгодным ценам</p>
						    <a href="{{url('/magazin')}}" class="btn btn-primary">Подробние</a>
						  </div>
						</div>
		    		</div>
		    		<div>
		    			<div class="card" style="width: 18rem; margin: 0 auto;">
						  <img class="card-img-top" src="{{asset('images/ZK.jpg')}}" alt="Kartridj">
						  <div class="card-body">
						    <h5 class="card-title">Заправка / Регенирация картриджей</h5>
						    <p class="card-text">Здесь все что касается картриджей</p>
						    <a href="{{url('/kartridj')}}" class="btn btn-primary">Подробние</a>
						  </div>
						</div>
		    		</div>
		    		{{--<div>
		    			<div class="card" style="width: 18rem; margin: 0 auto;">
						  <img class="card-img-top" src="{{asset('images/logo-869.png')}}" alt="Tehnika">
						  <div class="card-body">
						    <h5 class="card-title">Ремонт компьютерной и офисной техники</h5>
						    <p class="card-text">Здесь все что касается ремонта техники</p>
						    <a href="{{url('/tehnix')}}" class="btn btn-primary">Подробние</a>
						  </div>
						</div>
		    		</div>--}}
		    		<div>
		    			<div class="card" style="width: 18rem; margin: 0 auto;">
						  <img class="card-img-top" src="{{asset('images/logo-869.png')}}" alt="Tehnika">
						  <div class="card-body">
						    <h5 class="card-title">Вызов специалиста на дом / офис</h5>
						    <p class="card-text">Здесь Вы можете воззвать о помощи</p>
						    <a href="{{url('/vizov')}}" class="btn btn-primary">Подробние</a>
						  </div>
						</div>
		    		</div>
			  	</div>
			</div>
			<div class="col-sm-3">
				@include('/guests/reklama')
			</div>
		</div>
		<div class="row">
			
			<div class="col-9">
				<div class="row">
					<div class="col-12">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- The Modal -->
<div class="modal" id="cart">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        @include('shop.cart')
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Продолжить покупки</button>
        <button type="button" class="btn btn-secondary remove-cart">Очистить Карзину</button>
        <a href="{{url('/checkout')}}" type="button" class="btn btn-warning" >Оформить заказ</a>

      </div>

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