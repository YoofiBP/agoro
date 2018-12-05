<?php
/*Emmanuel Nunoo*/

class Databases {
	public $conn;

	public function __construct(){
		// $this->conn = mysqli_connect("localhost", "root", "", "agoro");
		$this->conn = mysqli_connect("sql9.freemysqlhosting.net","sql9268188","2H5AdyAzBK","sql9268188");
		if (!$this->conn) {
			echo "Database Connection Error" . mysqli_connect_error($this->conn);
			return;
		}
	}
	public function insert($table_name, $data) {
		$string = "INSERT INTO ". $table_name . " (";
		$string .= implode(",", array_keys($data)) . ') VALUES (';
		$string .= "'" . implode("','", array_values($data)) . "')";
		if (mysqli_query($this->conn, $string)) {
			return true;
		} else {
			echo mysqli_error($this->conn);
			return;
		}
	}
	public function add2cart($data){
		$pidCheck = $data['p_id'];
		$ipCheck = $data['ip_add'];
		$sql1 = "SELECT * FROM cart WHERE p_id = '".$pidCheck."' AND ip_add = '".$ipCheck."'";
		$q1 = mysqli_query($this->conn, $sql1);
		if (mysqli_num_rows($q1) > 0) {
			$success_message = 'Item already added to the cart';
			echo $success_message;
			return;
		}else{
			if ($this->insert("cart",$data)) {
				$sql2 = "SELECT product_title FROM products WHERE product_id =".$pidCheck;
				$q2 = mysqli_query($this->conn,$sql2);
				$ar = mysqli_fetch_assoc($q2);
				$title = $ar['product_title'];
				$success_message = $title .' was added to your cart successfully';
				echo $success_message;
				return;
			}
		}
	}
	public function getCartSize(){
		$ipCheck = $_SERVER['REMOTE_ADDR'];
		$sql = "SELECT SUM(qty) FROM cart WHERE ip_add ='".$ipCheck."'";
		$result = mysqli_query($this->conn, $sql);
		$cNum = mysqli_fetch_assoc($result);
		if ($cNum['SUM(qty)'] == "") {
			//$cNum = mysqli_fetch_assoc($result);
			$message = 0/*"<a href='Shopping_cart.html'>Shopping Cart: 0</a>"*/;
			//return $cNum['SUM(qty)'];
			return $message;
		}else{
			$message = $cNum['SUM(qty)']/*"<a href='Shopping_cart.html'>Shopping Cart: ".$cNum['SUM(qty)']."</a>"*/;
			return $message;
		}
	}
	public function updateCartItemQty($newValue,$PID){
		$ipCheck = $_SERVER['REMOTE_ADDR'];
		$sql = "UPDATE cart SET qty = '".$newValue."' WHERE p_id = '".$PID."' AND ip_add = '".$ipCheck."'";
		if ($result = mysqli_query($this->conn, $sql)) {
			echo "Quantity successfully updated";
		}
	}
	public function removeFromCart($PID){
		$ipCheck = $_SERVER['REMOTE_ADDR'];
		$sql = "DELETE FROM cart WHERE p_id = '".$PID."' AND ip_add = '".$ipCheck."'";
		if($result = mysqli_query($this->conn, $sql)){
			//$this->displayCartItems();
			$an = "successfully removed from cart";
			return $an;
		}
	}
	public function cartValue(){
		$ipCheck = $_SERVER['REMOTE_ADDR'];
		$sql = "SELECT p_id,qty FROM cart WHERE ip_add ='".$ipCheck."'";
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$cart = mysqli_fetch_all($result,MYSQLI_ASSOC);
			//print_r($cart);
			$totalValue = 0;
			for ($i=0; $i < count($cart); $i++){
				$cartItem = $cart[$i]; //get a current cart item
				/*print_r($cartItem);
				echo "<br>";*/
				$itemID = $cartItem['p_id']; //get the current item's product id
				/*print_r($itemID);
				echo "<br>";*/
				$itemQTY = $cartItem['qty']; //get the current item's quantity
				/*print_r($itemQTY);
				echo "<br>";*/
				$productSQL = "SELECT product_price FROM products WHERE product_id = ".$itemID;
				$q1 = mysqli_query($this->conn, $productSQL);
				$priceArray = mysqli_fetch_assoc($q1);
				/*print_r($priceArray);
				echo "<br>";*/
				$price = $priceArray['product_price'];
				/*echo "USD ".$price;
				echo "<br>";*/
				$cartObjectValue = $price * $itemQTY;
				/*echo $cartObjectValue;
				echo "<br>";*/
				$totalValue += $cartObjectValue;
				/*echo "This is the total value(incremental) ".$totalValue;
				echo "<hr>";
				echo "<br>";
				echo "<br>";
				echo "<hr>";*/
			}
			return $totalValue;
		}else{
			$totalValue = 0;
			return $totalValue;
		}
	}
	public function displayCartItems($page){
		$ipCheck = $_SERVER['REMOTE_ADDR'];
		$sql = "SELECT p_id,qty FROM cart WHERE ip_add ='".$ipCheck."'";
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			# code...
			$cart = mysqli_fetch_all($result,MYSQLI_ASSOC);
			//print_r($cart);
			for ($i=0; $i < count($cart); $i++){
				$itemNum = $i + 1;
				$cartItem = $cart[$i]; //get a current cart item
				/*print_r($cartItem);*/
				/*echo "<br>";
				echo "<br>";*/
				$itemID = $cartItem['p_id']; //get the current item's product id
				/*echo "this is the item ID: ".$itemID;
				echo "<br>";*/
				$itemQTY = $cartItem['qty']; //get the current item's quantity
				/*echo "This is the cart quantity: ".$itemQTY;
				echo "<br>";*/
				$productSQL = "SELECT product_image,product_title,product_price FROM products WHERE product_id = ".$itemID;
				$q1 = mysqli_query($this->conn, $productSQL);
				$productArray = mysqli_fetch_assoc($q1);
				$itemTitle = $productArray['product_title'];
				/*echo $itemTitle;
				echo "<br>";*/
				$itemPrice = $productArray['product_price'];
				$itemSubTotal = $itemPrice * $itemQTY;
				/*echo $itemPrice;
				echo "<br>";*/
				$itemImage = $productArray['product_image'];
				/*echo $itemImage;
				echo "<br>";
				echo "<hr>";*/
				if ($page == 'other') {
					echo '
					  <li class="header-cart-item">
					  	<div class="header-cart-item-img">
					  		<img src="'.$itemImage.'" alt="IMG" onclick="removeItemCart('.$itemID.','.$itemTitle.')">
					  	</div>

					  	<div class="header-cart-item-txt">
					  		<a href="product-detail.php?p='.$itemID.'" class="header-cart-item-name"><a href="product-detail.php?p='.$itemID.'">'.$itemTitle.'<a/a></a>

					  		<span class="header-cart-item-info">'.$itemQTY.' x GHC '.$itemPrice.'</span>
					  	</div>
					  </li>
					  ';
				}elseif ($page == 'cart') {
					echo '<tr class="table-row">
						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="'.$itemImage.'" alt="IMG-PRODUCT">
								<button class="mybtn" id="pr_'.$itemID.'" onclick='."'".'return removeItemCart('.$itemID.','.'"'.$itemTitle.'"'.');'."'".'>
									<i class="fs-12 fa fa-remove" aria-hidden="true"></i>
								</button>
								<p id="pid" style="display:none">'.$itemID.'</p>
							</div>
						</td>
						<td class="column-2 pt"><a href="product-detail.php?p='.$itemID.'">'.$itemTitle.'</a></td>
						<td class="column-3">GHC '.$itemPrice.'</td>
						<td class="column-4">
							<p id="currentQTY_'.$itemID.'">'.$itemQTY.'</p>
							<button id="cbh_'.$itemID.'" onclick="displayChangeQTY('.$itemID.')"><p style="font-size: 10px; text-decoration: underline;">Change item quantity</p></button>
							<div class="flex-w bo5 of-hidden w-size17" id="editQTY_'.$itemID.'" style="display: none;">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" id="changeQTY_'.$itemID.'" name="num-product1" value="'.$itemQTY.'">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
							<button id="done_'.$itemID.'" onclick="changeItemQTY('.$itemID.',document.getElementById('."'".'changeQTY_'.$itemID."'".").value);displayCurrentQTY(".$itemID.')" style="display: none;"><p style="font-size: 10px; text-decoration: underline;">Done</p></button>
						</td>
						<td class="column-5">GHC '.$itemSubTotal.'</td>
					</tr>';
				}
			}
			return;
		}elseif ($page == 'cart'){
			echo"<tr>
				<td colspan='5'>
					<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4' onclick='location.href = ".'"'."product.php".'"'."'>
						No items available in your cart. Click here to view product Catalogue
					</button>
				</td>
			</tr>";
			return;
		}else{
			return;
		}

	}
	public function getPname($str) {
		/*check if str is defined first*/
		if (isset($str)) {
			$string = "SELECT product_title FROM products WHERE product_title LIKE '%" . $str . "%'";
			$result = mysqli_query($this->conn, $string);
			if (mysqli_num_rows($result) > 0) {
				$array4JSON = array();
				while ($row = mysqli_fetch_assoc($result)) {
					array_push($array4JSON,$row['product_title']);
				}
				$myJSON = json_encode($array4JSON);
				return $myJSON;
			}
		} else {
			return;
		}
	}

	public function getCategory($index){
		$sql = "SELECT cat_name FROM categories WHERE cat_id = $index";
		$reslt = mysqli_query($this->conn, $sql);
		$tt = mysqli_fetch_assoc($reslt)['cat_name'];
		//print_r ($tt);
		//echo $tt;
		return $tt;
	}

	public function getPCatalogue(){
		$string = "SELECT product_id,product_cat,product_title,product_price,product_image FROM products";
		$result = mysqli_query($this->conn, $string);
		$mray=mysqli_fetch_all($result,MYSQLI_ASSOC);

		for ($i=0; $i < count($mray); $i++) {
			/*$b = $i+1;*/
			$pfocus = $mray[$i];
			$pid = $pfocus['product_id'];
			//echo "This is the product id: " . $pid;
			$title = $pfocus['product_title'];
			/*echo "This is the title: " . $title;
			echo "<br>";*/
			$price = $pfocus['product_price'];
			/*echo "This is the price: " . $price;
			echo "<br>";*/
			$image = $pfocus['product_image'];
			/*echo "This is the image: " . $image;
			echo "<br>";*/
			$category = $this->getCategory($pfocus['product_cat']);
			/*echo "This is the category: " . $category;
			echo "<br>";*/
			//if ($i == count($mray)-1 && $b%3 == 1) {
				echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="'.$image.'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<p id="pid" style="display:none">'.$pid.'</p>
											<p id="qty" style="display:none">1</p>
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?p='.$pid.'" class="block2-name dis-block s-text3 p-b-5">
										'.$title.'
									</a>

									<span class="block2-price m-text6 p-r-5">
										GHC '.$price.'
									</span>
								</div>
							</div>
						</div>';
		}
		return;
	}
	public function getProductCatalogueByPriceFilter($min, $max){
		$string = "SELECT product_id,product_cat,product_title,product_price,product_image FROM products WHERE product_price BETWEEN ".$min." AND ".$max;
		$result = mysqli_query($this->conn, $string);
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($this->conn));
		    exit();
		}
		$mray=mysqli_fetch_all($result,MYSQLI_ASSOC);

		for ($i=0; $i < count($mray); $i++) {
			/*$b = $i+1;*/
			$pfocus = $mray[$i];
			$pid = $pfocus['product_id'];
			//echo "This is the product id: " . $pid;
			$title = $pfocus['product_title'];
			/*echo "This is the title: " . $title;
			echo "<br>";*/
			$price = $pfocus['product_price'];
			/*echo "This is the price: " . $price;
			echo "<br>";*/
			$image = $pfocus['product_image'];
			/*echo "This is the image: " . $image;
			echo "<br>";*/
			$category = $this->getCategory($pfocus['product_cat']);
			/*echo "This is the category: " . $category;
			echo "<br>";*/
			//if ($i == count($mray)-1 && $b%3 == 1) {
				echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="'.$image.'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?p='.$pid.'" class="block2-name dis-block s-text3 p-b-5">
										'.$title.'
									</a>

									<span class="block2-price m-text6 p-r-5">
										GHC '.$price.'
									</span>
								</div>
							</div>
						</div>';
		}
		return;
	}

	public function getPCSearch($search){
		$string = "SELECT product_id,product_cat,product_title,product_price,product_image FROM products WHERE product_keywords LIKE '%" . $search . "%'";
		$result = mysqli_query($this->conn, $string);
		if (mysqli_num_rows($result) > 0) {
			$mray=mysqli_fetch_all($result,MYSQLI_ASSOC);
			//echo 4%3;
			//print_r($ray[4]);
			for ($i=0; $i < count($mray); $i++) {
				$b = $i+1;
				/*print_r($mray[$i]);
				echo "<br>";
				echo $i;
				echo "<br>";
				echo $b;
				echo "<br>";
				echo "<br>";
				echo "<br>";*/
				$pfocus = $mray[$i];
				$pid = $pfocus['product_id'];
				//echo "This is the product id: " . $pid;
				$title = $pfocus['product_title'];
				/*echo "This is the title: " . $title;
				echo "<br>";*/
				$price = $pfocus['product_price'];
				/*echo "This is the price: " . $price;
				echo "<br>";*/
				$image = $pfocus['product_image'];
				/*echo "This is the image: " . $image;
				echo "<br>";*/
				$category = $this->getCategory($pfocus['product_cat']);
				echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="'.$image.'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<p id="pid" style="display:none">'.$pid.'</p>
											<p id="qty" style="display:none">1</p>
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?p='.$pid.'" class="block2-name dis-block s-text3 p-b-5">
										'.$title.'
									</a>

									<span class="block2-price m-text6 p-r-5">
										GHC '.$price.'
									</span>
								</div>
							</div>
						</div>';
			}
			return;
		} else{
			echo "<h1>No search results found</h1>";
			return;
		}
	}

	public function displaySingle($myPID){
		$string = "SELECT product_id,product_cat,product_title,product_price,product_image,product_image1,product_image2,product_desc FROM products WHERE product_id=".$myPID;
		$result = mysqli_query($this->conn, $string);
		$mr = mysqli_fetch_assoc($result);
		return $mr;
	}

	public function displaySinglePT($myArray){
		$title = $myArray['product_title'];
		$category = $this->getCategory($myArray['product_cat']);
		$price = $myArray['product_price'];
		echo "<h1>".$title."</h1>
		<p>".$category."<p>
		<p class='price'>$".$price."</p>";
		return;
	}
	public function displaySingleDesc($myArray){
		$description = $myArray['product_desc'];
		echo "<p>".$description."</p>";
		return;
	}
	public function displaySinglePic($myArray){
		$image = $myArray['product_image'];
		$title = $myArray['product_title'];
		echo '<div class="item-slick3" data-thumb="'.$image.'">
				<div class="wrap-pic-w">
					<img src="'.$image.'" alt="IMG-PRODUCT">
				</div>
			</div>';
		return;
	}
	public function displaySinglePic1($myArray){
		$image = $myArray['product_image1'];
		$title = $myArray['product_title'];
		echo '<div class="item-slick3" data-thumb="'.$image.'">
				<div class="wrap-pic-w">
					<img src="'.$image.'" alt="IMG-PRODUCT">
				</div>
			</div>';
		return;
	}
	public function displaySinglePic2($myArray){
		$image = $myArray['product_image2'];
		$title = $myArray['product_title'];
		echo '<div class="item-slick3" data-thumb="'.$image.'">
				<div class="wrap-pic-w">
					<img src="'.$image.'" alt="IMG-PRODUCT">
				</div>
			</div>';
		return;
	}
	public function displaySingleBC($myArray){
		$title = $myArray['product_title'];
		$pid = $myArray['product_id'];
		echo "<a href='Product.php?p=".$pid."'>".$title."</a>";
		return;
	}
	public function displayAdd2CartBTN($myArray){
		$pid = $myArray['product_id'];
		echo "<button id='add2cart' value='Add to Cart' onclick='addCartValidate(".$pid.");'>Add to Cart</button>";
		return;
	}
	public function addCustomer($data){
		$userEmailCheck = $data['customer_email'];
		$sql1 = "SELECT * FROM customer WHERE customer_email = '".$userEmailCheck."'";
		$q1 = mysqli_query($this->conn, $sql1);
		if (mysqli_num_rows($q1) > 0) {
			$success_message = 'This email has already been used';
			echo $success_message;
			return;
		}else{
			if ($this->insert("customer",$data)) {
				$success_message = 'User created successfully';
				echo $success_message;
				return;
			}
		}
	}
}
?>
