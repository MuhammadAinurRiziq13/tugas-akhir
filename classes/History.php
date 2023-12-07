<?php
class History {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getHistory() {
        $sql = "
            SELECT 
                t.tanggal_transaksi, 
                CASE
                    WHEN LENGTH(b.nama_barang) > 40 THEN CONCAT(LEFT(b.nama_barang, 40), '...')
                    ELSE b.nama_barang
                END AS nama_barang,
                SUM(t.total_transaksi) AS total_transaksi,
                SUM(dt.qty) AS total_qty
            FROM 
                transaksi t
            INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
            INNER JOIN barang b ON dt.id_barang = b.id_barang
            GROUP BY t.tanggal_transaksi, t.id_transaksi;
        ";
        $result = $this->conn->query($sql);

        // Cek jika ada data
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function getDetailHistory(){
        $sql="
            SELECT nama_barang, harga_barang, qty, (qty * harga_barang)
            FROM barang b
            INNER JOIN detail_transaksi d ON b.id_barang = d.id_barang
            WHERE id_transaksi = 1;
        ";

        $result = $this->conn->query($sql);

        // Cek jika ada data
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }    
}
?>