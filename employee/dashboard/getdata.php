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
// คำสั่ง SQL เพื่อหาจำนวนออเดอร์ในแต่ละวัน
$sql = "SELECT DAYNAME(orderDateTime) AS day_of_week, COUNT(*) AS count 
        FROM `orders` 
        WHERE DAYOFWEEK(orderDateTime) BETWEEN 2 AND 7 
        GROUP BY DAYOFWEEK(orderDateTime)";

// สร้างการเชื่อมต่อกับฐานข้อมูล

// รันคำสั่ง SQL
$result = mysqli_query($conn, $sql);

// สร้างอาร์เรย์เพื่อเก็บข้อมูล
$data = array();

// เรียกข้อมูลในรูปแบบของอาร์เรย์และเพิ่มลงในอาร์เรย์
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row['count'];
}

// ส่งข้อมูลเป็น JSON
echo json_encode($data);
// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
