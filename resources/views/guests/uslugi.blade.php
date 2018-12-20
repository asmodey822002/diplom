@section('sidebar')
				<h3>Услуги</h3>
					<ul class="list-group">
							<li class="list-group-item"><a href="{{url('/kartridj')}}">Заправка / Регенирация картриджей</a></li>
							{{--<li class="list-group-item"><a href="{{url('/tehnix')}}">Ремонт компьютерной и офисной техники</a></li>--}}
							<li class="list-group-item"><a href="{{url('/vizov')}}">Вызов специалиста на дом / офис</a></li>
							<li class="list-group-item"><a href="{{url('/magazin')}}">Магазин</a></li>
					</ul>
				@show