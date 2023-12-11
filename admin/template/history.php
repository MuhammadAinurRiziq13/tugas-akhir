<?php
    require_once 'config/config.php'; // Pastikan file Database.php sudah di-include
    require_once 'classes/History.php'; // Pastikan file Item.php sudah di-include

    // Membuat instance dari class Database
    $database = new Database();
    $conn = $database->conn;

    // Membuat instance dari class Item
    $history = new History($conn);
?>
    
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
              <form action="" method="post">
              <select id="bulan" name="bulan" class="px-3 py-1 rounded-3 pilih-bulan me-2" style="width: 10rem">
                <option value="13">ALL</option>
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
                <option value="1">ALL</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <button type="submit" name="search" class="btn btn-primary">Filter</button>
              </form>
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
            <?php
              if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                $month = $_POST['bulan'];
                $years = $_POST['tahun'];
            
                if ($month != 13 && $years != 1) {
                    $historyArray = $history->searchHistoryByMonthYear($month, $years);
                } elseif ($month < 13 && $years == 1) {
                    $historyArray = $history->searchHistoryByMonth($month);
                } elseif ($month == 13 && $years != 1) {
                    $historyArray = $history->searchHistoryByYear($years);
                } else {
                    $historyArray = $history->getHistory();  
                }
              } else {
                $historyArray = $history->getHistory();
              }            

              $no = 1;
              foreach ($historyArray as $item) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>". $item['tanggal_transaksi'] ."</td>";
                echo "<td>" . $item['nama_barang'] . "</td>";
                echo "<td>Rp. " . number_format($item['total_transaksi']) . "</td>";
                echo "<td>" . $item['total_qty'] . "</td>";
                echo "<td><a href='admin/fungsi/detailHistory.php?action=detail&id=" . $item['id_transaksi'] . "' class='edit'>Detail</a></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>