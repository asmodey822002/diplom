@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Продукты</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="product-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                {{--<th>slug</th>--}}
                <th>imgPath</th>
                {{--<th>gallery</th>
                <th>description</th>--}}
                <th>price</th>
                {{--<th>recommended</th>--}}
                <th>category</th>
                <th>Edit | Dellete</th>
            </tr>
        </thead>
    </table>
    <a href="{{url('admin/products/create')}}" class="btn btn-success btn-lg">New Product</a>
@stop

@push('js')
<script>
$(function() {
    var table=$('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allProducts') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            {{--{ data: 'slug', name: 'slug'},--}}
            { data: 'imgPath', name: 'imgPath', render: function(data){
                data=data?data:'/images/NonIzo.png';
                return'<img src="'+data+'" style="max-width: 80px">';
            } },
            {{--{ data: 'description', name: 'description'},--}}
            { data: 'price', name: 'price'},
            {{--{ data: 'recommended', name: 'recommended'},--}}
            { data: 'category', name: 'category'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#product-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/products/'+id,
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