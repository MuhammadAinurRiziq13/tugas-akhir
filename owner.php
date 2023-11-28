<?php
require_once 'config.php';

$database = new Database();

if(!isset($_SESSION['user_session'])) {
 header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Owner Page</title>
</head>
<body>
 <h2>Welcome to Owner Page</h2>
</body>
</html>
