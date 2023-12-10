<?php
session_start();

require_once '../../config/config.php';
require_once '../../classes/Transaksi.php';
require_once '../../classes/Barang.php';

$database = new Database();
$conn = $database->conn;

// Create instances of Transaksi and Barang classes
$transaksi = new Transaksi($conn);
$barang = new Barang($conn);

// Handle the payment process
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bayar'])) {
    // Get the money paid by the user
    $uangBayar = isset($_POST['uangBayar']) ? $_POST['uangBayar'] : 0;

    // Calculate total price using the function
    $totalPrice = $transaksi->calculateTotalPrice($_SESSION["cart"], $barang);

    // Check if the payment is sufficient
    if ($uangBayar >= $totalPrice) {
        if ($totalPrice > 0) {
            // Perform the transaction and insert data into the database

            // Step 1: Insert into 'transaksi' table
            $idUser = 2; // Replace with the actual user ID
            $totalTransaksi = $totalPrice;

            $idTransaksi = $transaksi->addTransaksi($idUser, $totalTransaksi);

            // Step 2: Insert into 'detail_transaksi' table for each item in the cart
            foreach ($_SESSION["cart"] as $cartItem) {
                $idBarang = $cartItem["id_barang"];
                $quantity = $cartItem["quantity_" . $idBarang];

                // Update the stock in 'barang' table
                $barang->updateStock($idBarang, $quantity);

                // Insert into 'detail_transaksi' table
                $transaksi->addDetailTransaksi($idBarang, $idTransaksi, $quantity);
            }

            // Store values in session
            $_SESSION['last_transaction_id'] = $idTransaksi;
            $_SESSION['totalTunai'] = $uangBayar;

            // Clear the shopping cart
            $_SESSION["cart"] = array();

            header("Location: strukCart.php");
            exit();
        } else {
            echo '<script>alert("Uang Anda Kurang."); window.location.href = "../../index.php?page=transaksi";</script>';
            exit();
        }
    } else {
        // Display an error message if the payment is insufficient
        echo '<script>alert("Anda belum menambahkan barang."); window.location.href = "../../index.php?page=transaksi";</script>';
    }
}
?>
