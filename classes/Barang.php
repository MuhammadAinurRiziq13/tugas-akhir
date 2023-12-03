<?php

class Barang {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahBarang($nama, $kategori, $hargaJual, $stock, $foto) {
        $sql = "INSERT INTO barang (nama_barang, id_kategori, harga_barang, stok_barang, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiis", $nama, $kategori, $hargaJual, $stock, $foto);

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

    public function updateBarang($idBarang, $nama, $kategori, $hargaJual, $stock, $foto) {
        // Update data barang berdasarkan ID
        $sql = "UPDATE barang SET nama_barang = ?, id_kategori = ?, harga_barang = ?, stok_barang = ?, gambar = ? WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiisi", $nama, $kategori, $hargaJual, $stock, $foto, $idBarang);

        return $stmt->execute();
    }
}

?>
