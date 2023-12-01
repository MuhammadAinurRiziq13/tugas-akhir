<?php
session_start();
require_once 'config/config.php';

$database = new Database();

if(isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $database->conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_session'] = $row['id_user'];
        $_SESSION['level'] = $row['level']; // Tambahkan baris ini untuk menyimpan level pengguna

        echo '<script>alert("Login Sukses");window.location="index.php"</script>'; 
        // Langsung arahkan ke index.php setelah login
        // header("Location: index.php");
        exit;
    } else {
        echo '<script>alert("Login Gagal");history.go(-1);</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.118.2" />
    <title>simacan</title>
    <link rel="icon" href="assets/img/favicons/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1), inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/style/sign-in.css" rel="stylesheet" />
  </head>
  <body class="d-flex align-items-center justify-content-center bc-navy">
    <main class="form-signin">
      <form class="wrap py-4 px-5 rounded-4" style="width: 30rem" method="post">
        <div class="d-flex justify-content-center align-items-center mb-4">
          <img src="assets/image/logo.png" alt="logo" class="img-fluid me-0 mt-2" style="height: 60px" />
          <h4 class="h3 mt-3 color-dongker c-navy"><b>Login Simacan</b></h4>
        </div>
        <div class="form-floating mb-2">
          <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required/>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required/>
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn bc-navy w-100 py-2 text-white mb-3" type="submit" name="btn-login">SIGN IN</button>
      </form>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
