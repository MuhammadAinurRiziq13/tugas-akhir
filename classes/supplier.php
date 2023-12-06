<?php
class Supplier {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahSupplier($nama) {
        $datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO supplier (nama_supplier, tanggal_input) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nama, $datetime);

        // Eksekusi query
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getSuppliers() {
        $sql = "SELECT * FROM supplier";
        $result = $this->conn->query($sql);

        $suppliers = [];
        while ($row = $result->fetch_assoc()) {
            $suppliers[] = $row;
        }

        return $suppliers;
    }

    public function deleteSuppliers($idSupplier) {
        // Hapus barang berdasarkan ID
        $sql = "DELETE FROM supplier WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idSupplier);

        return $stmt->execute();
    }

    public function getSupplierById($idSupplier) {
        // Ambil data barang berdasarkan ID
        $sql = "SELECT * FROM supplier WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idSupplier);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateSupplier($idSupplier, $nama) {
        // Update data supplier berdasarkan ID
        $datetime = date('Y-m-d H:i:s');
        $sql = "UPDATE supplier SET nama_supplier = ?, tanggal_input = ? WHERE id_supplier = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nama, $datetime, $idSupplier);
    
        return $stmt->execute();
    }   
    
    public function searchDataSupplier($searchTerm) {
        // Saring data barang berdasarkan nama_barang
        $sql = "SELECT * FROM supplier WHERE nama_supplier LIKE ?";
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
    
    // public function getSupplierOptions(){
    //     $options = '';

    //     $query = "SELECT * FROM supplier ORDER BY nama_supplier ASC";
    //     $result = $this->conn->query($query);

    //     while ($row = $result->fetch_assoc()) {
    //         $options .= '<option value="' . $row['id_supplier'] . '">' . $row['nama_supplier'] . '</option>';
    //     }

    //     return $options;
    // }

    public function getSupplier(){
        $query = "SELECT * FROM supplier ORDER BY nama_supplier ASC";
        $result = $this->conn->query($query);
    
        $options = array();
        while ($row = $result->fetch_assoc()) {
            $options[] = $row; // Menggunakan seluruh baris sebagai array asosiatif
        }
    
        return $options;
    }
    

    
    
}

