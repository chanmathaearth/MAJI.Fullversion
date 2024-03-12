<?php
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";    //ตามที่กำหนดให้

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlfor90days = "SELECT SUM(amountMoney) AS totalAmount FROM `payment` WHERE DATE(paymentDateTime) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND DATE(paymentDateTime) <= CURDATE()";
$resultfor90days = mysqli_query($conn, $sqlfor90days);

// เรียกข้อมูลผลลัพธ์และส่งค่ากลับ
if (mysqli_num_rows($resultfor90days) > 0) {
    $row = mysqli_fetch_assoc($resultfor90days);
    echo $row["totalAmount"];
} else {
    echo 0;
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
