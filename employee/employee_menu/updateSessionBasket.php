<!-- update_session.php -->

<?php
session_start();

if (isset($_POST['menuId'])  && isset($_POST['menuName']) && isset($_POST['menuQuantity'])) {
    $menuId = $_POST['menuId'];
    $menuName = $_POST['menuName'];
    $menuQuantity = $_POST['menuQuantity'];
}

$menuItem = [
    'menuId' => $menuId,
    'menuName' => $menuName,
    'menuQuantity' => $menuQuantity
];

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

$_SESSION['basket'][] = $menuItem;

echo "<pre>";
var_dump($_SESSION['basket']);
echo "</pre>";

$conn->close();


?>
