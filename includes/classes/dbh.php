<?php

class dbh
{
  // private $servername;
  private $username;
  private $password;
  private $dbname;

//function to create a database connection
  public function connect()
  {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "agoro";

    $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
    return $conn;
  }

  public function getDbName(){
    return $this->dbname;
  }

}
 ?>
