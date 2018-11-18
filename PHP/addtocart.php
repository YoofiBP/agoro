<?php
include 'database.php';

$obj = new Databases;
$insert_data = array(
	'p_id' => $_POST['pid'],
	'ip_add' => $_SERVER['REMOTE_ADDR'],
	'qty' => $_POST['qty']
);

$obj->add2cart($insert_data);
?>