@extends('adminlte::page')

@section('title', 'Редактирование пользователя')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">{{$user->name}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($user->name))
        {!! Form::model($user, ['route'=>'users.store']) !!}
        @else
        {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}{{--для работы обязательно нужен модуль Для вывода форм устанавливаем https://laravelcollective.com/docs/master/html--}}
        @endif
            <div class="form-group {!! !empty($errors->first('name'))?'has-error':'' !!}">
                {!! Form::label('name', 'User Name')!!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('phone'))?'has-error':'' !!}">
                {!! Form::label('phone', 'User Phone')!!}
                {!! Form::text('phone', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group  {!! !empty($errors->first('email'))?'has-error':'' !!}">
                {!! Form::label('email', 'User Email')!!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('roles', 'User Roles')!!}
                {!! Form::select('roles[]', $roles, $user->roles->pluck('id'), ['class'=>'form-control', 'multiple'=>true])!!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'User Passwords')!!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
            </div>
            {!!Form::submit('Save', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}
        {!! Form::close() !!}
    </div>
</div>
@stop
@section('js')
<script>
    $("select").select2();
</script>
@endsection