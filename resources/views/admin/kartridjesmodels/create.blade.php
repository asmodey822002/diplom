@extends('adminlte::page')

@section('title', 'Добавить модель картриджа')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">{{$models_kartridjes->models}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($models_kartridjes->models))
        {!! Form::model($models_kartridjes, ['route'=>'kartridjesmodels.store']) !!}
        @else
        {!! Form::model($models_kartridjes, ['route'=>['kartridjesmodels.update', $models_kartridjes->id], 'method'=>'PUT']) !!}
        @endif
            <div class="form-group {!! !empty($errors->first('models'))?'has-error':'' !!}">
                {!! Form::label('models', 'Модель')!!}
                {!! Form::text('models', null, ['class'=>'form-control'])!!}
            </div>
            {!!Form::submit('Save', ['class'=>'btn btn-success btn-lg', 'style'=>'margin-left: 50%'])!!}

        {!! Form::close() !!}
    </div>
</div>
@stop
{{--@section('js')
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
@endsection--}}