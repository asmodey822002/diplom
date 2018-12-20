@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Картриджи</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="kartridjes-table">
        <thead>
            <tr>
                <th>id</th>
                <th>models</th>
                <th>serial_number</th>
                <th>complaint</th>
                <th>masters</th>
                <th>diagnostik</th>
                <th>sostoyanies</th>
                <th>materials</th>
                <th>price</th>
                <th>client</th>
                <th>Edit</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/kartridjes/create')}}" class="btn btn-success btn-lg">New Katridjes</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#kartridjes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allKartridjes') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'models_kartridjes_id', name: 'models' },
            { data: 'serial_number', name: 'serial_number'},
            { data: 'complaint', name: 'complaint'},
            { data: 'master_id', name: 'masters'},
            { data: 'diagnostik', name: 'diagnostik'},
            { data: 'sostoyanies_id', name: 'sostoyanies'},
            { data: 'materials_kartridjes_id', name: 'materials'},
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

    $('#kartridjes-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/kartridjes/'+id,
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