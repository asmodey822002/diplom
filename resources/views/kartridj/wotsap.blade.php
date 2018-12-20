@extends('kartridj/index')
@section('content')
<div class="card">
  <div class="card-header text-white bg-success">
    <h5 class="card-title">Проверить свой(и) картриджи</h5>
  </div>
  <div class="card-body">
    @include('parts.error')
        {!! Form::open(['url' => '/proveritKartridji', 'method' => 'post']) !!}
            <div class="form-group">
                {!!Form::label('num', 'Акт №')!!}
                {!!Form::text('num', null, ['class'=>'form-control'])!!}
            </div>
            {{--<div class="form-group">
                {!! Form::label('phone', 'Телефон')!!}
                {!! Form::text('phone', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Адрес электронной почты')!!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('surname', 'Фамилия')!!}
                {!! Form::text('surname', null, ['class'=>'form-control'])!!}
            </div>--}}
            {!!Form::submit('Проверить', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
  </div>
</div>

@endsection