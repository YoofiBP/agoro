<?php
session_start();
if(isset($_SESSION['admin'])){

}else{
  header('Location:admin_login.php');
}

include 'insert_customer_validation.php';

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/libs/css/style.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
  <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
  <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
  <!-- ============================================================== -->
  <!-- main wrapper -->
  <!-- ============================================================== -->
  <div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
      <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="index.php">Agoro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-right-top">
            <li class="nav-item dropdown nav-user">
              <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
              <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                <div class="nav-user-info">
                  <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['username'];?> </h5>
                  <span class="status"></span><span class="ml-2">Available</span>
                </div>
                <a class="dropdown-item" href="alogout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
      <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
              <li class="nav-divider">
                Menu
              </li>
              <li class="nav-item ">
                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Tables</a>
                <div id="submenu-2" class="collapse submenu" style="">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/brands.php">Brands <span class="badge badge-secondary">New</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/customers.php">Customers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/orders.php">All Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/products.php">Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/payment.php">Payment History</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Insert</a>
                <div id="submenu-3" class="collapse submenu" style="">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-c3.html">C3 Charts</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-chartist.html">Chartist Charts</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-charts.html">Chart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-morris.html">Morris</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-sparkline.html">Sparkline</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/chart-gauge.html">Guage</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Blog Entry</a>
                <div id="submenu-4" class="collapse submenu" style="">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="pages/form-elements.html">Form Elements</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/multiselect.html">Multiselect</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/datepicker.html">Date Picker</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/bootstrap-select.html">Bootstrap Select</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tables</a>
                <div id="submenu-5" class="collapse submenu" style="">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="pages/general-table.html">General Tables</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/data-tables.html">Data Tables</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
      <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
          <!-- ============================================================== -->
          <!-- pageheader  -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h2 class="pageheader-title">Insert Customer</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader  -->
          <!-- ============================================================== -->
          <div class="ecommerce-widget" id="brands">
            <form action="insert_customer.php" method="post" onsubmit="return validation();" name="register">
          		<h2>Register</h2>
          		<p>
          			<label for="username" class="floatLabel">Username</label>
                <br>
          			<input id="username" name="username" type="text" value="<?=@$username?>">*<?php echo $user_error;?>
          		</p>
          		<p>
                <label for="email" class="floatLabel">Email</label>
                <br>
          			<input type="email" name="email" value="<?=@$email?>"/>*<?php echo $email_error;?>
          		</p>
              <p>
                <label for="password" class="floatLabel">Password</label>
                <br>
          			<input type="password" name="password" value="<?=@$password?>"/>*<?php echo $password_error;?>
          		</p>
              <p>
                <label for="confirm_password" class="floatLabel">Confirm Password</label>
                <br>
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
                <br>
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
              <br>
              <input type="text" name="address" value="<?=@$address?>"/>* <?php echo $address_error;?>
          </p>
          		<p>
          			<input type="submit" value="Create My Account" id="submit" name="submit">
          		</p>
          	</form>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <div class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="text-md-right footer-links d-none d-sm-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- end main wrapper  -->
  <!-- ============================================================== -->
  <!-- Optional JavaScript -->
  <!-- jquery 3.3.1 -->
  <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../js/ajax_calls.js"></script>
  <!-- bootstap bundle js -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <!-- slimscroll js -->
  <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
  <!-- main js -->
  <script src="../assets/libs/js/main-js.js"></script>
  <!-- chart chartist js -->
  <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
  <!-- sparkline js -->
  <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
  <!-- morris js -->
  <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
  <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
  <!-- chart c3 js -->
  <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
  <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
  <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
  <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
