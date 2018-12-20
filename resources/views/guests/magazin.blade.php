<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Magazin')</title>
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
			<div class="col-12">
				<div class="autoplay">
					@foreach($productsRecomendeSlic as $prod)
						@if($prod->recommended==1)
				    		<div>
				    			<div class="card" style="width: 18rem;">
								  <img class="card-img-top" src="{{$prod->imgPath}}" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">{{$prod->name}}</h5>
								    <p class="card-text">{{$prod->price}}</p>
								    <a href="{{url('/guests/guests/'.$prod->id)}}" class="btn btn-primary">Подробние</a>
								  </div>
								</div>
				    		</div>
				    	@endif
			    	@endforeach
			  	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				@section('sidebar')
					<ul class="list-group">
						@foreach($categoriesOnSidebar as $cat)
							<li class="list-group-item"><a href="{{url('/guests/'.$cat->id)}}">{{$cat->name}}</a></li>
						@endforeach
					</ul>
				@show
			</div>
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
		autoplaySpeed: 2000,
});
</script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
@yield('script')
</body>
</html>