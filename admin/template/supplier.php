<?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/supplier.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $supplier = new Supplier($conn);
?>

    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
    ?>

    <div class="data-barang overflow-auto" style="width: 100%">
        <div class="nav-utama"></div>
        <div class="wrap-barang bg-gray pt-5">
          <div class="header pt-4 pt-5 border-bot ms-4 me-5">
            <h2 class="fw-bold mb-3">Supplier</h2>
            <div class="wrap-header d-flex justify-content-end align-items-center mb-3">
              <form action="admin/fungsi/tambahSupplier.php" method="post">
                <input type="text" name="add-supplier" id="add-supplier" placeholder="Masukkan nama suplier" class="px-3 py-1 rounded-3 search" style="width: 20rem" />
                <button type="submit" class="me-3 rounded-3 px-3 py-1 cari-barang">
                  <i class="fa-solid fa-user-plus"></i>
                </button>
              </form>
              <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Search..." class="px-3 py-1 rounded-3 search" style="width: 13rem" />
                <button type="submit" class="me-3 rounded-3 px-3 py-1 cari-barang">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div>
          </div>
          <table class="ms-4 mt-2">
            <thead>
              <tr>
                <th>No</th>
                <th style="width: 40%">Nama Supplier</th>
                <th style="width: 30.5%">Date</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Memeriksa apakah ada data pencarian
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                  // Jika ada data pencarian, panggil fungsi untuk mendapatkan data barang berdasarkan pencarian
                  $searchTerm = $_POST['search'];
                  $supplierList = $supplier->searchDataSupplier($searchTerm);
                } else {
                  // Jika tidak ada data pencarian, panggil fungsi untuk mendapatkan semua data supplier
                  $supplierList = $supplier->getSuppliers();
                }

                $no = 1;
                foreach ($supplierList as $supplierData) {
                    echo "<tr class='py-3' style='height: 3rem'>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $supplierData['nama_supplier'] . "</td>";
                    echo "<td>" . $supplierData['tanggal_input'] . "</td>";
                    echo "<td>
                            <a href='admin/fungsi/editSupplier.php?action=edit&id=" . $supplierData['id_supplier'] . "' class='edit'>Edit</a>
                            <a href='admin/fungsi/deleteSupplier.php?action=delete&id=" . $supplierData['id_supplier'] . "' class='hapus' onclick='return confirm(\"Hapus Data Supplier ?\");'>Delete</a>
                        </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
          </table>
        </div>
    </div>
    </main>
