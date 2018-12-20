<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{url('/')}}">ABServis</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      {{--<li class="nav-item active">
        <a class="nav-link" href="{{url('/kartridj')}}">Заправка / Регенирация картриджей<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/tehnix')}}">Ремонт техники <span class="sr-only">(current)</span></a>
      </li>--}}
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/magazin')}}">Магазин <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#cart">Корзина <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    {{--<form action="/search" class="form-inline my-2 my-lg-0">
      <input name="s" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>--}}
    <span class="navbar-text">
    г. Запорожье пр. Соборный 91<br>
    тел. +38-063-289-81-03
    </span>
  </div>
</nav>