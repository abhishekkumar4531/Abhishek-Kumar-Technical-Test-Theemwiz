<?php

class Connection {

  public $host = "localhost";
  public $user = "root";
  public $pwd = "Abhi31@my";
  public $db = "Theem";
  public $conn;


  public function __construct() {
    $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->db);
  }
}

?>
