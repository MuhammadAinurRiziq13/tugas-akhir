<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    $sql = "SELECT id_transaksi from transaksi where selesai = 't'";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
      $idUser = 2;
      $total = 0;
      $tgl = date("Y-m-d H:i:s");
      $status = 't';
      $sql = 'INSERT INTO transaksi (id_user, total_transaksi, tanggal_transaksi, selesai)
                    values (?, ?, ?, ?)';
      $result = $conn -> prepare($sql);
      $result -> bind_param("iiss", $idUser, $total, $tgl, $status);
      $result -> execute();
    } 

    $sql = "Select id_transaksi from transaksi where selesai = 't'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    $idTransaksi = $result['id_transaksi'];

    if (!empty($_GET['jual'])) {
      $id = htmlentities($_POST['id_barang']);

      // Get to know stok_barang
      $sql = 'SELECT stok_barang FROM barang WHERE id_barang = ?';
      $result = $conn->prepare($sql);
      $result -> bind_param("i", $id);
      $result-> execute();
      $stok = $result -> bind_result($stok_barang);
      // Close the previous result set before preparing and executing a new statement
      $result -> close();
      // print_r($id. "\n". $row);
      
      if ($stok > 0) {
        $sql = 'SELECT id_barang FROM detail_transaksi WHERE id_barang = $id';
        // $result = $conn->prepare($sql);
        $result = $conn-> query($sql);
        $result -> fetch_assoc();
        if ($result->num_rows != 0) {
          # Kode untuk mengupdate qty pada tabel detail transaksi where id_transaksi = ? 
          #                                                and id_barang = ? and qty = ?
        } else {
          # Jika id_barang belum ada dalam transaksi dengan id_transaksi = $id_transaksi
        }
        
        // Buat detail item
        $sql = 'INSERT into detail_transaksi values (?, ?, 1)';
        $result = $conn->prepare($sql);
        $result -> bind_param("ii", $id, $idTransaksi);
        $result -> execute();
            
        echo '<script>window.location="../../index.php?page=transaksi"</script>';
        // echo '<script>window.location="../../index.php?page=transaksi&success=tambah-data"</script>';
      } else {
        echo '<script>alert("Stok Barang Anda Telah Habis !");
				window.location="../../index.php?page=transaksi"</script>';
      }
    }
?>
