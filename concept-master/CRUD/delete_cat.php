<?php
include '../../includes/classes/cart.php';

$id = $_REQUEST['n'];
$sql = "DELETE FROM categories WHERE cat_id=".$id;
$cart = new Cart();
$br = $cart->getCart($sql);
echo $sql;
header('Location: ../tables/categories.php');
 ?>
