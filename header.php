<?php
session_start();
include "connectbd.php";
    $idishka = isset($_SESSION['id']) ? $_SESSION['id'] : false;


    if(isset($_SESSION['mess'])){
        echo "<script>alert('".$_SESSION['mess']."');</script>";
    }


    if($idishka == false){
        echo "<div id='background'></div>

        <section id='logInModal' >
        <form action='checkLogIn.php' method='POST' id='voiti' class='form'>
            <img src='images/x.png' alt='christ' class='christ' id='christ'>
            <p id='headerForm'>Войти</p>
            <div class='forLabel'>
                <label for='logins' id='labels' class='label'>
                    Логин
                </label>
                <input type='text' name='logins' id='logins' class='input' required>
            </div>
            <div class='forLabel'>
            <label for='password' class='label' id='labels'>
                    Пароль
            </label>
            <input type='text' name='password' id='password' class='input' required>
            </div>
            <div class='btns'>
                <span id='toSignIn'>Зарегистрироваться</span>
                <input type='submit' value='Войти'>
            </div>";
            if(isset($_SESSION['checkPass']) && $_SESSION['checkPass'] >= 1){
                echo "<div id='forgetPass'>Забыли пароль? <div id='recoverPass'>Восстановить.</div></div>";
                unset($_SESSION['checkPass']);
            }
        echo "</form>
    </section>
    
    
    <section id='recoverPassDiv' >
        <form action='recoverPass.php' method='POST' id='voiti' class='form'>
            <img src='images/x.png' alt='christ' class='christ' id='christ'>
            <p id='headerForm'>Восстановить пароль </p>
            <div class='forLabel'>
                <label for='email' id='labels' class='label'>
                    Почта
                </label>
                <input type='text' name='email' id='logins' class='input' required>
            </div>
            <div class='btns'>
                <input type='submit' value='Восстановить'>
            </div>
        </form>
    </section>

    <section id='signInModal'>
        <form action='checkPreSignIn.php' method='POST' id='zareg' class='form'>
            <img src='images/x.png' alt='christ' class='christ'>
            <p id='headerForm'>Зарегистрироваться</p>
            <div class='forLabel'>
                <label for='name' id='labels' class='label'>
                    ФИО
                </label>
                <input type='text' name='name' id='name' class='input' required>
            </div>
            <div class='forLabel'>
                <label for='phone' id='labels' class='label'>
                    Логин (email)
                </label>
                <input type='email' name='phone' id='phone' class='input' required>
            </div>
            <div class='coffee' id='coffee'>Номер телефона не соответствует шаблону</div>
            <div class='forLabel'>
                <label for='password' class='label' id='labels'>
                        Пароль
                </label>
                <input type='text' name='password' id='password' class='input' required>
            </div>
            <div class='btns'>
                <span id='toLogIn'>Войти</span>
                <input type='submit' value='Зарегистрироваться'>
            </div>
        </form>
    </section>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJJO</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <?php
        if($_SERVER['PHP_SELF'] == '/index.php'){
            echo "<header>";
        }
        ?>
        <nav id='navFixedButton'>
            <div>
                <div id="navLeft">
                    <span>Контрагентам</span>
                    <span>Дизайнерам</span>
                    <span>Вакансии</span>
                </div>
                <a href="index.php"><img src="images/logo.png" alt="logo" id="logo"></a>
                <div id="navRight">
                    <div id="search">
                        <img src="images/search.png" alt="search">
                        <span>Поиск</span>
                    </div>
                    <?php

                    if($idishka == false){
                        echo "<div id='logIn'>Вход/Регистрация</div>";
                    }
                    else{
                        echo "<a id='logIn' href='exit.php'>Выйти</a>";
                    }

                    ?>
                    <div id="icons">
                        <?php
                            if($idishka == false){
                                echo "<img src='images/profile.png' alt='profile'>";
                            }
                            else{
                                echo "<a href='account.php'><img src='images/profile.png' alt='profile'></a>";
                            }
                        ?>
                        <img src="images/like.png" alt="like">
                    </div>
                </div>
            </div>
        </nav>

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
    <?php
    if (isset($_SESSION['check'])) {echo "<script>let btn = document.getElementById('logIn');
        let bg=document.getElementById('background');
        let toReg=document.getElementById('toSignIn');
        let toSign=document.getElementById('toLogIn');
        let modalLog=document.getElementById('logInModal');
        let modalSign=document.getElementById('signInModal');
        let christ=document.getElementsByClassName('christ');
        let coffee = document.getElementById('coffee');
                                                    btn.addEventListener('click', function(){
                                                        bg.style.visibility='visible';
                                                        modalLog.style.top='20vmax';
                                                    });
                                                    toReg.addEventListener('click', function(){
                                                        modalLog.style.top='-50vmax';
                                                        modalSign.style.top='20vmax';
                                                    })
                                                    
                                                    toSign.addEventListener('click', function(){
                                                        modalLog.style.top='20vmax';
                                                        modalSign.style.top='-50vmax';
                                                    })
                                                    
                                                    for(let i=0;i<christ.length;i++){
                                                        christ[i].addEventListener('click', function(){
                                                            modalLog.style.top='-50vmax';
                                                            modalSign.style.top='-50vmax';
                                                            bg.style.visibility='hidden';
                                                        })
                                                    }
                                                                    let inputs = document.getElementsByClassName('input');//input
                                                                    let labels = document.getElementsByClassName('label');//label
                                                                    for(let i=0; i<inputs.length;i++) {
                                                                        
                                                                                inputs[i].onfocus = function( ){
                                                                                    labels[i].style.top = '0vmax';
                                                                                    labels[i].style.color = 'white';
                                                                                    labels[i].style.paddingLeft = '0vmax';
                                                                                }
                                                                                inputs[i].onblur = function(){
                                                                                    labels[i].style.color = '#333';
                                                                                    labels[i].style.top = '1.6vmax';
                                                                                    labels[i].style.paddingLeft = '1vmax';
                                                    
                                                                        }}
                                                     btn.click();
                                                     toReg.click();
                                                     inputs[3].style.borderColor='red';
                                                     coffee.style.display = 'block';
                                                     </script>";} 
                                                     unset($_SESSION['check']);
                                                    //  setcookie('check', '' , time()-3600, '/');
    ?>
        <a href='#navFixedButton'><div id='fixedButton'></div></a>
