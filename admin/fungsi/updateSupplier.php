<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once '../../classes/supplier.php';  // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $supplier = new Supplier($conn);

    // Memproses form jika ada data yang dikirim
    if (isset($_POST['update'])) {
        // Ambil data dari form
        $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];

        // Panggil method untuk memperbarui barang
        $supplier->updateSupplier($id_supplier, $nama_supplier);

        // Redirect atau tampilkan pesan berhasil
        header("Location: ../../index.php?page=supplier");
        exit();
    } else {
        // Tampilkan pesan gagal
        echo "Akses tidak sah.";
    }
?>
