<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once '../../classes/Supplier.php'; // Pastikan file Item.php sudah di-include

    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class barang
    $supplier = new Supplier($conn);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
    $idSuplierToDelete = $_GET["id"];

    // Memanggil method untuk menghapus barang
    if ($supplier->deleteSuppliers($idSuplierToDelete)) {
        // Redirect atau tampilkan pesan berhasil
        header("Location: ../../index.php?page=supplier");
        exit();
    } else {
        // Tampilkan pesan gagal
        echo "Gagal menghapus barang";
    }
}
?>
