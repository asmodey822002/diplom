@extends('adminlte::page')

@section('title', 'Мастера')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        @if(isset($masters->users->name))
        <h1 class="box-title">Мастер {{$masters->users->name}}</h1>
        @else
        <h1 class="box-title">Новый Мастер</h1>
        @endif
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($masters->id))
        {!! Form::model($masters, ['route'=>'masters.store']) !!}
        @else
        {!! Form::model($masters, ['route'=>['masters.update', $masters->id], 'method'=>'PUT']) !!}
        @endif
            <div class="form-group {!! !empty($errors->first('users_id'))?'has-error':'' !!}">
                {!!Form::label('users_id', 'Мастер')!!}
                {!!Form::select('users_id', $name, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('price_kartridj_zapravka'))?'has-error':'' !!}">
                {!! Form::label('price_kartridj_zapravka', 'Мастеру(заправка картриджа)')!!}
                {!! Form::text('price_kartridj_zapravka', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group  {!! !empty($errors->first('price_kartridj_regeniraciya'))?'has-error':'' !!}">
                {!! Form::label('price_kartridj_regeniraciya', 'Мастеру(реген. картриджа)')!!}
                {!! Form::text('price_kartridj_regeniraciya', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('nacenka_kartridj_zapravka'))?'has-error':'' !!}">
                {!! Form::label('nacenka_kartridj_zapravka', 'Наценка фирмы(заправка)')!!}
                {!! Form::text('nacenka_kartridj_zapravka', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('nacenka_kartridj_regeniraciya'))?'has-error':'' !!}">
                {!! Form::label('nacenka_kartridj_regeniraciya', 'Наценка фирмы(реген.)')!!}
                {!! Form::text('nacenka_kartridj_regeniraciya', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('price_remont'))?'has-error':'' !!}">
                {!! Form::label('price_remont', 'Мастеру(ремонт)')!!}
                {!! Form::text('price_remont', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('nacenka_remont'))?'has-error':'' !!}">
                {!! Form::label('nacenka_remont', 'Наценка фирмы(ремонт)')!!}
                {!! Form::text('nacenka_remont', null, ['class'=>'form-control'])!!}
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