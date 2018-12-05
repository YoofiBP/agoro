<?php
include '../../includes/classes/dbh.php';
include '../../includes/classes/brands.php';

if(isset($_POST['submit'])){
$brand = new Brand();
$brand_name = $_POST['brand_name'];
$brand->insertBrand($brand_name);

header('Location: ../tables/brands.php');
}
 ?>
