<?php
    require "connectbd.php";
    $phone = trim($_POST['phone']);
    $pass = trim($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM 'users' WHERE 'phone' = $phone");
?>