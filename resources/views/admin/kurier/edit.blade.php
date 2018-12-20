@extends('adminlte::page')

@section('title', 'Картридж АКТ№')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">Вызов № {{$zakaz_kuriers->id}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        {!! Form::model($zakaz_kuriers, ['route'=>['kurier.update', $zakaz_kuriers->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {!!Form::label('name', 'Имя')!!}
                {!!Form::text('name', $zakaz_kuriers->name, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('surname', 'Фамилия')!!}
                {!!Form::text('surname', $zakaz_kuriers->surname, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Телефон')!!}
                {!! Form::text('phone', $zakaz_kuriers->phone, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Адрес электронной почты')!!}
                {!! Form::email('email', $zakaz_kuriers->email, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Адрес (где забирать картриджи)')!!}
                {!! Form::text('address', $zakaz_kuriers->address, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('kol_vo', 'Количество картриджей')!!}
                {!! Form::text('kol_vo', $zakaz_kuriers->kol_vo, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('taim', 'Желаемое время приезда курьера')!!}
                {!! Form::text('taim', $zakaz_kuriers->taim, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('sostoyanies_id', 'Состояние')!!}
                {!!Form::select('sostoyanies_id', $sosts, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('user', 'Курьер')!!}
                {!!Form::select('user', $kuriers, null, ['class'=>'form-control'])!!}
            </div>
            {!!Form::submit('Сохранить', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
  </div>
</div>
@endsection