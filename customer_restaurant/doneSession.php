<?php

session_start();

if (isset($_SESSION['orderId'])) {
    $orderId = $_SESSION['orderId'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

// Create connection <div id="basket" class="w-w-1/4"></div>
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$updateOrderStatusSQL = "UPDATE orders SET orderStatus ='เสร็จสิ้นออเดอร์' WHERE orderId = $orderId";
$conn->query($updateOrderStatusSQL);

session_unset();
session_destroy();

$conn->close();


?>
