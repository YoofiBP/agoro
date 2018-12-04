<?php
//include '../includes/classes/dbh.php';
include '../includes/classes/cart.php';

echo "<div class='row'>
    <div class='col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12'>
      <div class='card'>
        <h5 class='card-header'>Recent Orders</h5>
        <div class='card-body p-0'>
          <div class='table-responsive'>";

echo "<table class='table'>
  <thead class='bg-light'>
    <tr class='border-0'>
      <th class='border-0'>#</th>
      <th class='border-0'>Image</th>
      <th class='border-0'>Product Name</th>
      <th class='border-0'>Product Id</th>
      <th class='border-0'>Quantity</th>
      <th class='border-0'>Price</th>
      <th class='border-0'>Order Date</th>
      <th class='border-0'>Status</th>
    </tr>
  </thead>
  <tbody>";

  $sql =  "SELECT products.product_id, products.product_image, products.product_title, orders.qty, products.product_price, orders.invoice_no, orders.`order-date` FROM products, orders WHERE products.product_id = orders.product_id";
  $cart = new Cart;
  $cart_items = $cart->getCart($sql);
  $str = '';
  $count = 0;
  while ($row = mysqli_fetch_array($cart_items)){
    $count +=1;
    $str= $str."<tr>
      <td>".$count."</td>
      <td>
        <div class='m-r-10'><img src='../".$row['product_image']."' alt='user' class='rounded' width='45'></div>
      </td>
      <td>".$row['product_title']."</td>
      <td>".$row['product_id']."</td>
      <td>".$row['qty']."</td>
      <td>".$row['product_price']."</td>
      <td>".$row['order-date']."</td>
      <td><span class='badge-dot badge-brand mr-1'></span>InTransit </td>
    </tr>
    ";
}

echo $str;
echo "</div>
</div>
</div>
</div>";


$sql2 = "SELECT SUM(product_price) FROM (SELECT products.product_id, products.product_image, products.product_title, orders.qty, products.product_price, orders.invoice_no, orders.`order-date` FROM products, orders WHERE products.product_id = orders.product_id) AS Some";
$totals = $cart->getCart($sql2);
$ovr = 0;
while($rev = mysqli_fetch_array($totals)){
  $ovr = $rev['SUM(product_price)'];
}
echo"
<div class='col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12'>
  <div class='card border-3 border-top border-top-primary'>
    <div class='card-body'>
      <h5 class='text-muted'>Sales Total</h5>
      <div class='metric-value d-inline-block'>
        <h1 class='mb-1'>Ghc ".$ovr."</h1>
      </div>
    </div>
  </div>
</div>
</div>";

echo "</tbody>
</table>";
?>
