<?php
include "../connectbd.php";
$idUser = $_GET['idUser'];
echo $idUser;
$block = mysqli_query($conn, "UPDATE users SET blocked = 0 WHERE user_id = $idUser");
header("Location: index.php?page=users");
?>