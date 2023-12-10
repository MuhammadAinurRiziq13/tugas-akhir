<?php

class Barang {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahBarang($nama, $kategori, $hargaBeli, $hargaJual, $supplier, $stock, $foto) {
        $sql = "INSERT INTO barang (nama_barang, id_kategori, harga_beli, harga_jual, id_supplier, stok_barang, gambar) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiiiis", $nama, $kategori, $hargaBeli, $hargaJual, $supplier, $stock, $foto);
    
        // Eksekusi query
        if ($stmt->execute()) {
            return true; // Berhasil menambah barang
        } else {
            return false; // Gagal menambah barang
        }
    }    

    public function getDataBarang() {
        // Ambil data barang dari database
        $sql = "SELECT * FROM barang";
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

    public function deleteBarang($idBarang) {
        // Hapus barang berdasarkan ID
        $sql = "DELETE FROM barang WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idBarang);

        return $stmt->execute();
    }

    public function getBarangById($idBarang) {
        // Ambil data barang berdasarkan ID
        $sql = "SELECT * FROM barang WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idBarang);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateBarang($idBarang, $nama, $kategori, $hargaBeli, $hargaJual, $supplier, $stock, $foto) {
        // Update data barang berdasarkan ID
        $sql = "UPDATE barang SET nama_barang = ?, id_kategori = ?, harga_beli = ?, harga_jual = ?, id_supplier = ?, stok_barang = ?, gambar = ? WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
    
        // Assuming id_kategori, harga_beli, harga_jual, and stok_barang are integers,
        // and supplier is a string, adjust the data types accordingly
        $stmt->bind_param("siiiiisi", $nama, $kategori, $hargaBeli, $hargaJual, $supplier, $stock, $foto, $idBarang);
    
        return $stmt->execute();
    }
    

    public function searchDataBarang($searchTerm) {
        // Saring data barang berdasarkan nama_barang
        $sql = "SELECT * FROM barang WHERE nama_barang LIKE ?";
        $stmt = $this->conn->prepare($sql);
    
        // Tambahkan tanda persen (%) pada awal dan akhir search term untuk mencari nama_barang yang mengandung
        $searchTerm = "%$searchTerm%";
        $stmt->bind_param("s", $searchTerm);
    
        // Eksekusi query
        $stmt->execute();
    
        // Ambil hasil
        $result = $stmt->get_result();
    
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

    public function getDataBarangByCategory($kategori) {
        // Ambil data barang berdasarkan kategori
        $sql = "SELECT * FROM barang WHERE id_kategori = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $kategori);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Mengembalikan hasil dalam bentuk array associative
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getJenisBarang() {
        $query = "SELECT COUNT(*) as total_rows FROM barang";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['total_rows'];
    }

    public function updateStock($idBarang, $quantity) {
        // Fetch the current stock from the database
        $query = "SELECT stok_barang FROM barang WHERE id_barang = $idBarang";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentStock = $row['stok_barang'];

            // Calculate the new stock after the purchase
            $newStock = $currentStock - $quantity;

            // Update the stock in the database
            $updateQuery = "UPDATE barang SET stok_barang = $newStock WHERE id_barang = $idBarang";
            $this->conn->query($updateQuery);
        }
    }
}

?>
