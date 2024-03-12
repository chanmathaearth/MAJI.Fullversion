<?php
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderId = $_POST['orderId'];
$deliveryId = $_POST['deliveryId'];

// Fetch menu statuses for the given orderId
$sql = "SELECT COUNT(*) AS totalMenus, SUM(CASE WHEN menuStatus = 'เสร็จสิ้นเมนู' THEN 1 ELSE 0 END) AS completedMenus
        FROM orderDetail
        WHERE orderId = $orderId";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    // Check if all menus are completed
    if ($row['totalMenus'] == $row['completedMenus']) {
        // Update order status
        $updateSql = "UPDATE orders SET orderStatus = 'เสร็จสิ้นออเดอร์' WHERE orderId = '$orderId'";

        if ($deliveryId !== 0) {
            $deliverySQL = "UPDATE delivery SET deliveryStatus = 'กำลังจัดส่ง' WHERE deliveryId = '$deliveryId'";
            $conn->query($deliverySQL);
        }
        

        if ($conn->query($updateSql) === TRUE) {
            echo "true";
        } else {
            echo "Error updating order status: " . $conn->error;
        }
    } else {
        echo "false";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
