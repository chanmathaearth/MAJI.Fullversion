<?php

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

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])) {
        // Retrieve the values of orderId, menuId, and menuStatus
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        // Use the values as needed
      }

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM account WHERE accountEmail = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo "อีเมลเคยถูกใช้ไปแล้ว";
    } else {
        // Insert into account table
        $accountSQL = "INSERT INTO account (accountEmail, accountPassword) VALUES ('$email', '$password')";

        if ($conn->query($accountSQL) === TRUE) {
            // Get the auto-incremented accountId
            $accountId = $conn->insert_id;

            // Insert into customer table with the obtained accountId
            $customerSQL = "INSERT INTO customer (custName, custSurname, custPhone, accountId) VALUES ('$firstname', '$lastname', '$phone', $accountId)";

            if ($conn->query($customerSQL) === TRUE) {
                echo "ลงทะเบียนเรียบร้อย";
            } else {
                echo "Error: " . $customerSQL . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $accountSQL . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();

?>
