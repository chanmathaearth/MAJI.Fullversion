<?php

// Start the session
session_start();

// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $checkEmailQuery = "SELECT accountId FROM account WHERE accountEmail = ? AND accountPassword = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("ss", $email, $password);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the email and password combination exists in the database
    if ($result->num_rows > 0) {
        // Fetch the accountId from the result set
        $row = $result->fetch_assoc();
        $accountId = $row['accountId'];

        // Store accountId in the session
        $_SESSION['accountId'] = $accountId;

        echo "เข้าสู่ระบบเสร็จสิ้น";

    } else {
        echo "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>
