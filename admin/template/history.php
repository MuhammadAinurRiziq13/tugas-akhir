    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
    ?>
    
    <div class="data-barang overflow-auto" style="width: 100%">
        <div class="nav-utama"></div>
        <div class="wrap-barang bg-gray pt-5">
          <div class="header pb-2 pt-4 ms-4 me-5 mt-3 d-flex justify-content-between align-items-center border-bot">
            <h2 class="fw-bold">History Penjualan</h2>
            <div class="grup pe-0 mt-3">
              <select id="bulan" name="bulan" class="px-3 py-1 rounded-3 pilih-bulan me-2" style="width: 10rem">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select id="tahun" name="tahun" class="px-3 py-1 rounded-3 pilih-tahun" style="width: 10rem">
                <option value="1">2021</option>
                <option value="2">2022</option>
                <option value="3">2023</option>
              </select>
            </div>
          </div>
          <table class="ms-4 mt-2">
            <thead>
              <tr>
                <th>No</th>
                <th>Date</th>
                <th style="width: 39.5%">Nama Barang</th>
                <th>Total Harga</th>
                <th>Jumlah</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
              <tr>
                <td>01</td>
                <td>2023-11-25 12:34:56</td>
                <td>Nasi Goreng,Nasi Goreng,Nasi Goreng,&nbsp;...</td>
                <td>Rp. 40.000</td>
                <td>4</td>
                <td><button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal fade" id="detailModal" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
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
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </main>