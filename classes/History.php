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
            t.id_transaksi,
            CASE
                WHEN LENGTH(b.nama_barang) > 40 
                THEN 
                    GROUP_CONCAT(LEFT(b.nama_barang, 40), '...')
                ELSE 
                    GROUP_CONCAT(' ', b.nama_barang)
            END AS nama_barang,
            t.total_transaksi,
            SUM(dt.qty) AS total_qty,
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
    public function getDetailHistory($idx){
        $sql="
            SELECT nama_barang, harga_jual, qty, (qty * harga_jual) as total, SUM(t.total_transaksi) AS total_transaksi
            FROM barang b
            INNER JOIN detail_transaksi d ON b.id_barang = d.id_barang
            INNER JOIN transaksi t ON t.id_transaksi = d.id_transaksi
            WHERE d.id_transaksi = $idx
            GROUP BY b.id_barang;
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