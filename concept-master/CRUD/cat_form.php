<?php
include '../../includes/classes/dbh.php';
include '../../includes/classes/categories.php';

if(isset($_POST['submit']) and $_POST['cat_name']!= ''){
$cat = new Category();
$cat_name = $_POST['cat_name'];
$cat->insertCat($cat_name);

header('Location: ../tables/categories.php');
}
 ?>
