@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Акты Картриджей</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="actskartridjes-table">
        <thead>
            <tr>
                <th>№Акта</th>
                <th>Модель</th>
                <th>Серийный номер</th>
                <th>Жалоба</th>
                <th>Состояние</th>
                <th>Цена</th>
                <th>Клиент</th>
                <th>Show | Dellete</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/actskartridjes/create')}}" class="btn btn-success btn-lg">Принять Картридж</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#actskartridjes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allActsKartridjes') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'models_kartridjes_id', name: 'models' },
            { data: 'serial_number', name: 'serial_number'},
            { data: 'complaint', name: 'complaint'},
            { data: 'sostoyanies_id', name: 'sostoyanies'},
            { data: 'price', name: 'price'},
            { data: 'client_id', name: 'client'},
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

    $('#actskartridjes-table').on('click', '.btn-success', function(e){
       /* e.preventDefault();
        var id=$(this).attr('href');
        $.ajax({
            url: id,

        })*/
    })

    $('#actskartridjes-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/actskartridjes/'+id,
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