<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once '../../classes/Supplier.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Penggunaan class Supplier dalam konteks form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add-supplier'])) {
            $supplierName = $_POST['add-supplier'];

            // Membuat objek Supplier dengan koneksi yang sama
            $supplier = new Supplier($conn);

            // Menambahkan supplier dengan nama yang diinputkan
            $result = $supplier->tambahSupplier($supplierName);

            if ($result) {
                header("Location: ../../index.php?page=supplier");
                exit();
            } else {
                echo "Gagal menambahkan data supplier.";
            }
        }
    }

    ?>