<?php
session_start();
require "connectbd.php";
    $id = isset($_SESSION['idsh']) ? $_SESSION['idsh'] : false;

    $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id"));
    print_r($old);

    $name = $_POST['nameAcc'];
    $birth = $_POST['birthAcc'];
    $login = $_POST['logAcc'];
    $pass = $_POST['passAcc'];


    $oldName = $old['user_name'];
    $oldBirth = $old['user_birth'];
    $oldLogin = $old['user_login'];
    $oldPass = $old['user_password'];

    echo $name."<br>";
    echo $oldName."<br>";
    echo $login."<br>";
    echo $oldLogin."<br>";
    echo $birth."<br>";
    echo $oldBirth."<br>";
    echo $pass."<br>";
    echo $oldPass."<br>";
    
    if($oldName != $name || $oldLogin != $login || $oldBirth != $birth || $oldPass != $pass){
        $update = 'UPDATE users SET ';
        $count=0;
        if($oldName!=$name){
            if ($count!=0){
                $update .= ",";
            }
            $update .= " user_name = '$name'";
            $count ++;
        }
        if($oldBirth!=$birth){
            if ($count!=0){
                $update .= ",";
            }
            $update .= " user_birth = '$birth'";
            $count ++;
        }
        if($oldLogin!=$login){
            if ($count!=0){
                $update .= ",";
            }
            $update .= " user_login = '$login'";
            $count ++;
        }
        if($oldPass!=$pass){
            if ($count!=0){
                $update .= ",";
            }
            $update .= " user_password = '$pass'";
        }
            $update .= " WHERE user_id= $id";
            echo $update;
            $queryUpdate = mysqli_query($conn, $update);
            echo "<script>alert('Данные изменены');
                location.href = 'account.php';
            </script>";
    }
    else{
        echo "<script>alert('Актуальные данные');
            location.href = 'account.php';
        </script>";
    }
    
?>