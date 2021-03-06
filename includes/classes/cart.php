<?php
include 'dbh.php';

class Cart extends dbh {
  public $product_id;
  public $ip_add;
  public static $qty;

//function to add item to cart. Takes product id, ip address and $quantity
  public function addToCart($product_id, $ip_add, $qty) {
    $check = "SELECT * FROM cart WHERE p_id =".$product_id." AND ip_add LIKE '".$ip_add."'";
    $check_query = mysqli_query($this->connect(), $check);
    if(mysqli_num_rows($check_query)){
      $message = "You can't do that!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else {
    $sql = "INSERT INTO cart (p_id, ip_add, qty) VALUES ('$product_id','$ip_add','$qty')";
    mysqli_query($this->connect(), $sql);
  }
  }

//function to increase the quantity of a product in a cart
  public function qtyplus($product_id, $ip_add, $qty){
    $check = "SELECT * FROM cart WHERE p_id =".$product_id." AND ip_add LIKE '".$ip_add."'";
    $check_query = mysqli_query($this->connect(), $check);
    if(mysqli_num_rows($check_query)){
      while($row=mysqli_fetch_array($check_query))
      {
        $quantity = (int)$row['qty'] + (int)$qty;
      }
      $update = "UPDATE cart SET qty ='".$quantity."' WHERE p_id =".$product_id." AND ip_add LIKE '".$ip_add."'";
      mysqli_query($this->connect(), $update);
    }
    else{
      addToCart($product_id, $ip_add, $qty);
    }
    }

//function to remove a product from the cart
  public function removeProduct($product_id){
    $sql = "DELETE FROM cart WHERE p_id =".$product_id;
    mysqli_query($this->connect(), $sql);
  }

//function to decrease the quantity of a product in a cart. If there is only one item in the Cart
//the function removes the product by calling removeProduct
    public function qtyminus($product_id, $ip_add, $qty){
      $check = "SELECT * FROM cart WHERE p_id =".$product_id." AND ip_add LIKE '".$ip_add."'";
      $check_query = mysqli_query($this->connect(), $check);
      if(mysqli_num_rows($check_query)){
        while($row=mysqli_fetch_array($check_query))
        {
          if((int)$row['qty']==1){
            $this->removeProduct($product_id);
          }
          else{
          $quantity = (int)$row['qty'] - (int)$qty;
        }
        }
        $update = "UPDATE cart SET qty ='".$quantity."' WHERE p_id =".$product_id." AND ip_add LIKE '".$ip_add."'";
        mysqli_query($this->connect(), $update);
      }
      else{
        $message = "Item not in cart!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      }

//function to get the items in a cart
  public function getCart($sql) {
    $qwe = mysqli_query($this->connect(), $sql);
    return $qwe;
  }

//function to delete all items in cart for a given user
  public function deleteCart($ip){
    $sql = "DELETE FROM cart WHERE ip_add='".$ip."'";
    mysqli_query($this->connect(),$sql);
  }
}
?>
