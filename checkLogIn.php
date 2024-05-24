<?php
// AUTHORIZATION
session_start();
    require "connectbd.php";
    $login = trim($_POST['logins']);
    $pass = trim($_POST['password']);

    $queryUser = mysqli_query($conn, "SELECT * FROM users WHERE user_login = '$login'");
    
    
    if(mysqli_num_rows($queryUser) != 0){
        $queryUser = mysqli_fetch_array($queryUser);
        // setcookie('id', $queryUser['user_id'], time()+3600, '/');
        $user = mysqli_query($conn, "SELECT * FROM users WHERE user_login = '$login' and user_password = '$pass'");

        if(mysqli_num_rows($user) != 0){
            $user = mysqli_fetch_array($user);
            $name = $queryUser["user_name"];
            $login = $queryUser["user_login"];
            $pass = $queryUser["user_password"];
            $birth = $queryUser["user_birth"];
            $id = $queryUser['user_id'];
            $admin_status = $queryUser['admin_status'];
            // header("Location: account.php");
            // setcookie('nameL', $name, time() + 3600*5, "/");
            $_SESSION['nameL'] = $name;
            // setcookie('loginL', $login , time() + 3600*5, "/");
            $_SESSION['loginL'] = $login;
            // setcookie('passL', $pass ,  time() + 3600*5, "/");
            $_SESSION['passL'] = $pass ;
            // setcookie('birthL', $birth ,  time() + 3600*5, "/");
            $_SESSION['pirthL'] = $birth;
            // setcookie('idL', $id, time() + 3600*5, "/");
            $_SESSION['idL'] = $id ;
            // setcookie('admin_status', $admin_status, time()+3600, '/');
            $_SESSION['admin_status'] = $admin_status ;
            $_SESSION['id'] = $queryUser['user_id'];
            $_SESSION['mess'] = "Вы успешно вошли в аккаунт";
            
            if($user['blocked']==1){
                $_SESSION['mess'] = "Вас заблокировали, Вы не можете пользоваться нашим сайтом!";
                echo "<script>alert('Вас заблокировали, Вы не можете пользоваться нашим сайтом!');
                location.href='index.php';</script>";
            }
            else if($admin_status == 1){
                $_SESSION['mess'] = "Вы вошли как админ";
                header("Location: admin/index.php?page=users");
            }
            else{
                $_SESSION['mess'] = "Вы вошли как покупатель";
                header("Location: account.php");
            }
        }
        else{
            if(!isset($_SESSION['checkPass'])){
                $_SESSION['checkPass'] = 1;
            }
            else{
                $_SESSION['checkPass'] ++;
            }
            $_SESSION['mess'] = "Не правильный пароль!";
                echo "<script>alert('Не правильный пароль!');
                location.href='index.php';</script>";
            header("Location: index.php");
        }
    }
    else{ 
        $_SESSION['mess'] = "Данный пользователь не найден!";
        echo "<script>alert(\"Данный пользователь не найден!\");
        location.href='index.php';
        </script>";
    }

?>
