<?php
    require "../connectbd.php";

    $name = isset($_POST['name']) ? $_POST['name'] : false;
    $category = isset($_POST['category']) ? $_POST['category'] : false;
    $desc = isset($_POST['description']) ? $_POST['description'] : false;
    $img = isset($_POST['image']) ? $_POST['image'] : false;
    $price = isset($_POST['price']) ? $_POST['price'] : false;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : false;

    $query = "";
    $check = false;
    $error = '';

    if($name!=false && $category!=false && $desc!=false && $img!=false && $price!=false && $brand!=false){
        $query = mysqli_query($conn, "INSERT INTO `jewelery`( `jew_name`, `jew_cat`, `jew_descr`, `jew_img`, `jew_price`, `jew_brand`, `availability`) VALUES ('$name', '$category', '$desc', '$img', '$price' ,'$brand' , '0' )");
        $error = "Карточка товара создана!";
        unset($_SESSION['name']);
        unset($_SESSION['cat']);
        unset($_SESSION['desc']);
        unset($_SESSION['img']);
        unset($_SESSION['price']);
        unset($_SESSION['brand']);
        move_uploaded_file($img, "images/jew/".$img.")");
        // echo 1;
        echo "<script> 
            alert('$error');
            location.href='index.php?page=items';
        </script>";
    }
    else{
        $error = " Данные о товаре не заполнены ! ";
        // echo 6;
        echo "<script> 
            alert('$error');
            location.href='index.php?page=items';
        </script>";
    }
?>