<?php
session_start();
//include 'config.php';
include '../classes/cart.php';

$sql =  "SELECT products.product_id, products.product_image, products.product_title, cart.qty, products.product_price FROM products, cart WHERE products.product_id = cart.p_id";
$cart = new Cart();
$pay_items = $cart->getCart($sql);
$total_price = 0;
while ($row = mysqli_fetch_array($pay_items)){
  $tot = $row['product_price']*$row['qty'];
  $total_price = $total_price+$tot;
  $title = $row['product_title'];
  $price = $row['product_price'];
  $quantity = $row['qty'];
  $id = $row['product_id'];
}
echo "</table>";
echo "<br>";
echo "<h2 style='float:right;'>Total price is GHS ".$total_price."</h2>";
echo "<br>";
echo "<br>";
// echo "<form style='float:right;' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
echo "<form style='float:right;' action='payment_success.php' method='post'>

  <!-- Identify your business so that you can collect the payments. -->
  <input type='hidden' name='busines' value='herschelgomez@xyzzyu.com'>

  <!-- Specify a Buy Now button. -->
  <input type='hidden' name='cmd' value='_xclick'>

  <!-- Specify details about the item that buyers will purchase. -->
  <input type='hidden' name='item_name' value=".$title.">
  <input type='hidden' name='amount' value=".$price.">
  <input type='hidden' name='quantity' value=".$quantity.">
  <input type='hidden' name='id' value=".$id.">
  <input type='hidden' name='currency_code' value='USD'>

  <!-- Display the payment button. -->
  <input type='image' name='submit' border='0'
  src='https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif'
  alt='Buy Now'>
  <img alt='' border='0' width='1' height='1'
  src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' >
</form>";
$_SESSION['amount'] = $price;
$_SESSION['p_id'] = $id;
$_SESSION['date'] = date("Y/m/d");
$_SESSION['qty'] = $quantity;
 ?>
