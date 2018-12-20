@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="box box-solid box-success">
    <div class="box-header with-border">
        <h1 class="box-title">Nev user</h1>
    </div>
    <div class="box-body">
        @include('parts.error')
        <form action="{{url('admin/users')}}" method="POST">
            <div class="form-group">
                <label for="examplForm01">Name</label>
                <input type="text" name="name" id="examplForm01">
            </div>
            <div class="form-group">
                <label for="examplForm1">Phone</label>
                <input type="text" name="phone" id="examplForm1">
            </div>
            <div class="form-group">
                <label for="examplForm2">Email</label>
                <input type="email" name="email" id="examplForm2">
            </div>
            <button class="btn btn-success btn-lg" type="submit" style="margin-left: 50%">Seyv</button>
        </form>
    </div>
</div>
@stop
