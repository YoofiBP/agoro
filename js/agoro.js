function displayCartItems(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayCartHeader.php',
		success: function(items){
			$(document).find('.header-cart-wrapitem').html(items);
		}
	});
}


function search() {
	var searchValue = document.getElementById('searchValue').value;
	location.href='searchDisplay.php?sea='+searchValue;
}