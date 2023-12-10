<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bayar'])) {
    // Get the money paid by the user
    $uangBayar = isset($_POST['uangBayar']) ? $_POST['uangBayar'] : 0;

    // Check if the payment is sufficient
    if ($uangBayar >= $totalPrice) {
        // Perform the transaction and insert data into the database

        // Step 1: Insert into 'transaksi' table
        $idUser = 2; // Replace with the actual user ID
        $totalTransaksi = $totalPrice;
        $tanggalTransaksi = date("Y-m-d H:i:s"); // Current date and time

        $insertTransaksiQuery = "INSERT INTO transaksi (id_user, total_transaksi, tanggal_transaksi) VALUES ($idUser, $totalTransaksi, '$tanggalTransaksi')";
        $conn->query($insertTransaksiQuery);

        // Get the last inserted ID (id_transaksi)
        $idTransaksi = $conn->insert_id;

        // Step 2: Insert into 'detail_transaksi' table for each item in the cart
        foreach ($_SESSION["cart"] as $cartItem) {
            $idBarang = $cartItem["id_barang"];
            $quantity = 1; // Replace this with the actual quantity from the cart

            $insertDetailQuery = "INSERT INTO detail_transaksi (id_barang, id_transaksi, qty) VALUES ($idBarang, $idTransaksi, $quantity)";
            $conn->query($insertDetailQuery);
        }

        // Now you can display a success message or redirect to another page
        echo "Transaction successful!";
    } else {
        // Display an error message if the payment is insufficient
        echo "Insufficient payment!";
    }
}
?>
