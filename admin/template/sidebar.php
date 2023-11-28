<div class="d-flex flex-column flex-shrink-0 p-3 bg-dongker menu" style="width: 240px; height: 100vh">
        <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none ms-4">
          <img src="assets/image/logo-dua.png" alt="logo" class="img-fluid ms-2" style="height: 40px" />
          <!-- <span class="fs-5">KANTIN</span> -->
        </a>
        <hr class="text-white" />
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item mb-2">
            <a href="index.php" class="nav-link text-white" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home" /></svg>
              Dashboard
            </a>
          </li>
          <li class="mb-2">
            <a href="index.php?page=dataBarang" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table" /></svg>
              Data Barang
            </a>
          </li>
          <?php
            require_once 'config.php';
            $database = new Database();
            if ($_SESSION['level'] == 2) {
              echo '
                  <li class="mb-2">
                    <a href="index.php?page=transaksi" class="nav-link text-white">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid" /></svg>
                      Transaksi
                    </a>
                  </li>';
            }?>
          <li class="mb-2">
            <a href="index.php?page=history" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle" /></svg>
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