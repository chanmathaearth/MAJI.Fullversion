<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlforyesterday = "SELECT SUM(amountMoney) AS totalAmount FROM `payment` WHERE DATE(paymentDateTime) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$resultforyesterday = mysqli_query($conn, $sqlforyesterday);

// เรียกข้อมูลผลลัพธ์และส่งค่ากลับ
if (mysqli_num_rows($resultforyesterday) > 0) {
    $row = mysqli_fetch_assoc($resultforyesterday);
    echo $row["totalAmount"];
} else {
    echo 0;
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
