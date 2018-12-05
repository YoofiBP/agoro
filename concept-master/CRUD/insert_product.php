<?php
session_start();
if(isset($_SESSION['admin'])){

}else{
  header('Location:admin_login.php');
}
include '../../includes/classes/dbh.php';
include '../../includes/classes/brands.php';
include '../../includes/classes/categories.php';
include '../../includes/classes/products.php';
include 'validate_product_insert.php';

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
                <a class="nav-link" href="../index.php">Dashboard</a>
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
              <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Blog Entry</a>
                <div id="submenu-4" class="collapse submenu" style="">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="../tables/blogs.php">View Entries</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="blog_form.php">Add Entry</a>
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
                <h2 class="pageheader-title">Insert Product</h2>
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
            <form action="insert_product.php" method="post" onsubmit="return validation();">
          		<h2>Insert Product</h2>
          		<p>
          			<label for=title class="floatLabel">Product Name</label>
                <br>
          			<input id="title" name="title" type="text" value="<?=@$title?>">*<?php echo $title_error;?>
          		</p>
          		<p>
          			<select name="cat" id="cat">
          				<option value="0">Choose Category</option>
          				<?php
          				$cat = new Category();
          				$cat->dropDownCats();
          				?>
          			</select>*<?php echo $category_error;?>
          		</p>
          		<p>
          			<select name="brand" id="brand">
          				<option value="0">Choose Brand</option>
          				<?php
          				$brand = new Brand();
          				$brand->dropDownBrands();
          				?>
          			</select>*<?php echo $brand_error;?>
          		</p>
          		<p>
          			<label for="price" class="floatLabel">Product Price</label>
          			<br>
          			<input value="<?=@$price?>" id="price" name="price" type="number">*<?php echo $price_error;?>
          		</p>
          		<p>
          			<label for="descr" class="floatLabel">Product Description</label>
                <br>
          			<input  value="<?=@$description?>" id="descr" name="descr" type="text">*<?php echo $description_error;?>
          		</p>
          		<p>
          			<label for="image" class="floatLabel">Upload Product Images</label>
          			<br>
          			<input id="image" name="image" type="file">*<?php echo $file_error;?>
          		</p>
          		<p>
          			<label for="keywords" class="floatLabel">Enter keywords</label>
                <br>
          			<input value="<?=@$key_words?>" id="keywords" name="keywords" type="text">*<?php echo $keyword_error;?>
          		</p>
          		<p>
          			<input type="submit" value="Insert product" id="submit" name="submit">
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
