<?php
session_start();
// setcookie('id', $id, time() - 3600*5, "/");
    // $_SESSION['id'] = $ ;
    unset($_SESSION['id']);
    // unset($_SESSION['rowCart']);
    require_once "deleteCart.php";
    echo "<script>location.href = 'index.php';</script>"
?>