<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once '../../classes/Barang.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);

    // Memproses form jika ada data yang dikirim
    if (isset($_POST['update'])) {
        // Ambil data dari form
        $idBarang = $_POST['id_barang'];
        $namaBarang = $_POST['nama_barang'];
        $idKategori = $_POST['id_kategori'];
        $hargaBeli = $_POST['harga-beli'];
        $hargaJual = $_POST['harga-jual'];
        $supplier = $_POST['supplier'];
        $stokBarang = $_POST['stok_barang'];
        $gambarBarang = '';

        // Cek apakah ada file yang di-upload
        if (isset($_FILES['foto_barang']) && $_FILES['foto_barang']['error'] == 0) {
            // Simpan foto ke direktori tertentu (misalnya 'uploads/')
            $targetDir = "../../uploads/";
            $gambarBarang = basename($_FILES["foto_barang"]["name"]);
            $targetFile = $targetDir . $gambarBarang;
            
            if (move_uploaded_file($_FILES["foto_barang"]["tmp_name"], $targetFile)) {
                // File berhasil di-upload
            } else {
                echo "File upload failed.";
                exit();
            }
        } else {
            // If no new photo uploaded, retain the existing photo
            $existingData = $barang->getBarangById($idBarang);
            $gambarBarang = $existingData['gambar'];
        }

        // Panggil method untuk memperbarui barang
        $barang->updateBarang($idBarang, $namaBarang, $idKategori, $hargaBeli,$hargaJual,$supplier, $stokBarang, $gambarBarang);

        // Redirect atau tampilkan pesan berhasil
        header("Location: ../../index.php?page=dataBarang");
        exit();
    } else {
        // Tampilkan pesan gagal
        echo "Akses tidak sah.";
    }
?>
