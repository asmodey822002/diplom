@extends('kartridj/index')
@section('content')
<div class="card">
  <div class="card-header text-white bg-success">
    <h5 class="card-title">Состояние ваших картриджей</h5>
  </div>
  <div class="card-body">
    @if($aktNum!=null)
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Акт №</th>
          <th scope="col">Модель</th>
          <th scope="col">Серийный №</th>
          <th scope="col">Состояние</th>
          <th scope="col">Цена</th>
        </tr>
      </thead>
      <tbody>
        @for ( $i=0; $i<count($kartMod); $i++ )
        <tr>
          <th scope="row">{!! $aktNum !!}</th>
          <td>{!! $kartMod[$i] !!}</td>
          <td>{!! $kartSer[$i] !!}</td>
          <td>{!! $kartSost[$i] !!}</td>
          <td>{!! $kartPrice[$i] !!}</td>
        </tr>
       @endfor
      </tbody>
    </table>
    @else
<h5>Ваших картриджей нет у нас в ремонте!</h5>
<p>Eсли у Вас есть вопросы звоните нам по номеру +38-063-289-81-03</p>
@endif
{{--{!! print_r($kart) !!}--}}

    
  </div>
</div>

@endsection