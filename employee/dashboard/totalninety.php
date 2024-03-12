<?php
$dbPath = "../../test.db";
try {
    $pdo = new PDO("sqlite:$dbPath");
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT SUM(amountMoney) AS totalAmount 
    FROM payment 
    WHERE DATE(paymentDateTime) >= DATE('now', '-90 days') AND DATE(paymentDateTime) < DATE('now');
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row["totalAmount"] ?? 0;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

