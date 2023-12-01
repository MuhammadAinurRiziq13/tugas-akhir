<?php
session_start();
require_once 'config/config.php';

// $database = new Database();

if(!empty($_SESSION['level'])){

    if(!empty($_GET['page'])){
        include 'template/'.$_GET['page']. '.php';
    }else{
        include 'template/dashboard.php';
    }

    // if ($_SESSION['level'] == 1) {
    //     include 'owner.php';
    // } elseif ($_SESSION['level'] == 2) {
    //     include 'admin.php';
    // }

    // include 'admin/template/footer.php';
} else {
    header("Location: login.php");
}
?>
