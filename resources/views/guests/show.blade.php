@extends('guests/index')
@section('content')
<h1 class="text-center">{{$title}}</h1>
<div class="row">
	@foreach($products as $product)
	<div class="card text-center" style="width: 18rem;">
	  <img class="card-img-top" src="{{$product->imgPath}}" alt="Card image cap">
	  <div class="card-body">
		  <h5 class="card-title">{{$product->name}}</h5>
		  <p class="card-text">{{$product->price}}</p>
		  <a href="{{url('/guests/guests/'.$product->id)}}" class="btn btn-primary">Подробние</a>
	  </div>
	</div>
	@endforeach
</div>
@endsection