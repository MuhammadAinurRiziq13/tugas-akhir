<?php
session_start();

require_once '../../config/config.php';
require_once '../../classes/Transaksi.php';
require_once '../../classes/Barang.php';

$database = new Database();
$conn = $database->conn;

// Membuat instance dari class Transaksi
$transaksi = new Transaksi($conn);
$barang = new Barang($conn);

// Mendapatkan data transaksi terakhir
$idTransaksi = $_SESSION['last_transaction_id'];
$detailTransaksi = $transaksi->getDetailTransaksiById($idTransaksi);

// Menghitung total harga, total tunai, dan kembalian
$totalHarga = $transaksi->getTotalTransaksiById($idTransaksi);
$totalTunai = $_SESSION['totalTunai'];
$kembalian = $totalTunai - $totalHarga;

?>

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
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../../assets/style/sidebars.css" rel="stylesheet" />
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
            <img src="../../assets/image/logo-dua.png" alt="logo" class="img-fluid ms-2" style="height: 40px" />
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
              <a href="index.php?page=supplier" class="nav-link text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
              </svg>
                Supplier
              </a>
            </li>
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
        <div id="transaksi" class="wrap-barang bg-gray d-flex pt-5 pe-5" style="width: 100%">
          <div class="wrap-transaksi pt-4" style="width: 78%">
            <div class="header py-4">
              <h2 class="fw-bold ps-4 mb-3">Transaksi</h2>
              <div class="wrap-header d-flex justify-content-between align-items-center border-bot mx-4">
                <ul class="list-grup gap-3 ps-0">
                <li class="list-item"><a href="index.php?page=transaksi" ><i class="fa-solid fa-border-all me-1"></i> All Items</a></li>
                <li class="list-item"><a href="index.php?page=transaksi&kategori=1" ><i class="fa-solid fa-utensils me-1"></i> Food</a></li>
                <li class="list-item"><a href="index.php?page=transaksi&kategori=2" ><i class="fa-solid fa-wine-glass me-1"></i> Drink</a></li>
                <li class="list-item"><a href="index.php?page=transaksi&kategori=3" ><i class="fa-solid fa-burger me-1"></i> Snack</a></li>
                </ul>
                <div class="grup pe-0">
                  <form action="" method="post">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-3 py-1 rounded-3 search" style="width: 13rem" />
                    <button type="submit" class="me-3 rounded-3 px-3 py-1 cari-barang">
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <div class="card-container px-4 pt-2 d-flex flex-wrap gap-3 pb-4" >
              <?php
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
                  echo '<div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">';
                  echo '<img src="../../uploads/' . $item['gambar'] . '" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />';
                  echo '<div class="kartu-body pt-3 d-flex align-items-center flex-column">';
                  echo '<h5 class="kartu-title h6 fw-bold">'  . $item['nama_barang'] . '</h5>';
                  echo '<p class="kartu-text mb-2 fs-6">' . number_format($item['harga_jual']) . '</p>';
                  echo '<form method="POST" action="admin/fungsi/addCart.php" class="add-to-cart-form">';
                  echo '<input type="hidden" name="id_barang" value="' . $item['id_barang'] . '">';
                  echo '<div class="items-kuantiti d-flex align-items-end gap-1 ms-4">';
                  echo '<button type="button" class="min-items">-</button>';
                  echo '<input type="text" min="1" max="5" value="1" name="quantity_' . $item['id_barang'] . '" class="quantity-input px-2" style="width: 2rem; font-size: 0.8rem" />';
                  echo '<button type="button" class="plus-items">+</button>';
                  echo '</div>';
                  echo '<button type="submit" name="add_to_cart" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi mt-2" style="width:8rem">Add</button>';
                  echo '</form>';
                  echo '</div> </div>';
                }
              
              ?>
            </div>
          </div>
          
          <!-- Baris di bawah adalah tempat di mana orderMenu.php akan diletakkan -->
          <div class="order-menu bg-white p-3 ms-0" style="width: 22%; height: 88%">
            <div class="header-order-menu border-bot">
              <h5 class="fw-bold">Order Menu</h5>
              <p class="date-menu">01/Sep/2023</p>
            </div>
            <div class="items pt-3" style="height: 72%">
              <h5 class="fw-bold mb-1">Items</h5>
              <div class="items-wrap mb-0" style="height: 20rem">
              <?php
                  $totalQuantity = 0;

                  // Calculate total price using the function
                  $totalPrice = $transaksi->calculateTotalPrice($_SESSION["cart"], $barang);

                  // Loop untuk menampilkan item di keranjang
                  if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $cartItem) {
                        $id_barang = $cartItem["id_barang"];
                        $itemQuantity = $cartItem["quantity_" . $id_barang];

                        // Query ke database untuk mendapatkan informasi barang
                        $item = $barang->getBarangById($id_barang);
                        ?>
                        <div class="list-items-order d-flex border-bot py-2">
                          <img src="../../uploads/<?php echo $item['gambar']; ?>" alt="order items" style="height: 50px;width:70px;" />
                          <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                              <p class="items-order-title fw-bold mb-1"><?php echo $item['nama_barang']; ?></p>
                              <p class="items-order-harga mb-1">Rp. <?php echo number_format($item['harga_jual']); ?></p>
                          </div>
                          <div class="items-kuantiti d-flex flex-column justify-content-between align-items-end gap-1 ms-4">
                              <form method="POST" action="admin/fungsi/deleteCart.php">
                                <input type="hidden" name="id_barang" value="<?php echo $item['id_barang']; ?>">
                                <button type="submit" name="remove_from_cart" class="remove-items btn btn-danger p-0" style="height: 1rem; width: 1rem; font-size: .6rem">x</button>
                              </form>
                              <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 me-0">
                                <p class="m-0"><?php echo $itemQuantity . ' item'; ?></p>
                              </div>
                          </div>
                        </div>
              <?php
                        $totalQuantity += $itemQuantity;
                    }
                  }
              ?>
            </div>
            </div>
            <div class="bayar-container border-top py-2 px-1 mt-2">
              <div class="bayar-items d-flex justify-content-between bg-dongker py-2 px-2 rounded-4 align-items-center">
                  <div class="bayar-teks ms-2">
                      <p class="mb-1 jml-item"><?php echo $totalQuantity . " items"; ?></p>
                      <p class="text-white mb-0 jml-harga"><?php echo "Rp. " . number_format($totalPrice); ?></p>
                  </div>
                  <button type="submit" class="rounded-5 px-3  bg-white" style="height: 2rem" data-bs-toggle="modal" data-bs-target="#bayarModal">Entry</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="bayarModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Proses Transaksi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="admin/fungsi/checkout.php">
                  <div class="modal-body d-flex flex-column align-items-center">
                      <p class="mb-2">Harga Total</p>
                      <h4 class="fw-bold"><?php echo "Rp. " . number_format($totalPrice); ?></h4>
                  </div>
                  <div class="modal-body">
                      <p class="mb-1">Uang yang dibayar</p>
                      <input type="text" class="form-control" id="uangBayar" name="uangBayar" />
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" name="bayar">Bayar</button>
                  </div>
                  </form>
              </div>
        </div>
      </div>

      <div class="modal fade" id="strukModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Struk Transaksi</h1>
            </div>
            <div class="modal-body border-bottom ps-5">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 34%" class="th-struk">Nama Barang</th>
                            <th class="th-struk" style="width: 25%">Harga Barang</th>
                            <th style="width: 16%" class="th-struk">Jumlah</th>
                            <th class="th-struk" style="width: 18%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detailTransaksi as $item) : ?>
                            <tr>
                                <td><?php echo $item['nama_barang']; ?></td>
                                <td>Rp. <?php echo number_format($item['harga_jual']); ?></td>
                                <td><?php echo $item['qty']; ?></td>
                                <td>Rp. <?php echo number_format($item['total_harga']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-body d-flex justify-content-end">
                <table>
                    <tr>
                        <td>Total Harga:</td>
                        <td>Rp. <?php echo number_format($totalHarga); ?></td>
                    </tr>
                    <tr>
                        <td>Total Tunai:</td>
                        <td>Rp. <?php echo number_format($totalTunai); ?></td>
                    </tr>
                    <tr>
                        <td>Kembalian:</td>
                        <td>Rp. <?php echo number_format($kembalian); ?></td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
              <a href="../../index.php?page=transaksi" class="btn btn-danger">Close</a>
            </div>
          </div>
        </div>

      </div>
    </main>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function(){
        // Show the modal on page load
        $('#strukModal').modal('show');
    });
    </script>
</body>
</html>


