<?php
//include '../includes/classes/dbh.php';
include '../../includes/classes/cart.php';

echo "<div class='row'>
    <div>
      <div class='card'>
        <h5 class='card-header'>Orders List</h5>
        <div class='card-body p-0'>
          <div class='table-responsive'>";

echo "<table class='table'>
  <thead class='bg-light'>
    <tr class='border-0'>
      <th class='border-0'>#</th>
      <th class='border-0'>Order Id</th>
      <th class='border-0'>Product Id</th>
      <th class='border-0'>Customer Id</th>
      <th class='border-0'>Invoice Number</th>
      <th class='border-0'>Quantity</th>
      <th class='border-0'>Date</th>
      <th class='border-0'>Status</th>
    </tr>
  </thead>
  <tbody>";

  $sql =  "SELECT * FROM orders";
  $cart = new Cart;
  $cart_items = $cart->getCart($sql);
  $str = '';
  $count = 0;
  while ($row = mysqli_fetch_array($cart_items)){
    $count +=1;
    $str= $str."<tr>
      <td>".$count."</td>
      <td>".$row['order_id']."</td>
      <td>".$row['product_id']."</td>
      <td>".$row['customer_id']."</td>
      <td>".$row['invoice_no']."</td>
      <td>".$row['qty']."</td>
      <td>".$row['order-date']."</td>
      <td>".$row['status']."</td>
    </tr>
    ";
}

echo $str;

echo "
</div>
</div>
</div>
</div>";
echo "  </tbody>
</table>";
?>
