<?php
    session_start();
    require_once '../config/config.php'; 
    require_once 'Barang.php'; 

    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class barang
    $barang = new Barang($conn);

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    
    // Ambil data barang berdasarkan ID
    $data_barang = $barang->getBarangById($id_barang);

    if (!$data_barang) {
        echo "Barang tidak ditemukan.";
        exit();
    }
}    
?>

<!-- <form action='update.php' method='post'>
    <input type='hidden' name='id_barang' value="<?= $data_barang['id_barang'] ?>">
    <div class="mb-1">
        <label for="nama_barang" class="col-form-label">Nama Barang</label>
        <input type='text' class="form-control" id="nama_barang" name='nama_barang' value='<?= $data_barang['nama_barang'] ?>'>
    </div>
    <div class="mb-1">
        <label for="editKategori" class="col-form-label">Kategori</label>
        <select id="editKategori" name="id_kategori" class="px-2 py-1 rounded-2" style="width: 29rem">
            <option value="1" <?= $data_barang['id_kategori'] == 1 ? 'selected' : '' ?>>Makanan</option>
            <option value="2" <?= $data_barang['id_kategori'] == 2 ? 'selected' : '' ?>>Minuman</option>
            <option value="3" <?= $data_barang['id_kategori'] == 3 ? 'selected' : '' ?>>Snack</option>
        </select>
    </div>
    <div class="mb-1">
        <label for="harga_barang" class="col-form-label">Harga Barang</label>
        <input type='text' class="form-control" id="harga_barang" name='harga_barang' value='<?= $data_barang['harga_barang'] ?>'>
    </div>
    <div class="mb-1">
        <label for="stok_barang" class="col-form-label">Stok Barang</label>
        <input type='text' class="form-control" id="stok_barang" name='stok_barang' value='<?= $data_barang['stok_barang'] ?>'>
    </div>
    <div class="mb-1">
        <label for="gambar" class="col-form-label">Gambar</label>
        <input type='text' class="form-control" id="gambar" name='gambar' value='<?= $data_barang['gambar'] ?>'>
    </div>
    <input type='submit' name='update' value='Update'>
</form> -->

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.118.2" />
    <title>Sidebars · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/style/sidebars.css" rel="stylesheet" />
  </head>   
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="home" viewBox="0 0 16 16">
        <path
          d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"
        />
      </symbol>
    </svg>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-dongker menu" style="width: 240px; height: 100vh">
            <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none ms-4">
            <img src="../assets/image/logo-dua.png" alt="logo" class="img-fluid ms-2" style="height: 40px" />
            <!-- <span class="fs-5">KANTIN</span> -->
            </a>
            <hr class="text-white" />
            <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="index.php" class="nav-link text-white" aria-current="page">
                <svg class="bi pe-none me-2" width="18" height="18" style="stroke-width: 1px;"><use xlink:href="#home" /></svg>
                Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="index.php?page=dataBarang" class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  fill="currentColor" class="bi bi-table me-2" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                </svg>
                Data Barang
                </a>
            </li>
            <?php
                $database = new Database();
                if ($_SESSION['level'] == 2) {
                echo '
                    <li class="mb-2">
                        <a href="index.php?page=transaksi" class="nav-link text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart3 me-2" viewBox="0 0 16 16" style="stroke-width: 1px;">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        Transaksi
                        </a>
                    </li>';
                }?>
            <li class="mb-2">
                <a href="index.php?page=history" class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock-history me-2" viewBox="0 0 16 16" style="stroke-width: .5px;">
                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" style="stroke: currentColor;"/>
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0" style="stroke: currentColor;"/>
                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" style="stroke: currentColor;"/>
                </svg>
                History Penjualan
                </a>
            </li>
            </ul>
            <hr class="text-white" />
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2" />
                <?php
                if ($_SESSION['level'] == 1) {
                echo '<strong>Pemilik</strong>';
                }else{
                echo '<strong>Admin</strong>';
                }?>

            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul>
            </div>
        </div>

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
              <div class="grup pe-0">
                <button type="button" class="me-3 rounded-3 px-3 py-1 add-barang" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button>
                <input type="text" name="search" id="search" placeholder="search..." class="px-3 py-1 rounded-3 search" style="width: 13rem" />
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
                // Memanggil fungsi untuk mendapatkan data barang
                $dataBarang = $barang->getDataBarang(); 
                $no = 1;
                foreach ($dataBarang as $item) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td><img src='../uploads/" . $item['gambar'] . "' alt='' style='width: 4rem' class='rounded-3' /></td>";
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

      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
            </div>
            <div class="modal-body">
                <form action='update.php' method='post' enctype="multipart/form-data">
                    <input type='hidden' name='id_barang' value="<?= $data_barang['id_barang'] ?>">
                    <div class="mb-1">
                        <label for="nama_barang" class="col-form-label">Nama Barang</label>
                        <input type='text' class="form-control" id="nama_barang" name='nama_barang' value='<?= $data_barang['nama_barang'] ?>'>
                    </div>
                    <div class="mb-1">
                        <label for="editKategori" class="col-form-label">Kategori</label>
                        <select id="editKategori" name="id_kategori" class="px-2 py-1 rounded-2" style="width: 29rem">
                            <option value="1" <?= $data_barang['id_kategori'] == 1 ? 'selected' : '' ?>>Makanan</option>
                            <option value="2" <?= $data_barang['id_kategori'] == 2 ? 'selected' : '' ?>>Minuman</option>
                            <option value="3" <?= $data_barang['id_kategori'] == 3 ? 'selected' : '' ?>>Snack</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="harga_barang" class="col-form-label">Harga Barang</label>
                        <input type='text' class="form-control" id="harga_barang" name='harga_barang' value='<?= $data_barang['harga_barang'] ?>'>
                    </div>
                    <div class="mb-1">
                        <label for="stok_barang" class="col-form-label">Stok Barang</label>
                        <input type='text' class="form-control" id="stok_barang" name='stok_barang' value='<?= $data_barang['stok_barang'] ?>'>
                    </div>
                    <div class="mb-1">
                        <label for="gambar" class="col-form-label">Gambar</label>
                        <input type="file" class="form-control" id="foto-barang" name="foto_barang" accept="image/*" />
                        <!-- <input type='text' class="form-control" id="gambar" name='gambar' value='<?= $data_barang['gambar'] ?>'> -->
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php?page=dataBarang" class="btn btn-danger">Batal</a>
                        <input type='submit' name='update' class="btn btn-primary" value='Update'>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function(){
        // Show the modal on page load
        $('#editModal').modal('show');
    });
    </script>
</body>
</html>


