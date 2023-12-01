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
    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

    if (mysqli_connect_errno()) {
      die("Koneksi database gagal: " . mysqli_connect_error());
    }
  }
  // public function executeQuery($query) {
  //   // $result = mysqli_query($this->conn, $query);
  //   $result = $this->conn->query($query);
  //   return $result;
  // }
}

// $koneksi = new Database();
?>
