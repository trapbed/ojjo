<?php
    session_start();

    include "../connectbd.php";
    $idishka = isset($_SESSION['id']) ? $_SESSION['id'] : false;
    if(!isset($_SESSION['id']) || $_SESSION['admin_status'] == '0'){
        // header("Location:../index.php");
        $_SESSION['mess'] = "Вы не можете перейти в административную часть сайта";
        echo "<script>location.href='../index.php';</script>";
    }
    $queryUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from users WHERE user_id = $idishka"));    

    if(isset($_SESSION['mess'])){
        // header("Location:../index.php");
        $mess = $_SESSION['mess'];
        echo "<script>alert('$mess');</script>";
        unset($_SESSION['mess']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</head>
<body>
        <nav id='navFixedButton'>
            <div>
                <div id="navLeft">
                    <span>Контрагентам</span>
                    <span>Дизайнерам</span>
                    <span>Вакансии</span>
                </div>
                <a href="../index.php"><img src="../images/logo.png" alt="logo" id="logo"></a>
                <div id="navRight">
                    <div id="search">
                        <img src="../images/search.png" alt="search">
                        <span>Поиск</span>
                    </div>
                    <?php

                        echo "<a id='logIn' href='../exit.php'>".$queryUser['user_name']."- admin/ выйти</a>";
                    

                    ?>
                    <div id="icons">
                        <img src="../images/profile.png" alt="profile">
                        <img src="../images/like.png" alt="like">
                    </div>
                </div>
            </div>
        </nav>
        <?php
    $s1 = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : false;
    $s2 = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : false;
    $s3 = isset($_SERVER['QUERY_STRING'])? "?".$_SERVER['QUERY_STRING'] : false;

    $sLast = $s1.$s2.$s3;

    // echo $sLast;
    ?>
        <script>
                let inputs = document.getElementsByClassName("input");//input
                let labels = document.getElementsByClassName("label");//label
                for(let i=0 ; i<inputs.length ; i++) {
                            inputs[i].onfocus = function( ){
                                labels[i].style.top = "0vmax";
                                labels[i].style.color = "white";
                                labels[i].style.paddingLeft = "0vmax";
                            }
                            
                            inputs[i].onblur = function(){
                                labels[i].style.color = "#333";
                                labels[i].style.top = "1.6vmax";
                                labels[i].style.paddingLeft = "1vmax";
                            }
                }
        </script>
        <a href='#navFixedButton'><div id='fixedButton'></div></a>