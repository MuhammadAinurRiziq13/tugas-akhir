    <?php
        include "header.php";
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
                <th style="width: 43.5%">Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td><img src="assets/image/nasi_goreng.jpeg" alt="" style="width: 4rem" class="rounded-3" /></td>
                <td>Nasi Goreng</td>
                <td>Rp. 10.000</td>
                <td>30</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> <button type="button" class="hapus" data-bs-toggle="modal">Delete</button></td>
              </tr>
              <!-- 
              <?php
                $itemKe = 1;
                $query = "SELECT nama_barang, harga_barang, stok_barang, gambar_barang  FROM barang order by nama_barang";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?= $itemKe ?></td>
                  <td><img src="<?php $row['gambar_barang'] ?>" alt="" style="width: 4rem" class="rounded-3" /></td>
                  <td><?= $row['nama_barang'] ?></td>
                  <td><?= $row['harga_barang'] ?></td>
                  <td><?= $row['stok_barang'] ?></td>
                  <td>
                    <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> 
                    <button type="button" class="hapus" data-bs-toggle="modal">Delete</button>
                  </td>
                </tr>
              <?php 
              } 
              ?> 
              -->
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
              <form>
                <div class="mb-1">
                  <label for="nama-barang" class="col-form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama-barang" />
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
                  <input type="text" class="form-control" id="harga-jual" />
                </div>
                <div class="mb-1">
                  <label for="stock" class="col-form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" />
                </div>
                <div class="mb-1">
                  <label for="foto-barang" class="col-form-label">Foto</label>
                  <input type="file" class="form-control" id="foto-barang" accept="image/*" />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-1">
                  <label for="nama-barang" class="col-form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama-barang" />
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
                  <input type="text" class="form-control" id="harga-jual" />
                </div>
                <div class="mb-1">
                  <label for="stock" class="col-form-label">Stock</label>
                  <input type="text" class="form-control" id="stock" />
                </div>
                <div class="mb-1">
                  <label for="foto-barang" class="col-form-label">Foto</label>
                  <input type="file" class="form-control" id="foto-barang" accept="image/*" />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
        include "footer.php";
    ?>