<?php

class Category extends dbh {
  private $cat_name;

//function to create category table in sql if it does not exist
public function createCatTable(){
  $this->sql = "CREATE TABLE IF NOT EXISTS 'category' (
  'cat_id' int(100) NOT NULL,
  'cat_name' text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
}

//function to insert a category into category table
public function insertCat($cat_name){
  $sql = "INSERT INTO categories (cat_name) VALUES ('$cat_name')";
  mysqli_query($this->connect(), $sql);
}

//function to list all categories in a dropdown on the insertp product page
public function dropDownCats(){
  $sql = "SELECT cat_id, cat_name FROM categories";
  $qwe = mysqli_query($this->connect(),$sql);
  while ($row = mysqli_fetch_array($qwe)){
    echo "<option value=".$row['cat_id']." name=".$row['cat_name'].">".$row['cat_name']."</option>";
  }
}
}
 ?>
