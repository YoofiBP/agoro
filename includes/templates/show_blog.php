<?php

include '../classes/cart.php';

$sql =  "SELECT * FROM blog";
$cart = new Cart;
$cart_items = $cart->getCart($sql);
$str = '';
$count = 0;
while ($row = mysqli_fetch_array($cart_items)){
echo '<div class="item-blog p-b-80">

    <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
      '.$row['up_date'].'
    </span>
  </a>

  <div class="item-blog-txt p-t-33">
    <h4 class="p-b-11">
      <a href="blog-detail.html" class="m-text24">
        '.$row['blog_title'].'
      </a>
    </h4>
    <p class="p-b-12">
      '.$row['blog_content'].'
    </p>
  </div>
</div>';
}
?>
