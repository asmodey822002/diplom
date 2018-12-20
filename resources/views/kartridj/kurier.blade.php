@extends('kartridj/index')
@section('content')
<div class="card">
  <div class="card-header text-white bg-success">
    <h5 class="card-title">Вызов курьера</h5>
  </div>
  <div class="card-body">
    @include('parts.error')
        {!! Form::open(['url' => '/kurierVizov', 'method' => 'post']) !!}
            <div class="form-group">
                {!!Form::label('name', 'Имя')!!}
                {!!Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('surname', 'Фамилия')!!}
                {!!Form::text('surname', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Телефон')!!}
                {!! Form::text('phone', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Адрес электронной почты')!!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('adress', 'Адрес (где забирать картриджи)')!!}
                {!! Form::text('adress', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('kol_vo', 'Количество картриджей')!!}
                {!! Form::text('kol_vo', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('taim', 'Желаемое время приезда курьера')!!}
                {!! Form::text('taim', null, ['class'=>'form-control'])!!}
            </div>
            {!!Form::submit('Вызвать', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
  </div>
</div>
@endsection