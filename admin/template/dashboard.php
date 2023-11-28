
    <?php
        include "header.php";
    ?>
    <main class="d-flex flex-nowrap">
    <?php
        include "sidebar.php";
    ?>

    <div class="dashboard overflow-hidden" style="width: 100%">
        <div class="nav-utama"></div>
        <div class="row bg-gray pt-5" style="height: 100%">
          <main class="col-md-9 col-lg-10 px-md-4 mx-4 mt-4" style="width: 100%">
            <div class="d-flex justify-content-between flex-wrap align-items-center pt-4 pb-2 me-5 mb-4 border-bot">
                <?php
                    require_once 'config.php';
                    $database = new Database();
                    if ($_SESSION['level'] == 1) {
                        echo '<h1 class="h1 fw-bold">Welcome Pemilik</h1>';
                    } elseif ($_SESSION['level'] == 2) {
                        echo '<h1 class="h1 fw-bold">Welcome Admin</h1>';
                    }
                ?>
            </div>
            <div class="row">
              <div class="col-sm-6 mb-3" style="width: 330px">
                <div class="card rounded-4">
                  <div class="card-body d-flex justify-content-between">
                    <div>
                      <h5 class="card-title">Jenis Barang</h5>
                      <p class="card-text fw-bold my-4 fs-3">23</p>
                    </div>
                    <a href="index.php?page=jabatan" class="btn bg-dongker text-white" style="height: 35px; width: 40px"
                      ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                        <path
                          d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 mb-3" style="width: 330px">
                <div class="card rounded-4">
                  <div class="card-body d-flex justify-content-between">
                    <div>
                      <h5 class="card-title">Total Pembelian</h5>
                      <p class="card-text fw-bold my-4 fs-3">23</p>
                    </div>
                    <a href="index.php?page=jabatan" class="btn bg-dongker text-white" style="height: 35px; width: 40px"
                      ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                        <path
                          d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 mb-3" style="width: 330px">
                <div class="card rounded-4">
                  <div class="card-body d-flex justify-content-between">
                    <div>
                      <h5 class="card-title">Total Pemasukan</h5>
                      <p class="card-text fw-bold my-4 fs-3">Rp. 20.000.000</p>
                    </div>
                    <a href="index.php?page=jabatan" class="btn bg-dongker text-white" style="height: 35px; width: 40px"
                      ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                        <path
                          d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
    </main>
    <?php
        include "footer.php";
    ?>