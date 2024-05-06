<?php
session_start();
require "../connectdb.php";
$cat_id = isset($_GET['id_cat']) ? trim($_GET['id_cat']) :false;
$edit_cat = isset($_GET['edit_cat']) ? trim($_GET['edit_cat']) :false;
if ($edit_cat=='delete') {$jewArr = mysqli_query($conn, "SELECT * FROM jewelery WHERE jew_cat=$cat_id AND jew_status='available'");
                          if (mysqli_num_rows($jewArr)!=0) {echo "<script>alert('В этой категории еще есть неудаленные продукты! Удалите их !');
                            location.href='category.php'; </script>";} }
?>
<script>let edit_cat ="<?php if ($edit_cat) echo $edit_cat; ?>";
if (edit_cat=='delete') {
let answer = confirm('Вы точно хотите удалить категорию?');
        if (answer) {<?php session_start(); 
                           $_SESSION['edit_cat']=$edit_cat; 
                           $_SESSION['cat_id']=$cat_id; 
                      ?>
                           location.href='editCatStatus.php';} 
        else {location.href='category.php';} }
else {<?php 
            $_SESSION['edit_cat']=$edit_cat; 
            $_SESSION['cat_id']=$cat_id; 
        ?>
    location.href='editCatStatus.php';}
</script>  