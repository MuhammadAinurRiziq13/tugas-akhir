<?php
    require_once '../../config/config.php'; // Pastikan file Database.php sudah di-include
    require_once '../../classes/Barang.php'; // Pastikan file Item.php sudah di-include

    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class barang
    $barang = new Barang($conn);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
    $idBarangToDelete = $_GET["id"];

    // Memanggil method untuk menghapus barang
    if ($barang->deleteBarang($idBarangToDelete)) {
        // Redirect atau tampilkan pesan berhasil
        header("Location: ../../index.php?page=dataBarang");
        exit();
    } else {
        // Tampilkan pesan gagal
        echo "Gagal menghapus barang";
    }
}
?>
