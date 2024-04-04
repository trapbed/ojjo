<?php
include "../connectbd.php";
$idUser = $_GET['idUser'];
$block = mysqli_query($conn, "UPDATE users SET blocked = 1 WHERE user_id = $idUser");
header("Location: index.php?page=users");

?>