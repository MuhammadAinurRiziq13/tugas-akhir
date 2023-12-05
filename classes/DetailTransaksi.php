<?php

class DetailTransaksi {
  private $conn;
  private $list; // Associative array untuk menyimpan daftar barang yang ada di dalam keranjang

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function updateList($id, $qty, $harga){
    $sql = "SELECT id_barang, harga_barang FROM barang";
    $result = $this->conn->query($sql);

    // Cek jika barang sudah ada di dalam daftar keranjang
    if (in_array($id, $this->list)) {
      // Jika ada, maka qty akan ditambahkan ke jumlah pesanan per item yang sudah ada
            
      $this->list[$id][0] += $qty;
      $this->list[$id][1] = $this->list[$id][0] * $harga;
    } else {
      // Jika belum ada, maka tinggal memasukkan ke dalam keranjang
      array_push($this->list, $id);
      foreach ($this->list as $daftar){
      if ($this->list === $id){
        array_push($this->list, $id);
        array_push($this->list[$id], $qty, $qty*$harga);
        break;
      }   }
    }
    // Refresh tampilan keranjang
    $this->refreshList();
  }
    
  private function refreshList(){
    echo'
    <div class="items-wrap mb-0" style="height: 20rem">
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
    </div>';
  }
}

?>
