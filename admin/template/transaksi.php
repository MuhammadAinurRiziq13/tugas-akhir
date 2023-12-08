<?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/Barang.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database-> conn;

    // Membuat instance dari class Item
    $barang = new Barang($conn);
    

?>

    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
        // include "orderMenu.php";
    ?>
    <div class="data-barang overflow-auto" style="width: 100%">
        <div class="nav-utama"></div>
        <div id="transaksi" class="wrap-barang bg-gray d-flex pt-5 pe-5" style="width: 100%">
          <div class="wrap-transaksi pt-4" style="width: 78%">
            <div class="header py-4">
              <h2 class="fw-bold ps-4 mb-3">Transaksi</h2>
              <div class="wrap-header d-flex justify-content-between align-items-center border-bot mx-4">
                <ul class="list-grup gap-3 ps-0">
                  <li class="list-item"><a href="#"><i class="fa-solid fa-border-all me-1"></i> All Items</a></li>
                  <li class="list-item"><a href="#"><i class="fa-solid fa-utensils me-1"></i> Food</a></li>
                  <li class="list-item"><a href="#"><i class="fa-solid fa-burger me-1"></i> Snack</a></li>
                  <li class="list-item"><a href="#"><i class="fa-solid fa-wine-glass me-1"></i> Drink</a></li>
                </ul>
                <div class="grup pe-0">
                  <input type="text" name="search" id="search" placeholder="search..." class="px-3 py-1 rounded-3 search " style="width: 13rem" />
                </div>
              </div>
            </div>

            <div class="card-container px-4 pt-2 d-flex flex-wrap gap-3 pb-4" >
              <!-- Sebagai sample jika database barang kosong -->
              <!-- <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div> -->
                
              <!-- Kode PHP -->
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
                ?>
                <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">          
                  <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                  <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                    <h5 class="kartu-title h6 fw-bold"><?= $item['nama_barang'] ?></h5>
                    <p class="kartu-text mb-2 fs-6"><?= number_format($item['harga_barang']) ?></p>
                    <form method="POST" action="admin/fungsi/tambahItem.php?jual=jual?id=<?= $item['id_barang'] ?>">
                      <input type="hidden" name="id_barang" value="<?= $item['id_barang'] ?>" class="form-control">
                      <button type="submit" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi"
                        style="display: inline-block !important; width: 100%;">Add</button>
                    </form>
                  </div>
                </div>'; 
                <?php               
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
                  $sql = "SELECT id_transaksi from transaksi where selesai = 't'";
                  $result = $conn -> query($sql);
                  $result = $result -> fetch_assoc();
                  $idTransaksi = $result['id_transaksi'];

                  // $sql = "select * where detail_transaksi = $idTransaksi"; 
                  // $result = $conn -> query($sql);
                  // $num_rows;
                  // if ($result->num_rows == false) $num_rows = 0;
                  // else $num_rows = $result->num_rows;
                  
                  // $result = $result -> fetch_assoc();
                  $totalHarga = 0;
                  $sql = "SELECT detail.id_barang as id, 
                              brg.nama_barang as nama, 
                              brg.harga_barang as harga,
                              detail.qty qty
                          from (select * from detail_transaksi where id_transaksi = $idTransaksi) as detail
                          inner join barang as brg on detail.id_barang = brg.id_barang";
                  $items = $conn -> query($sql);
                  $num_rows = $items -> num_rows;
                  
                  // print_r($items);
                  for ($i=0; $i < $num_rows; $i++) { $data = $items -> fetch_assoc();
                    $totalHarga += $data['harga'] * $data['qty'];
                ?>
                  <div class="list-items-order d-flex border-bot py-2">
                    <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                    <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                      <p class="items-order-title fw-bold mb-1"><?= $data['nama'] ?></p>
                      <p class="items-order-harga mb-1"><?= $data['harga'] ?></p>
                    </div>
                    <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                      <button type="button" class="min-items">-</button>
                      <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                      <button type="button" class="plus-items">+</button>
                    </div>
                  </div>
                <?php
                }
                $sql = "UPDATE transaksi
                            SET total_transaksi = $totalHarga
                        WHERE id_transaksi = $idTransaksi";
                $result = $conn->query($sql);
                ?>
              </div>
            </div>
            <div class="bayar-container border-top py-2 px-1 mt-2">
              <div class="bayar-items d-flex justify-content-between bg-dongker py-2 px-2 rounded-4 align-items-center">
                <div class="bayar-teks ms-2">
                  <p class="mb-1 jml-item"><? $num_rows ?> items</p>
                  <p class="text-white mb-0 jml-harga">Rp. <?= $totalHarga ?></p>
                </div>
                <button type="submit" class="rounded-5 px-3 bg-white" style="height: 2rem" data-bs-toggle="modal" data-bs-target="#bayarModal">Entry</button>
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
            <div class="modal-body d-flex flex-column align-items-center">
              <p class="mb-2">Harga Total</p>
              <h4 class="fw-bold">Rp. <?= $totalHarga ?></h4>
            </div>
            <div class="modal-body">
              <p id="paidmoney" class="mb-1">Uang yang dibayar</p>
              <input type="text" class="form-control" id="uangBayar" />
            </div>
            <div class="modal-footer">
              <button onclick="updateTotalTunai()" class="btn btn-danger" data-bs-target="#strukModal" data-bs-toggle="modal">Bayar</button>
            </div>
          </div>
        </div>
      </div>
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
                  <?php
                  // Reset the internal pointer to the beginning of the result set
                  $items->data_seek(0);
                  for ($i=0; $i < $num_rows; $i++) { $data = $items -> fetch_assoc();
                  ?>
                    <tr>
                    <td><?= $data['nama'] ?></td>
                    <td>Rp. <?= $data['harga'] ?></td>
                    <td><?= $data['qty'] ?></td>
                    <td>Rp. <?= $data['harga'] * $data['qty']?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <!-- <tr>
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
                  </tr> -->
                </tbody>
              </table>
            </div>
            <script>
              function updateTotalTunai() {
                  // Fetch the value entered in the input field
                  var uangBayarInput = document.getElementById('uangBayar');
                  var uangBayarValue = uangBayarInput.value;

                  // Update the content of the "Total Tunai" <td> element
                  var totalTunaiTd = document.getElementById('totalTunai');
                  totalTunaiTd.textContent = 'Rp. ' + uangBayarValue;
                  
                  var kembalian = uangBayarValue - <?= $totalHarga ?>;

                  var kembalianElement = document.getElementById('kembalian');
                  kembalianElement.textContent = 'Rp. ' + kembalian;
              }
            </script>
            <div class="modal-body d-flex justify-content-end">
              <table>
                  <tr>
                    <td>Total Harga:</td>
                    <td>Rp. <?= $totalHarga ?></td>
                  </tr>
                  <tr>
                    <td>Total Tunai:</td>
                    <td id="totalTunai">Rp. 50.000</td>
                  </tr>
                  <tr>
                    <td>Kembalian:</td>
                    <td id="kembalian">Rp. 10.000</td>
                  </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </main>
