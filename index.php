<?php
session_start();
require_once 'config/config.php';

// $database = new Database();

if(!empty($_SESSION['level'])){
    include 'admin/template/header.php';

    if(!empty($_GET['page'])){
        include 'admin/template/'.$_GET['page']. '.php';
    }else{
        include 'admin/template/dashboard.php';
    }

    include 'admin/template/footer.php';
} else {
    header("Location: login.php");
}
?>
