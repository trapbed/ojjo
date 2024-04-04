<?php
    $prodId = $_COOKIE['product'];
     include "connectbd.php";
     echo $_COOKIE['name'];
     echo $_COOKIE['cat'];
     echo $_COOKIE['desc'];
     echo $_COOKIE['img'];
     echo $_COOKIE['price'];
     echo $_COOKIE['brand'];
    if($idishka!=false){
        $updateDraft = mysqli_query($conn, "");
    }
    else {
        echo "<script>alert('Вы не зарегистрированы, что бы сделать заказ или заполнить корзину вам нужно зарегистрироваться!');
        location.href = 'product.php';</script>";
    }
?>

<!-- 
валидация на JAVA SCRIPT при регистрации

при неправильно введенных данных подсвечивать красным и выводить соо об ошибке

при введении данных placeholder поднимать 

номер телефона - маска или джаваскрипт
осведомлять титле у инпута или диалоговое окно 
навигация -->