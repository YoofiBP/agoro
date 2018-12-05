<?php
include '../../includes/classes/cart.php';

if(isset($_POST['submit']) and $_POST['blog_title']!= '' and $_POST['content'] !=''){
$cat = new Cart();
$blog_title = $_POST['blog_title'];
$blog_content = $_POST['content'];
$date = date("Y/m/d");
$sql = "INSERT INTO blog (blog_title, blog_content, up_date) VALUES ('$blog_title', '$blog_content', '$date')";
$cat->getCart($sql);

header('Location: ../tables/blogs.php');
}
 ?>
