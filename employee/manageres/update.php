
<?php
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";    //ตามที่กำหนดให้

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST['tableName']) && isset($_POST['id'])) {
    // เชื่อมต่อฐานข้อมูล
    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $tableName = strtoupper($_POST['tableName']);
    $id = $_POST['id'];

    $sql = "UPDATE tabletype SET tableTypeId = '$tableName' WHERE tableTypeId = '$id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>window.location.reload();</script>";
    } else {
        echo 
        '
            <script>alert("โปรดกรอก ตัวอักษร+(0-9)")</script>
        ';
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>
