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
    $this->servername = "sql9.freemysqlhosting.net";
    $this->username = "sql9268188";
    $this->password = "2H5AdyAzBK";
    $this->dbname = "sql9268188";

    $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
    return $conn;
  }

  public function getDbName(){
    return $this->dbname;
  }

}
 ?>
