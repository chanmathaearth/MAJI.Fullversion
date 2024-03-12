<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    if (isset($_SESSION['basket'][$index])) {
        // Remove the item from the basket based on the index
        unset($_SESSION['basket'][$index]);

        // Reset array keys to avoid gaps in the array
        $_SESSION['basket'] = array_values($_SESSION['basket']);
    }
}

// Redirect back to the basket page
header('Location: menuPage.php?menuTypeId=6');

?>