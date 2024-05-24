<?php

require_once "connectbd.php";
session_start();

$email = isset($_POST['email']) ? $_POST['email'] : false ;

$array = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 0, 1, 2,3, 4, 5, 6, 7, 8, 9 ];

$random = array_rand($array, 8);
$new_pass = '';

foreach($random as $r){
     $new_pass.=$array[$r];
}
echo $new_pass;

if($email){
     $check = mysqli_query($conn, "SELECT * FROM users WHERE user_login='$email'");
     if(mysqli_num_rows($check)){
          if(mail("$email","Обновленый пароль","$new_pass")){
               $_SESSION['mess'] = "Письмо отправлено на вашу почту $email";
               $query = mysqli_query($conn, "UPDATE `users` SET `user_password` = '$new_pass' WHERE `users`.`user_login` = '$email';");
          }
          else{
               $_SESSION['mess'] = "Не удалось отправить письмо";
          }
     }
     else{
          $_SESSION['mess'] = "Такого пользователя не существует!";
     }
     header("Location: ../index.php");

}
else{
     $_SESSION['mess'] = "Заполните все поля";
}

?>
<!-- При покупке на почту отправить чек со списком купленных товаров  -->