<img src="\public\images\shesterenki1.png" style="float: left; width: 100px">
<table style="width:100%;">
	<tr>
		<td style="text-align: left">Сервисный центр АБ Сервис</td>
		<td style="text-align: right">ИНН 3104914952</td>
	</tr>
	<tr>
		<td style="text-align: left;">г. Запорожье пр. Соборный 91</td>
		<td style="text-align: right;">тел. +38-063-289-81-03</td>
	</tr>
</table>

<h5 style="text-align: center;">Акт приема картриджей № {{$acts_kartridjes->id}}</h5>
<table style="width:100%; border: 2px; text-align: center;">
	<tr>
		<th>Модель</th>
		<th>Серийный №</th>
		<th>Неисправность со слов клиента</th>
	</tr>
	@foreach ( $kartridjes as $id)
	<tr>
		<td>{{$id->models_kartridjes->models}}</td>
		<td>{{$id->serial_number}}</td>
		<td>{{$id->complaint}}</td>
	</tr>
	@endforeach
</table>
<p></p>
<table style="width:100%;">
	<tr>
		<td style="text-align: left">Картридж(и) сдал: {{$kartridjes[0]->client->name}} {{$kartridjes[0]->client->surname}}</td>
		<td style="text-align: right">Картридж(и) принял представитель АБ Сервис:</td>
	</tr>
	<tr>
		<td style="text-align: left;">Подпись: ___________</td>
		<td style="text-align: right;">Подпись: ___________</td>
	</tr>
</table>
