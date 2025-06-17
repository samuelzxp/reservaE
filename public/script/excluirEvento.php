<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    if (isset($_SESSION['eventos'][$index])) {
        unset($_SESSION['eventos'][$index]);
        $_SESSION['eventos'] = array_values($_SESSION['eventos']);
    }
}

header("Location: meusEventos.php");
exit();
?>
