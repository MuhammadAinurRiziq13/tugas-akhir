    <?php
      // require_once 'config.php';
      // $database1 = new Database();
      // if ($_SESSION['level'] == 1) {
      //   echo "<script>alert('ini bukan hak anda');window.location.href = 'index.php';</script>";
      // }
    ?>
    <?php
        include "header.php";
    ?>
    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
    ?>
    <div class="data-barang overflow-auto" style="width: 100%">
        <div class="nav-utama"></div>
        <div class="wrap-barang bg-gray d-flex pt-5 pe-5" style="width: 100%">
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
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
              <div class="kartu rounded-4 pt-2 bg-white d-flex align-items-center flex-column" style="width:18%">
                <img src="assets/image/nasgor.png" class="rounded-4 kartu-image" style="width: 7rem; height: 4rem" />
                <div class="kartu-body pt-3 d-flex align-items-center flex-column">
                  <h5 class="kartu-title h6 fw-bold">Nasi Goreng</h5>
                  <p class="kartu-text mb-2 fs-6">Rp. 10.000</p>
                  <a href="#" class="btn bg-dongker py-0 rounded-3 mb-2 text-white add-transaksi">Add</a>
                </div>
              </div>
            </div>
          </div>

          <div class="order-menu bg-white p-3 ms-0" style="width: 22%; height: 89%">
            <div class="header-order-menu border-bot">
              <h5 class="fw-bold">Order Menu</h5>
              <p class="date-menu">01/Sep/2023</p>
            </div>
            <div class="items pt-3" style="height: 24rem">
              <h5 class="fw-bold mb-1">Items</h5>
              <div class="items-wrap" style="height: 21.5rem">
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
                <div class="list-items-order d-flex border-bot py-2">
                  <img src="assets/image/nasgor2.png" alt="order items" style="height: 3rem" />
                  <div class="inner-items-order ms-1 d-flex flex-column justify-content-center">
                    <p class="items-order-title fw-bold mb-1">Nasgor Biasa</p>
                    <p class="items-order-harga mb-1">Rp. 10.000</p>
                  </div>
                  <div class="items-kuantiti d-flex align-items-end gap-1 ms-4 pe-2">
                    <button type="button" class="min-items">-</button>
                    <input type="text" min="1" max="5" value="1" name="quantity" id="quantity" style="width: 2rem; font-size: 0.8rem" class="px-2" value="1"/>
                    <button type="button" class="plus-items">+</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="bayar-container border-top py-3 px-1 mt-2">
              <div class="bayar-items d-flex justify-content-between bg-dongker py-2 px-2 rounded-4 align-items-center">
                <div class="bayar-teks ms-2">
                  <p class="mb-1 jml-item">4 items</p>
                  <p class="text-white mb-0 jml-harga">Rp. 40.000</p>
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
              <h4 class="fw-bold">Rp. 40.000</h4>
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
      </div>
    </main>

    <?php
        include "footer.php";
    ?>
