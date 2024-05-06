<?php
$jew_id = isset($_GET['id']) ? trim($_GET['id']) :false;
$edit = isset($_GET['edit']) ? trim($_GET['edit']) :false;
?>
<script>let edit ='<?php if ($edit) echo $edit; ?>';
if (edit=='delete') {
let answer = confirm('Вы точно хотите удалить товар?');
        if (answer) {<?php session_start(); 
                           $_SESSION['edit']=$edit; 
                           $_SESSION['jew_id']=$jew_id; 
                      ?>
                           location.href='editJewStatus.php';} 
        else {location.href='index.php?page=items';} }
else {<?php session_start(); 
            $_SESSION['edit']=$edit; 
            $_SESSION['jew_id']=$jew_id; 
        ?>
    location.href='editJewStatus.php';}
</script>  
