<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['tableId'])) {
    $tableId = intval($_POST['tableId']);
}


$tableOrder = "SELECT orderId FROM orders WHERE tableId = $tableId AND orderStatus != 'เสร็จสิ้น' ORDER BY orderDateTime DESC LIMIT 1";
$resultTableOrder = $conn->query($tableOrder);


if ($resultTableOrder) {
    $row = $resultTableOrder->fetch_assoc();
    $orderId = $row['orderId'];
}

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $conn->query($menuSQL);
    }
}


session_unset();
session_destroy();

$conn->close();

?>