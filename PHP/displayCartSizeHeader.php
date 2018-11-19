<?php 
include 'database.php';

$obj = new Databases;
echo $obj->getCartSize();
?>