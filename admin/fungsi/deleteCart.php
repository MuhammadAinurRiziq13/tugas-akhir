<?php
session_start();

require_once '../../config/config.php';
require_once '../../classes/Transaksi.php';

$database = new Database();
$conn = $database->conn;

// Membuat instance dari class Item
$transaksi = new ($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $id_barang_to_remove = $_POST['id_barang'];

    // Ensure $_SESSION["cart"] is initialized as an array
    if (!isset($_SESSION["cart"]) || !is_array($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Loop through the cart items and remove the matching item
    foreach ($_SESSION["cart"] as $key => $cartItem) {
        if ($cartItem["id_barang"] == $id_barang_to_remove) {
            unset($_SESSION["cart"][$key]);
            break;
        }
    }

    header("Location: ../../index.php?page=transaksi");
    exit();

} 
// else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
//     // Clear the entire shopping cart
//     $_SESSION["cart"] = array();
    
//     header("Location: ../../index.php?page=transaksi");
//     exit();
// }
