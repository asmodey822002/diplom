@extends('magazin/index')
@section('content')
<div class="container">
	@include('shop.cart')
{!! Form::open(['url'=>'/checkout-end']) !!}
	<div class="form-group">
		{!! Form::label('phone', 'Телефон') !!}
		{!! Form::text('phone', null, ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('address', 'Email') !!}
		{!! Form::email('address', null, ['class'=>'form-control']) !!}
	</div>
	{!! Form::submit('Заказать', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}
</div>

@endsection