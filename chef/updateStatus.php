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

if (isset($_POST['orderId']) && isset($_POST['menuId']) && isset($_POST['menuStatus'])) {
  // Retrieve the values of orderId, menuId, and menuStatus
  $orderId = $_POST['orderId'];
  $menuId = $_POST['menuId'];
  $menuStatus = $_POST['menuStatus'];
  // Use the values as needed
}


if ($menuStatus === 'ได้รับเมนู') {
  $menuStatusUpdate = 'กำลังทำเมนู';
} else if ($menuStatus === 'กำลังทำเมนู') {
  $menuStatusUpdate = 'เสร็จสิ้นเมนู';
}

echo "1.$orderId, 2.$menuId, 3.$menuStatus";
// Perform the update operation
$sql = "UPDATE orderDetail SET menuStatus = '$menuStatusUpdate' WHERE orderId = '$orderId' && menuId = '$menuId'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>