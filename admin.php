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
 <title>Admin Page</title>
</head>
<body>
 <h2>Welcome to Admin Page</h2>
</body>
</html>
