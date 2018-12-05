function removeItemCart(pid,title) {
	console.log("hello world");

	swal({
	  title: "Are you sure you want to remove "+title+" from your cart?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = this.responseText;
				//console.log(myObj);
				//alert(myObj);
				displayCartItems();
				displayCartPageIT();
				displayCartSize();
				displayCartValue();
				swal(title+" was "+myObj, {
				  icon: "success",
				});
			}
		};
		xhttp.open("GET", "PHP/removeCartItem.php?pid="+pid, true);
		xhttp.send();
		return;
	  } else {
	    swal("Your product is safe!");
	    return;
	  }
	});

	/*if (swal("Are you sure you want to remove '"+title+"' from your cart?"),"warning") {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = this.responseText;
				//console.log(myObj);
				//alert(myObj);
				displayCartItems();
				displayCartPageIT();
				displayCartSize();
				displayCartValue();
			}
		};
		xhttp.open("GET", "PHP/removeCartItem.php?pid="+pid, true);
		xhttp.send();
		return;
	}else{
		return;
	}*/
}

function displayRemove(pid) {
	// body...
	document.getElementById('pr_'+pid).style.display = "block";
	return;
}

function displayCartItems(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayCartHeader.php',
		success: function(items){
			$(document).find('.header-cart-wrapitem').html(items);
		}
	});
}
function displayCartPageIT(){
	$.ajax({
		type: 'GET',
		url: 'PHP/displayOnCartPage.php',
		success: function(items){
			$(document).find('#cartIT').html(items);
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
			//console.log($(document).attr('title'));
			if ($(document).attr('title') == "Cart") {
				//console.log($(document).find('#t1').html());
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

$('.cart-img-product b-rad-4 o-f-hidden').each(function(){
	var nameProduct = $(this).parent().parent().parent().find('.column-2 pt').html();
	var $pid = $(this).find('#pid').html();
	console.log($pid);
	var hoverOrClick = function(){
		$.ajax({
			type: 'POST',
			url: 'PHP/removeCartItem.php',
			data: {pid: $pid},
			success: function(sMessage){
				swal(sMessage);
				displayCartItems();	
				displayCartSize();
				displayCartValue();				
			}
		});
	};

	$(this).find('img').mouseover(hoverOrClick).click(hoverOrClick);
});