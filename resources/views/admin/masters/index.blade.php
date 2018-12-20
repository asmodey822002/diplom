@extends('adminlte::page')

@section('title', 'Мастера')

@section('content_header')
    <h1>Мастера</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="masters-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Мастер</th>
                <th>Мастеру(заправка картриджа)</th>
                <th>Мастеру(реген. картриджа)</th>
                <th>Наценка фирмы(заправка)</th>
                <th>Наценка фирмы(реген.)</th>
                <th>Мастеру(ремонт)</th>
                <th>Наценка фирмы(ремонт)</th>
                <th>Edit | Dellete</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/masters/create')}}" class="btn btn-success btn-lg">New Masters</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#masters-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allMasters') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'users_id', name: 'users_id' },
            { data: 'price_kartridj_zapravka', name: 'price_kartridj_zapravka'},
            { data: 'price_kartridj_regeniraciya', name: 'price_kartridj_regeniraciya'},
            { data: 'nacenka_kartridj_zapravka', name: 'nacenka_kartridj_zapravka'},
            { data: 'nacenka_kartridj_regeniraciya', name: 'nacenka_kartridj_regeniraciya'},
            { data: 'price_remont', name: 'price_remont'},
            { data: 'nacenka_remont', name: 'nacenka_remont'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#masters-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/masters/'+id,
            type: 'DELETE',
            success: function(){
                table.row($(this).parents('tr')).remove().draw();
            },
            error: function(mes){
                console.log(mes)
            }
        });
    })
});
</script>

@endpush