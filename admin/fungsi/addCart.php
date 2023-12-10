<?php
session_start();

require_once '../../config/config.php';
require_once '../../classes/Transaksi.php';

$database = new Database();
$conn = $database->conn;

// Membuat instance dari class Item
$transaksi = new Transaksi($conn);

// Handle adding items to the session cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id_barang_to_add = $_POST['id_barang'];

    // Ensure $_SESSION["cart"] is initialized as an array
    if (!isset($_SESSION["cart"]) || !is_array($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Check if the item is already in the cart
    $item_exists_in_cart = false;
    foreach ($_SESSION["cart"] as $cartItem) {
        if ($cartItem["id_barang"] == $id_barang_to_add) {
            $item_exists_in_cart = true;
            break;
        }
    }

    // If the item is not in the cart, add it
    if (!$item_exists_in_cart) {
        // Include the product ID in the quantity name
        $quantity_to_add = isset($_POST['quantity_' . $id_barang_to_add]) ? $_POST['quantity_' . $id_barang_to_add] : 1;

        $_SESSION["cart"][] = array("id_barang" => $id_barang_to_add, "quantity_" . $id_barang_to_add => $quantity_to_add);
    }

    header("Location: ../../index.php?page=transaksi");
    exit();
  }
