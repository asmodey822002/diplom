@extends('adminlte::page')

@section('title', 'Редактирование пользователя')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">{{$product->name}}</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        @if(empty($product->name))
        {!! Form::model($product, ['route'=>'products.store']) !!}
        @else
        {!! Form::model($product, ['route'=>['products.update', $product->id], 'method'=>'PUT']) !!}{{--для работы обязательно нужен модуль Для вывода форм устанавливаем https://laravelcollective.com/docs/master/html--}}
        @endif
            <div class="form-group {!! !empty($errors->first('name'))?'has-error':'' !!}">
                {!! Form::label('name', 'Product Name')!!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group  {!! !empty($errors->first('slug'))?'has-error':'' !!}">
                {!! Form::label('slug', 'Product Slug')!!}
                {!! Form::text('slug', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('description'))?'has-error':'' !!}">
                {!! Form::label('description', 'Product Description')!!}
                {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
            </div>
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="thumbnail" class="form-control" type="text" name="imgPath" value="{{$product->imgPath}}">
             </div>
             <div id="holder">
               <img src="{{$product->imgPath}}">
             </div>
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="gallery-btn" data-input="gallery-thumbnail" data-preview="gallery-holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="gallery-thumbnail" class="form-control" type="text" name="gallery" value="{{$product->gallery?implode(',', $product->gallery):''}}">
             </div>
             <div id="gellary-holder">
                @if($product->gallery)
                @foreach($product->gallery as $path)
                    <img src="{{$path}}">
                @endforeach
                @endif
             </div>
            <div class="form-group {!! !empty($errors->first('recommended'))?'has-error':'' !!}">
                {!! Form::label('recommended', 'Product Recommende')!!}
                {!! Form::checkbox('recommended', 1, null)!!}
            </div>
            <div class="form-group {!! !empty($errors->first('price'))?'has-error':'' !!}">
                {!! Form::label('price', 'Product Price')!!}
                {!! Form::text('price', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group {!! !empty($errors->first('category'))?'has-error':'' !!}">
                {!!Form::label('category_id', 'Категория')!!}
                {!!Form::select('category_id', $category, null, ['class'=>'form-control'])!!}
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
  $('#gallery-btn').filemanager('image');
</script>
@endsection