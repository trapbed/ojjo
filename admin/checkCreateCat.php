<?php
include "../connectbd.php";
$cat_name = isset($_POST["cat_name"])?($_POST["cat_name"]):false;
function check_error ($error) {return "<script> alert('$error'); 
    // location.href='index.php?page=categories'; </script>";
} 
$query_res = mysqli_query($conn, "INSERT INTO category (category_name, category_status) VALUES ('$cat_name','available')");
if ($query_res) {
    echo check_error("Данные обновлены!");
}
else { 
    echo check_error("Ошибка обновления!".mysqli_error($conn));
}
?>