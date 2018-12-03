
/*
Emmanuel Nunoo
68432019 
*/

function displayCartQty() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = this.responseText;
			if (document.title != "Shopping Cart") {
				document.getElementById("cartNum").innerHTML = myObj + "&nbsp&nbsp";
			}
		}
	};
	xhttp.open("GET", "getCartSize.php", true);
	xhttp.send();
}
function displayCartValue() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myValue = JSON.parse(this.responseText);
			var myObj = myValue['totalValue'];
			//console.log(myObj);
			if(document.title == "Shopping Cart"){ //check if the page is the shopping cart page
				console.log("checked correctly");
				document.getElementById("cartValue").innerHTML = " $" + myObj;
				if (myObj == 0) {
					//console.log(document.getElementById('checkoutBtn').style.backgroundColor);
					document.getElementById('checkoutBtn').style.backgroundColor = 'grey';
				}else {
					document.getElementById('checkoutBtn').style.backgroundColor = 'limegreen';
				}
			}else{
				document.getElementById("cartVal").innerHTML = " $" + myObj + "&nbsp&nbsp";
			}
		}
	};
	xhttp.open("GET", "getCartValue.php", true);
	xhttp.send();
}

function displayCart() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = this.responseText;
			document.getElementById("myCart").innerHTML = myObj;
			//console.log(myObj);
			//displayCartValue();
		}
	};
	xhttp.open("GET", "displayCart.php", true);
	xhttp.send();
	//window.onload = displayCartValue();
}

function add2Cart(pid,qty) {
	if(isNaN(pid)) {
		alert("Emmanuel you have an error.");
	} else {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = this.responseText;
				console.log(myObj);
				alert(myObj);
				displayCartQty();
				displayCartValue();
				if (document.title == "Product") {
					location.href = "index.php";
				}
				
			}
		};
		xhttp.open("GET", "add2Cart.php?pid=" + pid + "&qty=" + qty, true);
		xhttp.send();
	};
}
function addCartValidate(pid){
	var size = document.getElementById("shoeSize").value;
	var quantity = document.getElementById('desiredQTY').value;
	if (size == "pick") {
		alert("You must select a shoe size before you can add this item(s) to cart.");
		return;
	}
	else if (quantity<1 || quantity == ""){
		alert("You must select a quantity");
		return;
	}else{
		return add2Cart(pid,document.getElementById('desiredQTY').value);
	}
}

function displayChangeQTY(PID){
	document.getElementById("currentQTY_"+PID).style.display = "none";
	console.log("currentQTY_"+PID);
	document.getElementById("editQTY_"+PID).style.display = "block";
	document.getElementById("changeQTY_"+PID).value = document.getElementById("currentQTY_"+PID).innerHTML;
}
function changeItemQTY(pid,newQTY){
	if (newQTY == document.getElementById("currentQTY_"+pid).innerHTML) {
		return;
	}else{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = this.responseText;
			console.log(myObj);
			alert(myObj);
			document.getElementById("currentQTY_"+pid).innerHTML = document.getElementById("changeQTY_"+pid).value;
			displayCartQty();
			displayCartValue();
			displayCart();
		}
	};
	xhttp.open("GET", "changeQTY.php?pid=" + pid +"&qty=" + newQTY, true);
	xhttp.send();
	};
}

function displayCurrentQTY(PID){
	document.getElementById("currentQTY_"+PID).style.display = "block";
	document.getElementById("editQTY_"+PID).style.display = "none";
}

function removeItemCart(pid,title) {
	console.log("hello world");
	if (confirm("Are you sure you want to remove '"+title+"' from your cart?")) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var myObj = this.responseText;
				//console.log(myObj);
				//alert(myObj);
				displayCart();
				displayCartQty();
				displayCartValue();
			}
		};
		xhttp.open("GET", "removeCartItem.php?pid="+pid, true);
		xhttp.send();
		return;
	}else{
		return;
	}
}

function toCheckout(){
	if (document.getElementById('checkoutBtn').style.backgroundColor == "limegreen") {
		location.href = "checkout.php"; 
		return;
	}else{
		return;
	}
}




