<?php
include 'database.php';

$obj = new Databases;
$min = intval($_GET['min']);
$max = intval($_GET['max']);
/*$min = 100;
$max = 150;*/
$obj->getProductCatalogueByPriceFilter($min,$max); 
?>