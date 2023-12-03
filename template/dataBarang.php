<?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/Barang.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);
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
                <li class="list-item"><a href="#" ><i class="fa-solid fa-border-all me-1"></i> All Items</a></li>
                <li class="list-item"><a href="#" ><i class="fa-solid fa-utensils me-1"></i> Food</a></li>
                <li class="list-item"><a href="#" ><i class="fa-solid fa-burger me-1"></i> Snack</a></li>
                <li class="list-item"><a href="#" ><i class="fa-solid fa-wine-glass me-1"></i> Drink</a></li>
              </ul>
              <div class="grup pe-0 d-flex">
                <button type="button" class="me-3 rounded-3 px-3 py-1 add-barang" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button>
                <form action="" method="post">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-3 py-1 rounded-3 search" style="width: 13rem" />
                    <!-- <input type="submit" value="Cari" class="me-3 rounded-3 px-3 py-1 cari-barang"> -->
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
                <th>image</th>
                <th style="width: 41.5%">Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Memeriksa apakah ada data pencarian
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                  // Jika ada data pencarian, panggil fungsi untuk mendapatkan data barang berdasarkan pencarian
                  $searchTerm = $_POST['search'];
                  $dataBarang = $barang->searchDataBarang($searchTerm);
                } else {
                  // Jika tidak ada data pencarian, panggil fungsi untuk mendapatkan semua data barang
                  $dataBarang = $barang->getDataBarang();
                }

                $no = 1;
                foreach ($dataBarang as $item) {
                  echo "<tr>";
                  echo "<td>" . $no++ . "</td>";
                  echo "<td><img src='uploads/" . $item['gambar'] . "' alt='' style='width: 4rem' class='rounded-3' /></td>";
                  echo "<td>" . $item['nama_barang'] . "</td>";
                  echo "<td>Rp. " . number_format($item['harga_barang']) . "</td>";
                  echo "<td>" . $item['stok_barang'] . "</td>";
                  echo "<td>
                          <a href='classes/edit.php?action=edit&id=" . $item['id_barang'] . "' class='edit'>Edit</a>
                          <a href='classes/delete.php?action=delete&id=" . $item['id_barang'] . "' class='hapus' onclick='return confirm(\"Hapus Data Jabatan ?\");'>Delete</a>
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
              <form action="classes/tambah.php" method="post" enctype="multipart/form-data" >
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
                  <label for="harga-jual" class="col-form-label">Harga Jual</label>
                  <input type="text" class="form-control" id="harga-jual" name="harga-jual" />
                </div>
                <div class="mb-1">
                  <label for="stock" class="col-form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" />
                </div>
                <div class="mb-1">
                  <label for="foto-barang" class="col-form-label">Foto</label>
                  <input type="file" class="form-control" id="foto-barang" name="foto-barang" accept="image/*" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
