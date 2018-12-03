function displayCartItems(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayCartHeader.php',
		success: function(items){
			$(document).find('.header-cart-wrapitem').html(items);
		}
	});
}

function displayCartSize(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayCartSizeHeader.php',
		success: function(quantity){
			$(document).find('.header-icons-noti').html(quantity);
		}
	});
}

function displayCartValue(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayCartValueHeader.php',
		success: function(total){
			$(document).find('.htotal').html(total);
			console.log($(document).attr('title'));
			if ($(document).attr('title') == "Cart") {
				console.log($(document).find('#t1').html());
				$(document).find('#t1').html(total);
			}else{
				console.log("test failed");
			}
		}
	});
}

$('.block2-btn-addcart').each(function(){
	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
	var $pid = $(this).find('#pid').html();
	var $qty = $(this).find('#qty').html();
	/*console.log($pid);
	console.log($qty);*/
	$(this).on('click', function(){
		$.ajax({
			type: 'POST',
			url: 'PHP/addtocart.php',
			data: {pid: $pid, qty: $qty},
			success: function(sMessage){
				swal(sMessage);
				displayCartItems();	
				displayCartSize();
				displayCartValue();				
			}
		});
	});
});