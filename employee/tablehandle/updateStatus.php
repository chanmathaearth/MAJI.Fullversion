<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the POST request
$tableName = $_POST['tableName'];


$sql = "UPDATE tabletype SET tableTypeStatus = 'ไม่ว่าง' WHERE tableTypeId = '$tableName'";
$conn->query($sql);


$orderSQL = "INSERT INTO orders (tableId, orderDateTime, orderStatus) VALUES ('$tableName', NOW(), 'กำลังสั่งอาหาร')";
$conn->query($orderSQL);
$orderId = $conn->insert_id;

$paymentSQL = "INSERT INTO payment (orderId, amountMoney, paymentStatus) VALUES ($orderId, 0, 'กำลังชำระเงิน') ";
$conn->query($paymentSQL);

// Close the database connection
$conn->close();

echo $orderId;

?>