<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php   




$to_email = $_POST['email'];
$subject = "Customer Enquiry";
$message = $_POST['message'];
$headers = 'From: nobeng@yahoo.com . com';
mail($to_email,$subject,$message,$headers);
header('Location: ../index.html');
?>
</body>
</html>