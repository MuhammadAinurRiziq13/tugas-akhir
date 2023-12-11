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
        if ($result) {
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
        if ($result) {
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
        if ($result) {
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
        if ($result) {
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

    public function getHistoryBySupplier($idx){
        $sql="
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
            SUM((dt.qty * b.harga_jual)-(dt.qty * b.harga_beli)) AS keuntungan,
            SUM(dt.qty) AS total_qty
        FROM 
            transaksi t
        INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
        INNER JOIN barang b ON dt.id_barang = b.id_barang
        INNER JOIN supplier s ON s.id_supplier = b.id_supplier
        WHERE s.id_supplier = $idx
        GROUP BY t.tanggal_transaksi, t.id_transaksi;
        ";

        $result = $this->conn->query($sql);

        // Cek jika ada data
        if ($result) {
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