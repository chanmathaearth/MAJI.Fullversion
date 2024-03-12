<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['accountId'])) {
        // Session ถูกต้อง
        $accountId = $_SESSION['accountId'];
        echo "User is logged in with accountId: $accountId";
    } else {
        // Session ไม่ถูกต้อง
        echo "User is not logged in.";
    }    
    ?>
</body>
</html>