  <?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/Barang.php'; // Pastikan file Item.php sudah di-include
    require_once 'classes/Transaksi.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);
    $transaksi = new Transaksi($conn);
?>
    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
    ?>
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
                  echo '<img src="uploads/' . $item['gambar'] . '" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />';
                  echo '<div class="kartu-body pt-3 d-flex align-items-center flex-column">';
                  echo '<h5 class="kartu-title h6 fw-bold">' . $item['nama_barang'] . '</h5>';
                  echo '<p class="kartu-text mb-2 fs-6">' . number_format($item['harga_jual']) . '</p>';
                  echo '<form method="POST" action="admin/fungsi/addCart.php" class="add-to-cart-form">';
                  echo '<input type="hidden" name="id_barang" value="' . $item['id_barang'] . '">';
                  echo '<div class="items-kuantiti d-flex align-items-end gap-1 justify-content-center">';
              
                  // Check if the stock is zero, and disable the input accordingly
                  $disabled = $item['stok_barang'] == 0 ? 'disabled' : '';
              
                  echo '<button type="button" class="min-items">-</button>';
                  if ($item['stok_barang'] > 0) {
                    echo '<input type="text" min="1" max="' . $item['stok_barang'] . '" value="1" name="quantity_' . $item['id_barang'] . '" class="quantity-input px-2" style="width: 2rem; font-size: 0.8rem" />';
                  }else{
                    echo '<input type="text" value="0" class="quantity-input px-2" style="width: 2rem; font-size: 0.8rem" />';
                  }
                  echo '<button type="button" class="plus-items">+</button>';
                  echo '</div>';
                  if ($item['stok_barang'] > 0) {
                    echo '<button type="submit" name="add_to_cart" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi mt-2" style="width:8rem">Add</button>';
                  }else {
                    echo '<p class="p-0 pt-2 text-danger text-center">Stok Habis</p>';
                  }
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
              <div class="title d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-1">Items</h5>
                <!-- <button type="submit" name="delete-cart" class="remove-items btn bg-dongker p-0 text-white" style="height: 1.5rem; width: 4rem; font-size: .7rem">Reset</button> -->
                <form method="POST" action="admin/fungsi/deleteCart.php">
                  <button type="submit" name="clear_cart" class="p-0 btn bg-dongker text-white" style="height: 1.5rem; width: 4rem; font-size: .8rem">Reset</button>
                </form>
              </div>
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
                          <img src="uploads/<?php echo $item['gambar']; ?>" alt="order items" style="height: 50px;width:70px;" />
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



      <!-- <div class="modal fade" id="bayarModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Proses Transaksi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
              <p class="mb-2">Harga Total</p>
              <h4 class="fw-bold"><?php echo "Rp. " . number_format($totalPrice); ?></h4>
            </div>
            <div class="modal-body">
              <p class="mb-1">Uang yang dibayar</p>
              <input type="text" class="form-control" id="uangBayar" />
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-bs-target="#strukModal" data-bs-toggle="modal">Bayar</button>
            </div>
          </div>
        </div>
      </div> -->

      <div class="modal fade" id="strukModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Struk Transaksi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                  <tr>
                    <td>Nasgor Biasa</td>
                    <td>Rp. 10.000</td>
                    <td>2</td>
                    <td>Rp. 200.000</td>
                  </tr>
                    <td>Nasgor Biasa</td>
                    <td>Rp. 10.000</td>
                    <td>2</td>
                    <td>Rp. 200.000</td>
                  </tr>
                    <td>Nasgor Biasa</td>
                    <td>Rp. 10.000</td>
                    <td>2</td>
                    <td>Rp. 200.000</td>
                  </tr>
                    <td>Nasgor Biasa</td>
                    <td>Rp. 10.000</td>
                    <td>2</td>
                    <td>Rp. 200.000</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="modal-body d-flex justify-content-end">
              <table>
                  <tr>
                    <td>Total Harga:</td>
                    <td>Rp. 40.000</td>
                  </tr>
                  <tr>
                    <td>Total Tunai:</td>
                    <td>Rp. 50.000</td>
                  </tr>
                  <tr>
                    <td>Kembalian:</td>
                    <td>Rp. 10.000</td>
                  </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> -->
    </main>


