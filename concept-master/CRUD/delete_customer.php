<?php
include '../../includes/classes/cart.php';

$id = $_REQUEST['n'];
$sql = "DELETE FROM customer WHERE customer_id=".$id;
$cart = new Cart();
$br = $cart->getCart($sql);
echo $sql;
header('Location: ../tables/customers.php');
 ?>
