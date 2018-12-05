<?php
//include '../includes/classes/dbh.php';
include '../../includes/classes/cart.php';

echo "<div class='row'>
    <div>
      <div class='card'>
        <h5 class='card-header'>Product List</h5>
        <div class='card-body p-0'>
          <div class='table-responsive'>";

echo "<table class='table'>
  <thead class='bg-light'>
    <tr class='border-0'>
      <th class='border-0'>#</th>
      <th class='border-0'>Product Image</th>
      <th class='border-0'>Product Id</th>
      <th class='border-0'>Product Title</th>
      <th class='border-0'>Product Category</th>
      <th class='border-0'>Product Brand</th>
      <th class='border-0'>Product Price</th>
      <th class='border-0'>Product Description</th>
    </tr>
  </thead>
  <tbody>";

  $sql =  "SELECT * FROM products";
  $cart = new Cart;
  $cart_items = $cart->getCart($sql);
  $str = '';
  $count = 0;
  while ($row = mysqli_fetch_array($cart_items)){
    $count +=1;
    $str= $str."<tr>
      <td>".$count."</td>
      <td><img src='../../".$row['product_image']."'style='height:80px;'/></td>
      <td>".$row['product_id']."</td>
      <td>".$row['product_title']."</td>
      <td>".$row['product_cat']."</td>
      <td>".$row['product_brand']."</td>
      <td>".$row['product_price']."</td>
      <td>".$row['product_desc']."</td>
      <td><a href='../CRUD/delete_product.php?n=".$row['product_id']."'>Delete</a></td>
    </tr>
    ";
}

echo $str;

echo "
<tr><td><a href='../CRUD/insert_product.php'>Add Product</a></td></tr>
</div>
</div>
</div>
</div>";
echo "  </tbody>
</table>";
?>
