@extends('adminlte::page')

@section('title', 'Картридж АКТ№')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">Картридж № {{$kartridjes->id}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        {!! Form::model($kartridjes, ['route'=>['kartridjes.update', $kartridjes->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {!!Form::label('models_kartridjes_id', 'Модель картриджа')!!}
                {!!Form::select('models_kartridjes_id', $models, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('serial_number', 'Серийный номер')!!}
                {!! Form::text('serial_number', $kartridjes->serial_number, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('complaint', 'Жалоба (Со слов клиента)')!!}
                {!! Form::text('complaint', $kartridjes->complaint, ['class'=>'form-control'])!!}
            </div>
                <div class="form-group">
                    {!!Form::label('user', 'Мастер ремонтирующий')!!}
                    {!!Form::select('user', $masters, $mast_chk, ['class'=>'form-control'])!!}
                </div>

            <div class="form-group">
                {!! Form::label('diagnostik', 'Результаты диагностики')!!}
                {!! Form::textarea('diagnostik', $kartridjes->diagnostik, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('sostoyanies_id', 'Состояние')!!}
                {!!Form::select('sostoyanies_id', $sostoyanies, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('rabota', 'Заправка / Регенирация')!!}
                {!!Form::select('rabota', $rabota, $rab_chk, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('materials', 'Материалы')!!}
                {!! Form::textarea('materials', $materials, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('materials_price', 'Стоимость материалов')!!}
                {!! Form::text('materials_price', $materials_price, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'К оплате')!!}
                {!! Form::text('price', null, ['class'=>'form-control'])!!}
            </div>

            <h3>Данные клиента</h3>
            <div class="form-group {!! !empty($errors->first('name'))?'has-error':'' !!}">
                {!! Form::label('name', 'Имя')!!}
                {!! Form::text('name', $client->name, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('surname'))?'has-error':'' !!}">
                {!! Form::label('surname', 'Фамилия')!!}
                {!! Form::text('surname', $client->surname, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('phone'))?'has-error':'' !!}">
                {!! Form::label('phone', 'Телефон')!!}
                {!! Form::text('phone', $client->phone, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('email'))?'has-error':'' !!}">
                {!! Form::label('email', 'Адрес электронной почты')!!}
                {!! Form::email('email', $client->email, ['class'=>'form-control'])!!}
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