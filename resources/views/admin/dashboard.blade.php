{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content_header')
    <h1>AdminPanel</h1>
@stop

@section('content')
    <h3>Добро пожаловать в панель администратора дaнного сайта</h3>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
{{-- resources/views/admin/dashboard.blade.php --}}

@push('css')

@push('js')