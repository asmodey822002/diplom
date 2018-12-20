@extends('guests/index')
@section('content')
<div class="row text-center">
	<div class="card text-center col-12">
		<div class="card-header text-center alert-warning">
   			<h1>{{$title}}</h1>
  		</div>
	  <img class="card-img-top" src="{{$product->imgPath}}" alt="Card image cap" style="width: 36rem; text-align: center;">
	  <div class="card-body">
		  <h5 class="card-title">{{$product->name}}</h5>
		  <h6 class="card-subtitle mb-2 text-muted">{{$product->price}}</h6>
		  <p class="card-text">{{$product->description}}</p>
  		  {{--<a href="#" class="btn btn-primary">Заказать</a>--}}
  		  <form id="buy">
  		  	<input type="number" min="1" name="qty" value="1">
  		  	<input type="hidden" name="product_id" value="{{$product->id}}">
  		  	<input type="submit" value="add to Cart" class="btn btn-primary">
  		  </form>
	  </div>
	</div>
</div>
@endsection