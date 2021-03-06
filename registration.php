<?php
include 'includes/classes/customer.php';
include 'includes/classes/brands.php';
include 'includes/classes/categories.php';
include 'includes/validations/validate.php';
session_start();
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
	<form action="registration.php" method="post" onsubmit="return validation();" name="register">
		<h2>Register</h2>
		<p>
			<label for="username" class="floatLabel">Username</label>
			<input id="username" name="username" type="text" value="<?=@$username?>">*<?php echo $user_error;?>
		</p>
		<p>
      <label for="email" class="floatLabel">Email</label>
      <br>
			<input type="email" name="email" value="<?=@$email?>"/>*<?php echo $email_error;?>
		</p>
    <p>
      <label for="password" class="floatLabel">Password</label>
			<input type="password" name="password" value="<?=@$password?>"/>*<?php echo $password_error;?>
		</p>
    <p>
      <label for="confirm_password" class="floatLabel">Confirm Password</label>
      <input type="password" name="confirm_password" value=""/>*<?php echo $confirm_password_error;?>
    </p>
    <p>
    <select name="country" id="country">
        <option value="0">Select Country</option>
      	<option value="AFG">Afghanistan</option>
      	<option value="ALA">Åland Islands</option>
      	<option value="ALB">Albania</option>
      	<option value="DZA">Algeria</option>
      	<option value="ASM">American Samoa</option>
      	<option value="AND">Andorra</option>
      	<option value="AGO">Angola</option>
      	<option value="AIA">Anguilla</option>
      	<option value="ATA">Antarctica</option>
      	<option value="ATG">Antigua and Barbuda</option>
      	<option value="ARG">Argentina</option>
      	<option value="ARM">Armenia</option>
      	<option value="ABW">Aruba</option>
      	<option value="AUS">Australia</option>
      	<option value="AUT">Austria</option>
      	<option value="AZE">Azerbaijan</option>
      	<option value="BHS">Bahamas</option>
      	<option value="BHR">Bahrain</option>
      	<option value="BGD">Bangladesh</option>
      	<option value="BRB">Barbados</option>
      	<option value="BLR">Belarus</option>
      	<option value="BEL">Belgium</option>
      	<option value="BLZ">Belize</option>
      	<option value="BEN">Benin</option>
      	<option value="BMU">Bermuda</option>
      	<option value="BTN">Bhutan</option>
      	<option value="BOL">Bolivia, Plurinational State of</option>
      	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
      	<option value="BIH">Bosnia and Herzegovina</option>
      	<option value="BWA">Botswana</option>
      	<option value="BVT">Bouvet Island</option>
      	<option value="BRA">Brazil</option>
      	<option value="IOT">British Indian Ocean Territory</option>
      	<option value="BRN">Brunei Darussalam</option>
      	<option value="BGR">Bulgaria</option>
      	<option value="BFA">Burkina Faso</option>
      	<option value="BDI">Burundi</option>
      	<option value="KHM">Cambodia</option>
      	<option value="CMR">Cameroon</option>
      	<option value="CAN">Canada</option>
      	<option value="CPV">Cape Verde</option>
      	<option value="CYM">Cayman Islands</option>
      	<option value="CAF">Central African Republic</option>
      	<option value="TCD">Chad</option>
      	<option value="CHL">Chile</option>
      	<option value="CHN">China</option>
      	<option value="CXR">Christmas Island</option>
      	<option value="CCK">Cocos (Keeling) Islands</option>
      	<option value="COL">Colombia</option>
      	<option value="COM">Comoros</option>
      	<option value="COG">Congo</option>
      	<option value="COK">Cook Islands</option>
      	<option value="CRI">Costa Rica</option>
      	<option value="CIV">Côte d'Ivoire</option>
      	<option value="HRV">Croatia</option>
      	<option value="CUB">Cuba</option>
      	<option value="CUW">Curaçao</option>
      	<option value="CYP">Cyprus</option>
      	<option value="CZE">Czech Republic</option>
      	<option value="DNK">Denmark</option>
      	<option value="DJI">Djibouti</option>
      	<option value="DMA">Dominica</option>
      	<option value="DOM">Dominican Republic</option>
      	<option value="ECU">Ecuador</option>
      	<option value="EGY">Egypt</option>
      	<option value="SLV">El Salvador</option>
      	<option value="GNQ">Equatorial Guinea</option>
      	<option value="ERI">Eritrea</option>
      	<option value="EST">Estonia</option>
      	<option value="ETH">Ethiopia</option>
      	<option value="FRO">Faroe Islands</option>
      	<option value="FJI">Fiji</option>
      	<option value="FIN">Finland</option>
      	<option value="FRA">France</option>
      	<option value="GUF">French Guiana</option>
      	<option value="PYF">French Polynesia</option>
      	<option value="GAB">Gabon</option>
      	<option value="GMB">Gambia</option>
      	<option value="GEO">Georgia</option>
      	<option value="DEU">Germany</option>
      	<option value="GHA">Ghana</option>
      	<option value="GIB">Gibraltar</option>
      	<option value="GRC">Greece</option>
      	<option value="GRL">Greenland</option>
      	<option value="GRD">Grenada</option>
      	<option value="GLP">Guadeloupe</option>
      	<option value="GUM">Guam</option>
      	<option value="GTM">Guatemala</option>
      	<option value="GGY">Guernsey</option>
      	<option value="GIN">Guinea</option>
      	<option value="GNB">Guinea-Bissau</option>
      	<option value="GUY">Guyana</option>
      	<option value="HTI">Haiti</option>
      	<option value="HND">Honduras</option>
      	<option value="HKG">Hong Kong</option>
      	<option value="HUN">Hungary</option>
      	<option value="ISL">Iceland</option>
      	<option value="IND">India</option>
      	<option value="IDN">Indonesia</option>
      	<option value="IRN">Iran</option>
      	<option value="IRQ">Iraq</option>
      	<option value="IRL">Ireland</option>
      	<option value="IMN">Isle of Man</option>
      	<option value="ISR">Israel</option>
      	<option value="ITA">Italy</option>
      	<option value="JAM">Jamaica</option>
      	<option value="JPN">Japan</option>
      	<option value="JEY">Jersey</option>
      	<option value="JOR">Jordan</option>
      	<option value="KAZ">Kazakhstan</option>
      	<option value="KEN">Kenya</option>
      	<option value="KIR">Kiribati</option>
      	<option value="KOR">Korea, Republic of</option>
      	<option value="KWT">Kuwait</option>
      	<option value="KGZ">Kyrgyzstan</option>
      	<option value="LVA">Latvia</option>
      	<option value="LBN">Lebanon</option>
      	<option value="LSO">Lesotho</option>
      	<option value="LBR">Liberia</option>
      	<option value="LBY">Libya</option>
      	<option value="LIE">Liechtenstein</option>
      	<option value="LTU">Lithuania</option>
      	<option value="LUX">Luxembourg</option>
      	<option value="MAC">Macao</option>
      	<option value="MDG">Madagascar</option>
      	<option value="MWI">Malawi</option>
      	<option value="MYS">Malaysia</option>
      	<option value="MDV">Maldives</option>
      	<option value="MLI">Mali</option>
      	<option value="MLT">Malta</option>
      	<option value="MHL">Marshall Islands</option>
      	<option value="MTQ">Martinique</option>
      	<option value="MRT">Mauritania</option>
      	<option value="MUS">Mauritius</option>
      	<option value="MYT">Mayotte</option>
      	<option value="MEX">Mexico</option>
      	<option value="MCO">Monaco</option>
      	<option value="MNG">Mongolia</option>
      	<option value="MNE">Montenegro</option>
      	<option value="MSR">Montserrat</option>
      	<option value="MAR">Morocco</option>
      	<option value="MOZ">Mozambique</option>
      	<option value="MMR">Myanmar</option>
      	<option value="NAM">Namibia</option>
      	<option value="NRU">Nauru</option>
      	<option value="NPL">Nepal</option>
      	<option value="NLD">Netherlands</option>
      	<option value="NCL">New Caledonia</option>
      	<option value="NZL">New Zealand</option>
      	<option value="NIC">Nicaragua</option>
      	<option value="NER">Niger</option>
      	<option value="NGA">Nigeria</option>
      	<option value="NIU">Niue</option>
      	<option value="NFK">Norfolk Island</option>
      	<option value="NOR">Norway</option>
      	<option value="OMN">Oman</option>
      	<option value="PAK">Pakistan</option>
      	<option value="PLW">Palau</option>
      	<option value="PAN">Panama</option>
      	<option value="PNG">Papua New Guinea</option>
      	<option value="PRY">Paraguay</option>
      	<option value="PER">Peru</option>
      	<option value="PHL">Philippines</option>
      	<option value="PCN">Pitcairn</option>
      	<option value="POL">Poland</option>
      	<option value="PRT">Portugal</option>
      	<option value="PRI">Puerto Rico</option>
      	<option value="QAT">Qatar</option>
      	<option value="REU">Réunion</option>
      	<option value="ROU">Romania</option>
      	<option value="RUS">Russian Federation</option>
      	<option value="RWA">Rwanda</option>
      	<option value="BLM">Saint Barthélemy</option>
      	<option value="KNA">Saint Kitts and Nevis</option>
      	<option value="LCA">Saint Lucia</option>
      	<option value="WSM">Samoa</option>
      	<option value="SMR">San Marino</option>
      	<option value="STP">Sao Tome and Principe</option>
      	<option value="SAU">Saudi Arabia</option>
      	<option value="SEN">Senegal</option>
      	<option value="SRB">Serbia</option>
      	<option value="SYC">Seychelles</option>
      	<option value="SLE">Sierra Leone</option>
      	<option value="SGP">Singapore</option>
      	<option value="SXM">Sint Maarten (Dutch part)</option>
      	<option value="SVK">Slovakia</option>
      	<option value="SVN">Slovenia</option>
      	<option value="SLB">Solomon Islands</option>
      	<option value="SOM">Somalia</option>
      	<option value="ZAF">South Africa</option>
      	<option value="SSD">South Sudan</option>
      	<option value="ESP">Spain</option>
      	<option value="LKA">Sri Lanka</option>
      	<option value="SDN">Sudan</option>
      	<option value="SUR">Suriname</option>
      	<option value="SJM">Svalbard and Jan Mayen</option>
      	<option value="SWZ">Swaziland</option>
      	<option value="SWE">Sweden</option>
      	<option value="CHE">Switzerland</option>
      	<option value="SYR">Syrian Arab Republic</option>
      	<option value="TWN">Taiwan, Province of China</option>
      	<option value="TJK">Tajikistan</option>
      	<option value="TZA">Tanzania, United Republic of</option>
      	<option value="THA">Thailand</option>
      	<option value="TLS">Timor-Leste</option>
      	<option value="TGO">Togo</option>
      	<option value="TKL">Tokelau</option>
      	<option value="TON">Tonga</option>
      	<option value="TTO">Trinidad and Tobago</option>
      	<option value="TUN">Tunisia</option>
      	<option value="TUR">Turkey</option>
      	<option value="TKM">Turkmenistan</option>
      	<option value="TCA">Turks and Caicos Islands</option>
      	<option value="TUV">Tuvalu</option>
      	<option value="UGA">Uganda</option>
      	<option value="UKR">Ukraine</option>
      	<option value="ARE">United Arab Emirates</option>
      	<option value="GBR">United Kingdom</option>
      	<option value="USA">United States</option>
      	<option value="URY">Uruguay</option>
      	<option value="UZB">Uzbekistan</option>
      	<option value="VUT">Vanuatu</option>
      	<option value="VNM">Viet Nam</option>
      	<option value="VGB">Virgin Islands, British</option>
      	<option value="VIR">Virgin Islands, U.S.</option>
      	<option value="WLF">Wallis and Futuna</option>
      	<option value="ESH">Western Sahara</option>
      	<option value="YEM">Yemen</option>
      	<option value="ZMB">Zambia</option>
      	<option value="ZWE">Zimbabwe</option>
    </select>*<?php echo $country_error;?>
    </p>
    <p>
			<label for="city" class="floatLabel">City</label>
			<input id="city" name="city" type="text" value="<?=@$city?>">*<?php echo $city_error;?>
		</p>
    <p>
			<label for="number" class="floatLabel">Phone Number</label>
      <br>
			<input type="number" name="number" id="number" value="<?=@$phone?>"/>* <?php echo $phone_error;?>
		</p>
    <p>
			<label for="file" class="floatLabel">Upload Customer Image</label>
      <br>
			<input type="file" id="file" name="file" value="<?=@$image?>"/>* <?php echo $image_error;?>
		</p>
    <p>
    <label for="address" class="floatLabel">Address</label>
    <input type="text" name="address" value="<?=@$address?>"/>* <?php echo $address_error;?>
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
<?php include ('includes/templates/footer.php')?>;
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
