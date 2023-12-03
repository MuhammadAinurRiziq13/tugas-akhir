<?php
    require_once '../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'Barang.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);

    // Memproses form jika ada data yang dikirim
    if (isset($_POST['submit']) && $_POST['submit'] == 'simpan') {
        // Ambil data dari form
        $namaBarang = $_POST['nama-barang'];
        $kategori = $_POST['kategori'];
        $hargaJual = $_POST['harga-jual'];
        $stock = $_POST['stock'];
        $fotoBarang = $_FILES['foto-barang']['name'];

        // Lakukan validasi data jika diperlukan

        // Simpan foto ke direktori tertentu (misalnya 'uploads/')
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES["foto-barang"]["name"]);
        move_uploaded_file($_FILES["foto-barang"]["tmp_name"], $targetFile);

        // Panggil method untuk menambahkan barang
        if ($barang->tambahBarang($namaBarang, $kategori, $hargaJual, $stock, $fotoBarang)) {
            // Redirect atau tampilkan pesan berhasil
            header("Location: ../index.php?page=dataBarang");
            exit();
        } else {
            // Tampilkan pesan gagal
            echo "Gagal menambah barang";
        }
    }
    ?>