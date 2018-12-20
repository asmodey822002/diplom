@extends('adminlte::page')

@section('title', 'Принять картридж')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        @if(isset($acts_kartridjes->id))
        <h1 class="box-title">Акт № {{$acts_kartridjes->id}}</h1>
        @else
        <h1 class="box-title">Новый акт</h1>
        @endif
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($acts_kartridjes->id))
        {!! Form::model($acts_kartridjes, ['route'=>'actskartridjes.store']) !!}
        @else
        {!! Form::model($acts_kartridjes, ['route'=>['actskartridjes.update', $acts_kartridjes->id], 'method'=>'PUT']) !!}
        @endif
        <div id="catDiv">
            <div>
                @include('admin/actskartridjes/cart')
            </div>
        </div>
            <a href="#" class="btn btn-success btn-lg" id="add">Добавить картридж в акт</a>
            <h3>Данные клиента</h3>
            <div class="form-group {!! !empty($errors->first('name'))?'has-error':'' !!}">
                {!! Form::label('name', 'Имя')!!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('surname'))?'has-error':'' !!}">
                {!! Form::label('surname', 'Фамилия')!!}
                {!! Form::text('surname', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('phone'))?'has-error':'' !!}">
                {!! Form::label('phone', 'Телефон')!!}
                {!! Form::text('phone', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('email'))?'has-error':'' !!}">
                {!! Form::label('email', 'Адрес электронной почты')!!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('address'))?'has-error':'' !!}">
                {!! Form::label('address', 'Адрес')!!}
                {!! Form::text('address', null, ['class'=>'form-control'])!!}
            </div>
            
            {!!Form::submit('Save', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
    </div>
</div>
@stop
@section('js')
<script>
$(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#add').on('click', function(e){
        e.preventDefault();
        var clone = $('.kartridj:first').clone(true);
        clone.find('input').val('');
        $('#catDiv').append(clone)
    })
});
</script>
@endsection