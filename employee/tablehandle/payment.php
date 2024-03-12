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
$tableId = $_POST['tableId'];
$orderId = $_POST['orderId'];
$amountMoney = $_POST['amountMoney'];
$paymentMethod = $_POST['paymentMethod'];

echo "$tableId $orderId $amountMoney $paymentMethod";


$paymentSQL = "UPDATE payment SET paymentStatus = 'ชำระเงินเสร็จสิ้น', amountMoney = $amountMoney, paymentMethod = '$paymentMethod'  WHERE orderId = $orderId";
$conn->query($paymentSQL);

$tableSQL = "UPDATE tabletype SET tableTypeStatus = 'ว่าง' WHERE tableTypeId = '$tableId'";
$conn->query($tableSQL);

// Close the database connection
$conn->close();


?>