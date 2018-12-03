<?php
// include_once 'includes/classes/dbh.php';
// include_once 'includes/classes/products.php';
$error = "";

$title_error = '';
$category_error = '';
$brand_error = '';
$price_error = '';
$description_error = '';
$file_error = '';
$i_error = '';
$keyword_error = '';

if(isset($_POST['submit'])){
  $title = trim($_POST['title']);
  $category = $_POST['cat'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];
  $description = $_POST['descr'];
  $key_words = $_POST['keywords'];
  $uploaddir = 'img/';
  $image = $uploaddir.basename($_FILES['image']['name']);

  if($title == ""){
    $title_error = 'Please enter title';
    $error .= $title_error;
  }

  if($category == "0"){
    $category_error = 'Please select a category';
    $error .= $category_error;
  }

  if($brand == "0"){
    $brand_error = 'Please select a brand';
    $error .= $brand_error;
  }

  if($price ==""){
    $price_error = 'Please enter price';
    $error .= $price_error;
  }

  if(!ctype_digit($price)){
    $price_error = 'Please enter a valid price';
    $error .= $price_error;
  }

  if($description == ""){
    $description_error = 'Please enter  a description';
    $error .= $description_error;
  }

  if($key_words == ""){
    $keyword_error = 'Please enter a keywords';
    $error .= $keyword_error;
  }

  if (isset($_FILES["image"])) {
$allowedExts = array("jpg", "jpeg", "png");
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);

if ($_FILES["image"]["error"] > 0) {
  $i_error .= "Error opening the file<br />";
}
if (!in_array($extension, $allowedExts)) {
  $i_error .= "Extension not allowed<br />";
}
if ($_FILES["image"]["size"] > 204800) {
  $i_error .= "File size_ shoud be less than 200 kB<br />";
}

if ($error == "") {
  move_uploaded_file($_FILES['image']['tmp_name'], $image);
} else {
  $file_error = $i_error;
}
}

if(empty($error)){
  $prod = new Product();
  $prod->insertProduct($cat,$brand,$title,$price,$description,$image,$key_words);
  header('Location:index.php');
}
} ?>
