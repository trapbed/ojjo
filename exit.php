<?php
session_start();
    unset($_SESSION['id']);
    require_once "deleteCart.php";
    echo "<script>location.href = 'index.php';</script>"
?>