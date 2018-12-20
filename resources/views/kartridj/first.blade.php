@extends('kartridj/index')
@section('content')
<!-- Карточка с card-img-top -->
<div class="card" style="margin: 0 auto;">
    <!-- Изображение -->
    <img class="card-img-top" src="{{asset('images/ZK.jpg')}}" alt="Kartridj" style="width: 20rem; margin: 0 auto;">
    <!-- Текстовый контент -->
    <div class="card-body">
        <h4 class="card-title">Приветствуем Вас!</h4>
        <h6 class="card-subtitle mb-2 text-muted">Если Вы уже сдали картридж(и) на заправку / регенирацыю нашим специалистам, то здесь вы можете проверить его состояние.</h6>
        <a href="{{url('/wotsap')}}" class="btn btn-warning" style="margin: 10px;">Проверить картридж</a>
        <h6 class="card-subtitle mb-2 text-muted">Если Вы житель прекрасного города Запорожье, то у вас есть эксклюзивная возможность заказать выезд нашего курьера за вашими картриджами!</h6>
	    <p class="card-text">Стоимость вызова курьера зависит от района города. В случае если у вас более 5-ти картриджей - вызов курьера по городу бесплатный.</p>
	    <a href="{{url('/kurier')}}" class="btn btn-info">Вызвать курьера</a>
    </div>
</div><!-- Конец карточки -->

@endsection