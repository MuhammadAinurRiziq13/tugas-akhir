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
                WHEN LENGTH(GROUP_CONCAT(' ', b.nama_barang)) > 40 
                THEN 
                    CONCAT(LEFT(GROUP_CONCAT(' ', b.nama_barang), 40), ' ...')
                ELSE 
                    GROUP_CONCAT(' ',b.nama_barang)
            END AS nama_barang,
            t.total_transaksi,
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

    public function searchHistoryByMonth($month) {
        $sql = "  
        SELECT 
            t.tanggal_transaksi, 
            t.id_transaksi,
            CASE
                WHEN LENGTH(GROUP_CONCAT(' ', b.nama_barang)) > 40 
                THEN 
                    CONCAT(LEFT(GROUP_CONCAT(' ', b.nama_barang), 40), ' ...')
                ELSE 
                    GROUP_CONCAT(' ',b.nama_barang)
            END AS nama_barang,
            t.total_transaksi,
            SUM(dt.qty) AS total_qty
        FROM 
            transaksi t
        INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
        INNER JOIN barang b ON dt.id_barang = b.id_barang
        WHERE MONTH(tanggal_transaksi) = $month
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

    public function searchHistoryByYear($year) {
        $sql = "  
        SELECT 
            t.tanggal_transaksi, 
            t.id_transaksi,
            CASE
                WHEN LENGTH(GROUP_CONCAT(' ', b.nama_barang)) > 40 
                THEN 
                    CONCAT(LEFT(GROUP_CONCAT(' ', b.nama_barang), 40), ' ...')
                ELSE 
                    GROUP_CONCAT(' ',b.nama_barang)
            END AS nama_barang,
            t.total_transaksi,
            SUM(dt.qty) AS total_qty
        FROM 
            transaksi t
        INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
        INNER JOIN barang b ON dt.id_barang = b.id_barang
        WHERE YEAR(tanggal_transaksi) = $year
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

    public function searchHistoryByMonthYear($month, $year) {
        $sql = "  
        SELECT 
            t.tanggal_transaksi, 
            t.id_transaksi,
            CASE
                WHEN LENGTH(GROUP_CONCAT(' ', b.nama_barang)) > 40 
                THEN 
                    CONCAT(LEFT(GROUP_CONCAT(' ', b.nama_barang), 40), ' ...')
                ELSE 
                    GROUP_CONCAT(' ',b.nama_barang)
            END AS nama_barang,
            t.total_transaksi,
            SUM(dt.qty) AS total_qty
        FROM 
            transaksi t
        INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
        INNER JOIN barang b ON dt.id_barang = b.id_barang
        WHERE MONTH(tanggal_transaksi) = $month AND YEAR(tanggal_transaksi) = $year
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

    public function getDetailHistoryById($idTransaksi)
    {
        $sql = "SELECT dt.*, b.nama_barang, b.harga_jual, (dt.qty * b.harga_jual) as total_harga FROM detail_transaksi dt
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
    


}
?>