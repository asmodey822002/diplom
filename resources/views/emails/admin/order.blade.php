<h1>Новый заказ {{$order}}</h1>
<h3>Телефон: {{$phone}}, Адрес: {{$address}}</h3>
<table class="table">
	<thead>
		<tr>
			<th>Изображение</th>
			<th>Название</th>
			<th>Колличество</th>
			<th>Цена</th>
			<th>Стоимость</th>
		</tr>
	</thead>
	<tbody>
		@foreach(session('cart') as $product)
			<tr>
				<td> <img src="{{$product['imgPath']}}" alt="Foto Tovara" style="max-width: 50px;"> </td>
				<td>{{$product['name']}}</td>
				<td>{{$product['qty']}}</td>
				<td>{{$product['price']}}</td>
				<td>{{$product['qty']*$product['price'].'грн'}}</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" class="text-left">Сумма к оплате</td>
			<td colspan="2" class="text-right">{{session('totalSum')}}</td>
		</tr>
	</tfoot>
</table>