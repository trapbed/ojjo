<?php
require "../connectbd.php";
session_start();
$jew_id = $_SESSION['jew_id'];
    $edit = $_SESSION['edit'];
function check_error ($error) {unset($_SESSION['jew_id']); unset($_SESSION['edit']);
    return "<script> alert('$error'); 
    location.href='index.php?page=items'; </script>";}  
    
if ($edit=='recover') {$query_update = "UPDATE jewelery SET availability = 0 WHERE jew_id = $jew_id";
    $result = mysqli_query($conn, $query_update);
    echo check_error("Товар восстановлен!");}
else if ($edit=='delete') {$query_update = "UPDATE jewelery SET availability = 1 WHERE jew_id = $jew_id";
    $result = mysqli_query($conn, $query_update);
    echo check_error("Товар удален!");} 
?>