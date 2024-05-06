<?php
require "../connectbd.php";
session_start();
$cat_id = $_SESSION['cat_id'];
    $edit_cat = $_SESSION['edit_cat'];
function check_error ($error) {unset($_SESSION['cat_id']); unset($_SESSION['edit_cat']);
    return "<script> alert('$error'); 
    location.href='index.php?page=categories'; </script>";}  
    
if ($edit_cat=='recover') {$query_update = "UPDATE category SET category_status = 'available' WHERE category_id = $cat_id";
    $result = mysqli_query($conn, $query_update);
    echo check_error("Категория восстановлена!");}
else if ($edit_cat=='delete') {$query_update = "UPDATE category SET category_status = 'deleted' WHERE category_id = $cat_id";
    $result = mysqli_query($conn, $query_update);
    echo check_error("Категория удалена!");} 
?>