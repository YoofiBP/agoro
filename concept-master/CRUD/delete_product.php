<?php
include '../../includes/classes/cart.php';

$id = $_REQUEST['n'];
$sql = "DELETE FROM products WHERE product_id=".$id;
$cart = new Cart();
$br = $cart->getCart($sql);
echo $sql;
header('Location: ../tables/products.php');
 ?>
