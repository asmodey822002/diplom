@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Курьеры</h1>
@stop

@section('content')
@include('parts.successe')
    <table class="table table-bordered" id="kuriers-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Телефон</th>
                <th>email</th>
                <th>Адрес</th>
                <th>Колличество</th>
                <th>Когда забрать</th>
                <th>Курьер</th>
                <th>Состояние</th>
                <th>Edit | Dellete</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    {{--<a href="{{url('admin/kurier/create')}}" class="btn btn-success btn-lg">New Katridjes</a>--}}
@stop

@push('js')
<script>
$(function() {
    var table=$('#kuriers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('allKuriers') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'surname', name: 'surname'},
            { data: 'phone', name: 'phone'},
            { data: 'email', name: 'email'},
            { data: 'address', name: 'address'},
            { data: 'kol_vo', name: 'kol_vo'},
            { data: 'taim', name: 'taim'},
            { data: 'users_id', name: 'users_id'},
            { data: 'hren', name: 'hren'},
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

    $('#kuriers-table').on('click', '.btn-danger', function(){
        var id=$(this).attr('data-id');

       $.ajax({
            url: '/admin/kurier/'+id,
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