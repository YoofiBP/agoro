<?php
//include '../includes/classes/dbh.php';
include '../includes/classes/cart.php';

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
echo "  </tbody>
</table>";
?>
