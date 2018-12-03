<?php
session_start();
 ?>
<?php
include 'includes/classes/customer.php';
include 'includes/classes/brands.php';
include 'includes/classes/categories.php';
include 'includes/validations/login_validate.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition" onload="displayCartItems();displayCartSize();displayCartValue()">

	<!-- Header -->
  <header class="header1">
    <!-- Header desktop -->
  <?php include ('includes/templates/header.php');?>
  </header>


	<!-- Registration Form -->
	<form action="login.php" method="post" onsubmit="return validation();" name="register">
		<h2>Login</h2>
		<p>
      <label for="email" class="floatLabel">Email</label>
      <br>
			<input type="email" name="email" value="<?=@$email?>"/>*
		</p>
    <p>
      <label for="password" class="floatLabel">Password</label>
			<input type="password" name="password" value="<?=@$password?>"/>
		</p>

		<p>
			<input type="submit" value="Create My Account" id="submit" name="submit">
		</p>
	</form>
	<!--  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

	<style>

		body {
  background: #384047;
  font-family: sans-serif;
  font-size: 10px;
}

form {
  background: #fff;
  padding: 4em 4em 2em;
  max-width: 400px;
  margin: 20px auto 0;
  box-shadow: 0 0 1em #222;
  border-radius: 2px;
  border: 2px solid black;

}
form h2 {
  margin: 0 0 50px 0;
  padding: 10px;
  text-align: center;
  font-size: 30px;
  color: #666666;
  border-bottom: solid 1px #e5e5e5;
}
form p {
  margin: 0 0 3em 0;
  position: relative;
}
form input {
  display: block;
  box-sizing: border-box;
  width: 100%;
  outline: none;
  margin: 0;
}
form input[type="text"],
form input[type="password"] {
  background: #fff;
  border: 1px solid #dbdbdb;
  font-size: 1.6em;
  padding: .8em .5em;
  border-radius: 2px;
}
form input[type="text"]:focus,
form input[type="password"]:focus {
  background: #fff;
}
form span {
  display: block;
  background: #F9A5A5;
  padding: 2px 5px;
  color: #666;
}
form input[type="submit"] {
  background: rgba(148, 186, 101, 0.7);
  box-shadow: 0 3px 0 0 rgba(123, 163, 73, 0.7);
  border-radius: 2px;
  border: none;
  color: #fff;
  cursor: pointer;
  display: block;
  font-size: 2em;
  line-height: 1.6em;
  margin: 2em 0 0;
  outline: none;
  padding: .8em 0;
  text-shadow: 0 1px #68B25B;
}
form input[type="submit"]:hover {
  background: #94af65;
  text-shadow: 0 1px 3px rgba(70, 93, 41, 0.7);
}
form label {
  position: absolute;
  left: 8px;
  top: 10px;
  color: #999;
  font-size: 16px;
  display: inline-block;
  padding: 4px 10px;
  font-weight: 400;
  background-color: rgba(255, 255, 255, 0);
  -moz-transition: color 0.3s, top 0.3s, background-color 0.8s;
  -o-transition: color 0.3s, top 0.3s, background-color 0.8s;
  -webkit-transition: color 0.3s, top 0.3s, background-color 0.8s;
  transition: color 0.3s, top 0.3s, background-color 0.8s;
}
form label.floatLabel {
  top: -11px;
  background-color: rgba(255, 255, 255, 0.8);
  font-size: 14px;
}


  	</style>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="js/cart.js"></script>
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<!-- <script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script> -->
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<!-- <script type="text/javascript">
		$('.block2-btn-addcart').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script> -->

	<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script src="js/registration_validation.js"></script>
</body>

</html>
