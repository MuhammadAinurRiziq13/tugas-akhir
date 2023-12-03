<?php
session_start();
require_once 'config/config.php';

// $database = new Database();

if(!empty($_SESSION['level'])){
    include 'template/header.php';

    if(!empty($_GET['page'])){
        include 'template/'.$_GET['page']. '.php';
    }else{
        include 'template/dashboard.php';
    }

    include 'template/footer.php';
} else {
    header("Location: login.php");
}
?>
