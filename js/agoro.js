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


$(document).ready(function(){
    $(".flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4").click(function(){
        alert('fd');
    });
});