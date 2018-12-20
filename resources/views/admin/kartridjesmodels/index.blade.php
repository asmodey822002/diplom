@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Модели картриджей</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="kartridjes-models-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Модель</th>
                <th>Edit | Dellete</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/kartridjesmodels/create')}}" class="btn btn-success btn-lg">Добавить модель</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#kartridjes-models-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allKartridjesModels') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'models', name: 'Модель' },
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

    $('#kartridjes-models-tabl').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/kartridjesmodels/'+id,
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