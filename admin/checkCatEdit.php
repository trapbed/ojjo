<?php
require "../connectbd.php";
$cat_id = isset($_POST['cat_id']) ? trim($_POST['cat_id']) :false;
$cat_name = isset($_POST['cat_name']) ? trim($_POST['cat_name']) :false;

$cat_oldinfo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM category WHERE category_id=$cat_id"));
function check_error ($error) {return "<script> alert('$error'); 
    location.href='index.php?page=categories'; </script>";
}    
$query_update = "UPDATE category SET ";
$check_update = false;
if ($cat_oldinfo["category_name"] != $cat_name) {
    $query_update .= "category_name = '$cat_name', "; 
    $check_update = true;
}
if ($check_update) {
    $query_update = substr($query_update, 0, -2);
    $query_update .= " WHERE category_id = $cat_id";
    $result = mysqli_query($conn, $query_update);
    if ($result) {
        echo check_error("Данные обновлены!");
    }
    else{
        echo check_error("Ошибка обновления!".mysqli_error($conn));
    }
}
else {
    echo check_error("Данные актуальны!");
}
?>