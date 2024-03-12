<?php
// Connect to your database
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['orderId']) && isset($_POST['paymentId']) && isset($_POST['paymentMethod']) && isset($_POST['deliveryId'])) {
  $orderId = $_POST['orderId'];
  $paymentId = $_POST['paymentId'];
  $paymentMethod = $_POST['paymentMethod'];
  $deliveryId = $_POST['deliveryId'];
}


echo "1.$paymentId 2.$deliveryId";

$paymentSQL = "UPDATE payment SET paymentMethod = '$paymentMethod', paymentStatus = 'ชำระเงินเสร็จสิ้น' WHERE paymentId = '$paymentId'";

$deliverySQL = "UPDATE delivery SET deliveryStatus = 'จัดส่งเสร็จสิ้น' WHERE deliveryId = '$deliveryId'";

$orderSQL = "UPDATE orders SET orderStatus = 'เสร็จสิ้นออเดอร์', orderDateTime = NOW() WHERE orderId = '$orderId'";

if (($conn->query($paymentSQL) === TRUE) && ($conn->query($deliverySQL) === TRUE) && ($conn->query($orderSQL) === TRUE)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?>