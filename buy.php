<?php 
    session_start();
    require "connectbd.php";
    require "header.php";
    $id_prod = $_POST['idProd'];

    echo $id_prod;
    echo "buy";

?>
