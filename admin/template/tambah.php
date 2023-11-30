<?php
function antiinjection($koneksi, $data) {
    $filter_sql = mysqli_real_escape_string($koneksi->conn, stripslashes(strip_tags(htmlspecialchars(
        $data, ENT_QUOTES
    ))));
    return $filter_sql;
}
require '../../config.php';
    if (!empty($_POST['submit'])) {
        // $nama = antiinjection($koneksi->conn, $_POST['nama-barang']);
        // $kategori = antiinjection($koneksi->conn, $_POST['kategori']);
        // $harga = antiinjection($koneksi->conn, $_POST['harga-jual']);
        // $stok = antiinjection($koneksi->conn, $_POST['stock']);
        // $gambar = antiinjection($koneksi->conn, $_POST['foto-barang']);
        $nama = $_POST['nama-barang'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga-jual'];
        $stok = $_POST['stock'];
        $gambar = $_POST['foto-barang'];
        echo "1";
        // SQL Insert
        $sql = "INSERT INTO barang (nama_barang, id_kategori, harga_barang, stok_barang, gambar)
                    values ('$nama', '$kategori', '$harga', '$stok', '$gambar');";

        // Execute SQL-nya
        $koneksi->executeQuery($sql);
        echo "2";
        header("Location: ../../index.php?page=dataBarang");
    }
?>
