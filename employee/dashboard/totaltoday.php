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

$sqlfortoday = "SELECT SUM(amountMoney) AS totalAmount FROM `payment` WHERE DATE(paymentDateTime) = CURDATE()";
$resultfortoday = mysqli_query($conn, $sqlfortoday);
$totalAmount = 0;

// เรียกข้อมูลผลลัพธ์และส่งค่ากลับ
if (mysqli_num_rows($resultfortoday) > 0) {
    $row = mysqli_fetch_assoc($resultfortoday);
    echo $row["totalAmount"];
} else {
    echo 0;
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
