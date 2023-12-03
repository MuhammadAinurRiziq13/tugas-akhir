<?php
    require_once '../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'Barang.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);

    // Memproses form jika ada data yang dikirim
    if (isset($_POST['update'])) {
        // Ambil data dari form
        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $id_kategori = $_POST['id_kategori'];
        $harga_barang = $_POST['harga_barang'];
        $stok_barang = $_POST['stok_barang'];
        $gambar_barang = '';

        // Lakukan validasi data jika diperlukan

        // Cek apakah ada file yang di-upload
        if (isset($_FILES['foto_barang']) && $_FILES['foto_barang']['error'] == 0) {
            // Simpan foto ke direktori tertentu (misalnya 'uploads/')
            $targetDir = "../uploads/";
            $gambar_barang = basename($_FILES["foto_barang"]["name"]);
            $targetFile = $targetDir . $gambar_barang;
            
            if (move_uploaded_file($_FILES["foto_barang"]["tmp_name"], $targetFile)) {
                // File berhasil di-upload
            } else {
                echo "File upload failed.";
                exit();
            }
        }

        // Panggil method untuk memperbarui barang
        $barang->updateBarang($id_barang, $nama_barang, $id_kategori, $harga_barang, $stok_barang, $gambar_barang);

        // Redirect atau tampilkan pesan berhasil
        header("Location: ../index.php?page=dataBarang");
        exit();
    } else {
        // Tampilkan pesan gagal
        echo "Akses tidak sah.";
    }
?>
