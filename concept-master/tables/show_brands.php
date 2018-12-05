<?php
//include '../includes/classes/dbh.php';
include '../../includes/classes/cart.php';

echo "<div class='row'>
    <div class='col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12'>
      <div class='card'>
        <h5 class='card-header'>Brands List</h5>
        <div class='card-body p-0'>
          <div class='table-responsive'>";

echo "<table class='table'>
  <thead class='bg-light'>
    <tr class='border-0'>
      <th class='border-0'>#</th>
      <th class='border-0'>Brand Id</th>
      <th class='border-0'>Brand Name</th>
      <th class='border-0'></th>
    </tr>
  </thead>
  <tbody>";

  $sql =  "SELECT * FROM brands";
  $cart = new Cart;
  $cart_items = $cart->getCart($sql);
  $str = '';
  $count = 0;
  while ($row = mysqli_fetch_array($cart_items)){
    $count +=1;
    $str= $str."<tr>
      <td>".$count."</td>
      <td>".$row['brand_id']."</td>
      <td>".$row['brand_name']."</td>
      <td><a href='../CRUD/delete_brand.php?n=".$row['brand_id']."'>Delete</a></td>
    </tr>
    ";
}

echo $str;

echo "
<tr><td><a href='../CRUD/insert_brand.php'>Add Brand</a></td></tr>
</div>
</div>
</div>
</div>";
echo "  </tbody>
</table>";
?>
