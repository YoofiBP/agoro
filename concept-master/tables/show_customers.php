<?php
//include '../includes/classes/dbh.php';
include '../../includes/classes/cart.php';

echo "<div class='row'>
    <div>
      <div class='card'>
        <h5 class='card-header'>Customers List</h5>
        <div class='card-body p-0'>
          <div class='table-responsive'>";

echo "<table class='table'>
  <thead class='bg-light'>
    <tr class='border-0'>
      <th class='border-0'>#</th>
      <th class='border-0'>Customer Id</th>
      <th class='border-0'>Customer Name</th>
      <th class='border-0'>Customer Email</th>
      <th class='border-0'>Country</th>
      <th class='border-0'>Accra</th>
      <th class='border-0'>Phone</th>
      <th class='border-0'>Address</th>
    </tr>
  </thead>
  <tbody>";

  $sql =  "SELECT * FROM customer";
  $cart = new Cart;
  $cart_items = $cart->getCart($sql);
  $str = '';
  $count = 0;
  while ($row = mysqli_fetch_array($cart_items)){
    $count +=1;
    $str= $str."<tr>
      <td>".$count."</td>
      <td>".$row['customer_id']."</td>
      <td>".$row['customer_name']."</td>
      <td>".$row['customer_email']."</td>
      <td>".$row['customer_country']."</td>
      <td>".$row['customer_city']."</td>
      <td>".$row['customer_contact']."</td>
      <td>".$row['customer_address']."</td>
      <td><a href='../CRUD/delete_customer.php?n=".$row['customer_id']."'>Delete</a></td>
    </tr>
    ";
}

echo $str;

echo "
<tr><td><a href='../CRUD/insert_customer.php'>Add Customer</a></td></tr>
</div>
</div>
</div>
</div>";
echo "  </tbody>
</table>";
?>
