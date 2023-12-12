<?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/Barang.php'; // Pastikan file Item.php sudah di-include
    require_once 'classes/Supplier.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);
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
            <h2 class="fw-bold mb-3">Product</h2>
            <div class="wrap-header d-flex justify-content-between align-items-center">
              <ul class="list-grup gap-3 ps-0">
                <li class="list-item"><a href="index.php?page=dataBarang" ><i class="fa-solid fa-border-all me-1"></i> All Items</a></li>
                <li class="list-item"><a href="index.php?page=dataBarang&kategori=1" ><i class="fa-solid fa-utensils me-1"></i> Food</a></li>
                <li class="list-item"><a href="index.php?page=dataBarang&kategori=2" ><i class="fa-solid fa-wine-glass me-1"></i> Drink</a></li>
                <li class="list-item"><a href="index.php?page=dataBarang&kategori=3" ><i class="fa-solid fa-burger me-1"></i> Snack</a></li>
              </ul>
              <div class="grup pe-0 d-flex">
                <button type="button" class="me-3 rounded-3 px-3 py-1 add-barang" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-plus"></i> Add Product</button>
                <form action="" method="post">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-3 py-1 rounded-3 search" style="width: 13rem" />
                    <button type="submit" class="me-3 rounded-3 px-3 py-1 cari-barang">
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
              </div>
            </div>
          </div>
          <table class="ms-4 mt-2">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Supplier</th>
                <th>Stock</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $dataSupplier = $supplier->getSupplier();
                // Memeriksa apakah ada data pencarian

                // Inisialisasi variabel
                $searchTerm = '';

                // Memeriksa apakah ada data pencarian
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                    // Jika ada data pencarian, panggil fungsi untuk mendapatkan data barang berdasarkan pencarian
                    $searchTerm = $_POST['search'];
                    $dataBarang = $barang->searchDataBarang($searchTerm);
                } else if (isset($_GET['kategori'])) {
                    // Jika ada parameter kategori
                    $kategori = $_GET['kategori'];
                    $dataBarang = $barang->getDataBarangByCategory($kategori);
                } else {
                    // Jika tidak ada data pencarian atau parameter kategori, tampilkan semua data barang
                    $dataBarang = $barang->getDataBarang();
                }

                $no = 1;
                foreach ($dataBarang as $item) {
                  echo "<tr>";
                  echo "<td>" . $no++ . "</td>";
                  echo "<td><img src='uploads/" . $item['gambar'] . "' alt='' style='width: 4rem' class='rounded-3' /></td>";
                  echo "<td>" . $item['nama_barang'] . "</td>";
                  echo "<td>Rp. " . number_format($item['harga_beli']) . "</td>";
                  echo "<td>Rp. " . number_format($item['harga_jual']) . "</td>";
                  $supplierName = "";
                  foreach ($dataSupplier as $supplier) {
                      if ($supplier['id_supplier'] == $item['id_supplier']) {
                          $supplierName = $supplier['nama_supplier'];
                          break; 
                      }
                  }
                  echo "<td>" . $supplierName . "</td>";
                  echo "<td>" . $item['stok_barang'] . "</td>";
                  echo "<td>
                          <a href='admin/fungsi/editBarang.php?action=edit&id=" . $item['id_barang'] . "' class='edit'>Edit</a>
                          <a href='admin/fungsi/deleteBarang.php?action=delete&id=" . $item['id_barang'] . "' class='hapus' onclick='return confirm(\"Hapus Data Barang ?\");'>Delete</a>
                      </td>";
                  echo "</tr>";                  
                }             
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Baru</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="admin/fungsi/tambahBarang.php" method="post" enctype="multipart/form-data" >
                <div class="mb-1">
                  <label for="nama-barang" class="col-form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama-barang" name="nama-barang" />
                </div>
                <div class="mb-1">
                  <label for="kategori" class="col-form-label">Kategori</label><br />
                  <select id="kategori" name="kategori" class="px-2 py-1 rounded-2" style="width: 29rem">
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                    <option value="3">Snack</option>
                  </select>
                </div>
                <div class="mb-1">
                  <label for="harga-beli" class="col-form-label">Harga Beli</label>
                  <input type="text" class="form-control" id="harga-beli" name="harga-beli" />
                </div>
                <div class="mb-1">
                  <label for="harga-jual" class="col-form-label">Harga Jual</label>
                  <input type="text" class="form-control" id="harga-jual" name="harga-jual" />
                </div>
                <div class="mb-1">
                  <label for="supplier" class="col-form-label">Supplier</label><br />
                  <select id="supplier" name="supplier" class="px-2 py-1 rounded-2" style="width: 29rem">
                      <?php foreach ($dataSupplier as $option): ?>
                          <option value="<?= $option['id_supplier'] ?>"><?= $option['nama_supplier'] ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-1">
                  <label for="stock" class="col-form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" />
                </div>
                <div class="mb-1">
                  <label for="foto-barang" class="col-form-label">Foto</label>
                  <input type="file" class="form-control" id="foto-barang" name="foto-barang" accept="image/*" />
                </div>
                <div class="mb-1 d-flex justify-content-end mt-3 gap-2">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
