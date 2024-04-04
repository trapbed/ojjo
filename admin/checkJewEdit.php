<?php
require "../connectbd.php";
$jew_id = isset($_POST['jew_id']) ? trim($_POST['jew_id']) :false;
$jew_cat = isset($_POST['jew_cat']) ? trim($_POST['jew_cat']) :false;
$jew_descr = isset($_POST['jew_descr']) ? trim($_POST['jew_descr']) :false;
$jew_price = isset($_POST['jew_price']) ? trim($_POST['jew_price']) :false;
$jew_name = isset($_POST['jew_name']) ? trim($_POST['jew_name']) :false;
$jew_img = ($_FILES["jew_img"]["size"]!=0)?($_FILES["jew_img"]):false;
$jew_oldinfo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jewelery WHERE jew_id=$jew_id"));
$category_re = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM category WHERE category_name='$jew_cat'"));
function check_error ($error) {return "<script> alert('$error'); 
    location.href='index.php'; </script>";}    
$query_update = "UPDATE jewelery SET ";
$check_update = false;
if ($jew_oldinfo["jew_name"] != $jew_name) {$query_update .= "jew_name = '$jew_name', "; 
                                   $check_update = true;}
if ($jew_oldinfo["jew_price"] != $jew_price) {$query_update .= "jew_price = $jew_price, ";
    $check_update = true;}
if ($jew_oldinfo["jew_descr"] != $jew_descr) {$query_update .= "jew_descr = '$jew_descr', ";
    $check_update = true;}
if ($jew_oldinfo["jew_cat"] != $category_re["category_id"]) {$category_id = $category_re['category_id'];
    $query_update .= "jew_cat = $category_id, ";
        $check_update = true;}
if ($jew_img) {$query_update .= "jew_img ='".$jew_img['name']."', ";
    $check_update = true;
            move_uploaded_file($jew_img["tmp_name"], "../resources/$jew_img[name]");}

if ($check_update) {$query_update = substr($query_update, 0, -2);
                    $query_update .= " WHERE jew_id = $jew_id";
                    $result = mysqli_query($conn, $query_update);
                     if ($result) {echo check_error("Данные обновлены!");}
                     else echo check_error("Ошибка обновления!".mysqli_error($conn));}
else {echo check_error("Данные актуальны!");}
?>