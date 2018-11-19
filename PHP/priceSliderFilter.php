<?php
include 'database.php';

$obj = new Databases;
$min = intval($_GET['min']);
$max = intval($_GET['max']);
$obj->getProductCatalogueByPriceFilter($min,$max); 
?>