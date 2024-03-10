<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['tablesize'])) {
        $tableName = strtoupper($_POST['name']);
        $tableSize = $_POST['tablesize']; 
        $sqlforadd = "INSERT INTO tabletype (tableTypeid, tableSize, tableTypeStatus) VALUES ('$tableName', '$tableSize', 'ว่าง')";
        if (mysqli_query($conn, $sqlforadd)) {
            echo "<script>window.location.reload();</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มโต๊ะอาหาร');</script>";
        }
    }
    mysqli_close($conn);
}
?>
