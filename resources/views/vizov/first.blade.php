@extends('vizov/index')
@section('content')
<!-- Карточка с card-img-top -->
<div class="card" style="margin: 0 auto;">
    <!-- Изображение -->
    <img class="card-img-top" src="{{asset('images/logo-869.png')}}" alt="Tehnika" style="width: 20rem; margin: 0 auto;">
    <!-- Текстовый контент -->
    <div class="card-body">
        <h4 class="card-title">Приветствуем Вас!</h4>
        <h6 class="card-subtitle mb-2 text-muted">Если Вы житель прекрасного города Запорожье, то у вас есть эксклюзивная возможность заказать выезд нашего специалиста на дом!</h6>
	    <p class="card-text">Стоимость вызова специалиста зависит от района города. Минимальная стоимость вызова 150 грн.</p>
	    <a href="{{url('/spec')}}" class="btn btn-info">Вызвать специалиста</a>
    </div>
</div><!-- Конец карточки -->

@endsection