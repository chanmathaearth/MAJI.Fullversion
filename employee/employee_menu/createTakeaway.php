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

if (isset($_POST['custId']) && isset($_POST['paymentMethod']) && isset($_POST['amountMoney'])) {
    $custId = intval($_POST['custId']);
    $paymentMethod = $_POST['paymentMethod'];
    $amountMoney = intval($_POST['amountMoney']);
}




$takeaway = "INSERT INTO takeaway (takeawayName, takeawayPhone, takeawayBranch) VALUES ('', '', 'ลาดกระบัง')";
$conn->query($takeaway);

$takeawayId = $conn->insert_id;

echo "1. $custId 2. $paymentMethod 3. $amountMoney 4.$takeawayId";

if ($custId === 0) {
    $order = "INSERT INTO orders (takeawayId, orderDateTime, orderStatus) VALUES ($takeawayId, NOW(), 'ได้รับออเดอร์')";
    $conn->query($order);
    $orderId = $conn->insert_id;
    $payment = "INSERT INTO payment (orderId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, $amountMoney, '$paymentMethod', NOW(), 'ชำระเงินเสร็จสิ้น')";
} else {
    $order = "INSERT INTO orders (takeawayId, orderDateTime, orderStatus, custId) VALUES ($takeawayId, NOW(), 'ได้รับออเดอร์', $custId)";
    $conn->query($order);
    $orderId = $conn->insert_id;
    $payment = "INSERT INTO payment (orderId, promotionId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, 1, $amountMoney, '$paymentMethod', NOW(), 'ชำระเงินเสร็จสิ้น')";
}

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $conn->query($menuSQL);
    }
}


$conn->query($payment);

session_unset();
session_destroy();

$conn->close();

?>