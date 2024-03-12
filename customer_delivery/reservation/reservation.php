<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้

$conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['guest']) && isset($_POST['date']) && isset($_POST['time'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $guest = mysqli_real_escape_string($conn, $_POST['guest']);
        $date = date("Y-m-d"); // ใช้ฟังก์ชัน date() เพื่อรับวันที่ปัจจุบัน
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $time_formatted = date("H:i:s", strtotime($time));

        $sql = "INSERT INTO reservation (reservationName, reservationPhone, reservationDate, peopleReserved, reservationStatus, reservationTime)
        VALUES ('$name', '$phone', '$date', '$guest', 'รอการเช็คอิน', '$time_formatted');";


        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.reload();</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
}
?>
