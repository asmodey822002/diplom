@extends('adminlte::page')

@section('title', 'Редактирование пользователя')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">{{$category->name}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($category->name))
        {!! Form::model($category, ['route'=>'category.store']) !!}
        @else
        {!! Form::model($category, ['route'=>['category.update', $category->id], 'method'=>'PUT']) !!}{{--для работы обязательно нужен модуль Для вывода форм устанавливаем https://laravelcollective.com/docs/master/html--}}
        @endif
            <div class="form-group {!! !empty($errors->first('name'))?'has-error':'' !!}">
                {!! Form::label('name', 'Category Name')!!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group  {!! !empty($errors->first('slug'))?'has-error':'' !!}">
                {!! Form::label('slug', 'Category Slug')!!}
                {!! Form::text('slug', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('description'))?'has-error':'' !!}">
                {!! Form::label('description', 'Category Description')!!}
                {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
            </div>
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="thumbnail" class="form-control" type="text" name="imgPath" value="{{$category->imgPath}}">
             </div>
             <div id="holder">
               <img src="{{$category->imgPath}}">
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