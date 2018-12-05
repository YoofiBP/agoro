<?php 
include 'database.php';

$pid = $_GET['pid'];
$qty = $_GET['qty'];
$d = new Databases;
$d->updateCartItemQty($qty,$pid);
?>