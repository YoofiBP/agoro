<?php 
include 'database.php';

$pid = $_GET['pid'];
$a = new Databases;
echo $a->removeFromCart($pid);

?>