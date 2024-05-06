<?php
// AUTHORIZATION
session_start();
    require "connectbd.php";
    $login = trim($_POST['logins']);
    $pass = trim($_POST['password']);

    $queryUser = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE user_login = '$login' and user_password = '$pass'"));
    
    if($queryUser['blocked']==1){
        echo "<script>alert('Вас заблокировали, Вы не можете пользоваться нашим сайтом!');
        location.href='index.php';</script>";
    }
    else{
        // setcookie('id', $queryUser['user_id'], time()+3600, '/');
        $_SESSION['id'] = $queryUser['user_id'];
        // print_r($queryUser);
        if(!empty($queryUser['user_id'])){
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
            if($admin_status == 1){
                header("Location: admin/index.php?page=users");
            }
            else{
                header("Location: account.php");
            }
        }
        else{ 
            echo "<script>alert(\"Данный пользователь не найден!\");
            location.href='index.php';
            </script>";
        }
    }

?>
