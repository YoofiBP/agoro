<?php

class Product extends dbh {
  public $product_cat;
  public $product_brand;
  public $product_title;
  public $product_price;
  public $product_desc;
  public $product_image;
  public $product_keywords;
  public $sql;

//function to create a product table if it does not already exist
  public function createProductTable(){
    $this->sql = "CREATE TABLE IF NOT EXISTS 'products' (
    'product_id' int(100) NOT NULL,
    'product_cat' int(100) NOT NULL,
    'product_brand' int(100) NOT NULL,
    'product_title' varchar(255) NOT NULL,
    'product_price' int(100) NOT NULL,
    'product_desc' text NOT NULL,
    'product_image' text NOT NULL,
    'product_keywords' text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    mysqli_query($this->connect(),$this->sql);
  }

//function to insert product into products table given key details
  public function insertProduct($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){
    $ssql = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
      VALUES ('$product_cat',
      '$product_brand',
      '$product_title',
      '$product_price',
      '$product_desc',
      '$product_image',
      '$product_keywords')";
      mysqli_query($this->connect(),$ssql);
  }

//returns an array of products in database
  public function getProducts(){
    $sql = "SELECT product_title FROM products";
    $qwe = mysqli_query($this->connect(),$sql);
    $prod_array = Array();
    while ($row = mysqli_fetch_array($qwe)){
      $prod_array[] = $row['product_title'];
    }
    return $prod_array;
  }

//gets products based on a particular query specification
  public function getProductByQuery($sql){
    $qwe = mysqli_query($this->connect(),$sql);
    return $qwe;
  }
}
 ?>
