<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST['tableName'])) {
    // เชื่อมต่อฐานข้อมูล
    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $tableName = $_POST['tableName'];

    $sql = "DELETE FROM tabletype WHERE tableTypeId = '$tableName'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.reload();</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>
