<?php
include '../classes/cart.php';

session_start();
  $amount = $_SESSION['amount'];
  $product_id = $_SESSION['p_id'];
  $customer_id = $_SESSION['id'];
  $currency = $_SESSION['currency_code'];
  $quantity = $_SESSION['qty'];
  $date = $_SESSION['date'];
  $status = '';
  $invoice = mt_rand();
  $con=mysqli_connect("localhost","root","","agoro");

  //inserting into payment table
  $sql = "INSERT INTO payment (amt, customer_id, product_id, currency,payment_date)
  VALUES ('$amount','$customer_id','$product_id','$currency','$date')";
  mysqli_query($con,$sql);
  echo "<h1>Payment successful</h1>";
  echo "<h3>Thank you for shopping with AGORO</h3>";

//getting customer information from customer table
  $sql_id = "SELECT * FROM customer WHERE customer_id=".$customer_id;
  $cust_det = mysqli_query($con,$sql_id);
  while($row = mysqli_fetch_array($cust_det)){
    $name = $row['customer_name'];
    $email = $row['customer_email'];
    $number = $row['customer_contact'];
    $address = $row['customer_address'];
  }

  /*Email Details*/
  $to = $email;
  $subject = 'Your order details';
  $headers = "From: ".strip_tags('email@email.com') . "\r\n";
  $headers .= "Reply-To: ".strip_tags('email@email.com') . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  $message = "<table>
  <th>Transation Details</th>
    <tr>
      <td>Name:</td>
      <td>".$name."</td>
    </tr>
    <tr>
      <td>Email:</td>
      <td>".$email."</td>
    </tr>
    <tr>
      <td>Phone Number:</td>
      <td>".$number."</td>
    </tr>
    <tr>
      <td>Address:</td>
      <td>".$address."</td>
    </tr>
  </table>";

  if(mail($to, $subject, $message, $headers)){
    $status = 'completed';
  }
  else{
    $status = 'in progress';
  }
  /**/
echo "<table>
<th>Customer Details</th>
  <tr>
    <td>Name:</td>
    <td>".$name."</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>".$email."</td>
  </tr>
  <tr>
    <td>Phone Number:</td>
    <td>".$number."</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td>".$address."</td>
  </tr>
</table>
<br>";

echo "<table>
<th>Transation Details</th>
  <tr>
    <td>Name:</td>
    <td>".$name."</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>".$email."</td>
  </tr>
  <tr>
    <td>Phone Number:</td>
    <td>".$number."</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td>".$address."</td>
  </tr>
  <tr>
    <td>Invoice:</td>
    <td>".$invoice."</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td>".$status."</td>
  </tr>
</table>";

//inserting into orders table
$sql2 = "INSERT INTO orders (`product_id`,`customer_id`,`invoice_no`,`qty`,`order-date`,`status`)
VALUES ('$product_id','$customer_id','$invoice','$quantity','$date','$status')";
mysqli_query($con,$sql2);

$empty_cart = New Cart();
$ip = $_SERVER['REMOTE_ADDR'];
$empty_cart->deleteCart($ip);
 ?>
