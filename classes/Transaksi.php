<?php
class Transaksi {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addTransaksi($idUser, $totalTransaksi) {
        // Insert into 'transaksi' table
        $tanggalTransaksi = date("Y-m-d H:i:s"); // Current date and time

        $insertTransaksiQuery = "INSERT INTO transaksi (id_user, total_transaksi, tanggal_transaksi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($insertTransaksiQuery);
        $stmt->bind_param("iis", $idUser, $totalTransaksi, $tanggalTransaksi);
        $stmt->execute();

        // Get the last inserted ID (id_transaksi)
        return $this->conn->insert_id;
    }

    public function addDetailTransaksi($idBarang, $idTransaksi, $quantity) {
        // Insert into 'detail_transaksi' table
        $insertDetailQuery = "INSERT INTO detail_transaksi (id_barang, id_transaksi, qty) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($insertDetailQuery);
        $stmt->bind_param("iii", $idBarang, $idTransaksi, $quantity);
        $stmt->execute();
    }

    public function calculateTotalPrice($cart, $barang) {
        $totalPrice = 0;
    
        if (!empty($cart)) {
            foreach ($cart as $cartItem) {
                $id_barang = $cartItem["id_barang"];
                $itemQuantity = $cartItem["quantity_" . $id_barang];
    
                // Query ke database untuk mendapatkan informasi barang
                $item = $barang->getBarangById($id_barang);
    
                // Calculate total price for each item
                $itemPrice = $item['harga_jual'] * $itemQuantity;
    
                // Update total price
                $totalPrice += $itemPrice;
            }
        }
    
        return $totalPrice;
    }

    public function getDetailTransaksiById($idTransaksi)
    {
        $sql = "SELECT dt.*, b.nama_barang, b.harga_jual FROM detail_transaksi dt
                INNER JOIN barang b ON dt.id_barang = b.id_barang
                WHERE dt.id_transaksi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idTransaksi);
        $stmt->execute();
        $result = $stmt->get_result();

        $detailTransaksi = array();

        while ($row = $result->fetch_assoc()) {
            $detailTransaksi[] = $row;
        }

        return $detailTransaksi;
    }

    public function getTotalTransaksiById($idTransaksi)
    {
        $sql = "SELECT total_transaksi FROM transaksi WHERE id_transaksi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idTransaksi);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        return $row['total_transaksi'];
    }
    
}
?>
