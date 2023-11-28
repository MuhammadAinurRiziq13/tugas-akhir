<?php
class Database {
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $db_name = "web_kantin";
  public $conn;

  public function __construct() {
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
      if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
      }
  }
}
?>
