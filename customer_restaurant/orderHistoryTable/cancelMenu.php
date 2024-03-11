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

if (isset($_POST['orderId']) && isset($_POST['menuId'])) {
    $orderId = $_POST['orderId'];
    $menuId = $_POST['menuId'];
}


echo "1.$orderId 2.$menuId";

$cancelMenuSQL = "UPDATE orderdetail SET menuStatus = 'ยกเลิกเมนู' WHERE orderId =$orderId && menuId =$menuId";

if ($conn->query($cancelMenuSQL) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
