<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST['feedbackText'])) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $feedbackText = $_POST['feedbackText'];

    $pattern = "/แตด|หี|เหี้ย|สัส|ควย|มึง/";
    if (preg_match($pattern, $feedbackText)) {
        echo "<script>alert(ข้อความมีคำหยาบ กรุณากรอกข้อความใหม่)</script>";
    } else {
        $sql = "INSERT INTO feedback (content, feedback_date) VALUES ('$feedbackText', NOW());";

        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.reload();</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>
