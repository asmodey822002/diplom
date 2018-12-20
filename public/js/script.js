$.ajaxSetup({//защита
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#buy').submit(function(e){
	e.preventDefault();
	$.ajax({
		url:'/add-to-cart',
		type:'POST',
		data:$(this).serialize(),//serialaize - преобразует данные формы в обьект
		success:function(result){
			showCart(result);
		}
	});
});
function showCart(result){
	$('#cart .modal-body').html(result);
	$('#cart').modal();
}
$('body').on('click', '.remove-product', function(e){
	e.preventDefault();
	$.ajax({
		url:'/remove-from-cart',
		type:'POST',
		data:{'id':$(this).attr('data-id')},
		success:function(result){
			showCart(result);
		}
	});
});

$('body').on('click', '.remove-cart', function(e){
	e.preventDefault();
	$.ajax({
		url:'/clear-cart',
		type:'POST',
		success:function(result){
			showCart(result);
		}
	});
});

