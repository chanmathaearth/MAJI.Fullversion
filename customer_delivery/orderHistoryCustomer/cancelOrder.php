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

if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];
}


echo "1.$orderId";

$cancelSQL = "SELECT
deliveryId
FROM orders
WHERE orderId = $orderId
";

$cancelResult = $conn->query($cancelSQL);
if ($cancelResult->num_rows > 0) {
    $ordersDetailRow = $cancelResult->fetch_assoc();

    //status
    $deliveryId = $ordersDetailRow['deliveryId'];
}

$orderSQL = "UPDATE orders SET orderStatus = 'ยกเลิกออเดอร์', orderDateTime = NOW() WHERE orderId = $orderId";

if ($deliveryId !== null) {
    $deliverySQL = "UPDATE delivery SET deliveryStatus = 'ยกเลิกออเดอร์' WHERE deliveryId = $deliveryId";
}

$paymentSQL = "UPDATE payment SET paymentStatus = 'ยกเลิก' WHERE orderId = $orderId";

if (($conn->query($paymentSQL) === TRUE  && ($conn->query($orderSQL) === TRUE))) {
    if (($conn->query($deliverySQL) === TRUE)){
        echo "Record updated successfully";
    }
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


?>
