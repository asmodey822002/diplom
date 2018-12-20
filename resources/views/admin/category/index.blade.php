@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Категории товаров</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="category-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>imgPath</th>
                <th>description</th>
                <th>slug</th>
                <th>Edit | Dellete</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/category/create')}}" class="btn btn-success btn-lg">New Category</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allCategory') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'imgPath', name: 'imgPath', render: function(data){
                data=data?data:'/images/NonIzo.png';
                return'<img src="'+data+'" style="max-width: 80px">';
            } },
            { data: 'description', name: 'description'},
            { data: 'slug', name: 'slug'},
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

    $('#category-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/category/'+id,
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