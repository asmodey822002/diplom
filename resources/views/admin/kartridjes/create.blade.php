@extends('adminlte::page')

@section('title', 'Принять картридж')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">{{$kartridjes->name}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($kartridjes->name))
        {!! Form::model($kartridjes, ['route'=>'kartridjes.store']) !!}
        @else
        {!! Form::model($kartridjes, ['route'=>['kartridjes.update', $kartridjes->id], 'method'=>'PUT']) !!}
        @endif
            <div class="form-group {!! !empty($errors->first('models_kartridjes_id'))?'has-error':'' !!}">
                {!!Form::label('models_kartridjes_id', 'Модель картриджа')!!}
                {!!Form::select('models_kartridjes_id', $models_kartridjes, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('serial_number'))?'has-error':'' !!}">
                {!! Form::label('serial_number', 'Серийный номер')!!}
                {!! Form::text('serial_number', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group  {!! !empty($errors->first('complaint'))?'has-error':'' !!}">
                {!! Form::label('complaint', 'Жалоба (Со слов клиента)')!!}
                {!! Form::text('complaint', null, ['class'=>'form-control'])!!}
            </div>
            {{--<div class="form-group {!! !empty($errors->first('master_id'))?'has-error':'' !!}">
                {!!Form::label('master_id', 'Мастер ремонтирующий')!!}
                {!!Form::select('master_id', $masters, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('desdiagnostik'))?'has-error':'' !!}">
                {!! Form::label('diagnostik', 'Результаты диагностики')!!}
                {!! Form::textarea('diagnostik', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('sostoyanies_id'))?'has-error':'' !!}">
                {!!Form::label('sostoyanies_id', 'Состояние')!!}
                {!!Form::select('sostoyanies_id', $sostoyanies, null, ['class'=>'form-control'])!!}
            </div>--}}
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
            
            {!!Form::submit('Save', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
    </div>
</div>
@stop
@section('js')
<script>
    $("select").select2();
</script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('description', options);
  $('#lfm').filemanager('image');
</script>
@endsection