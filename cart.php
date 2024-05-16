<?php
// ПРОВЕРИТЬ ПОЛЬЗОВАТЕЛЯ
    session_start();

    if(isset($_SESSION['id'])){
        require "connectbd.php";
        $check = false;
        $product = isset($_POST['idProd']) ? $_POST['idProd'] : false ;
        $count = isset($_SESSION['cart'][$product]) ? $_SESSION['cart'][$product] : 0 ;
    
        if(!isset($_SESSION['cart'][$product])){
            $_SESSION['cart'][$product] = array();
            $count = 0;
            $_SESSION['cart'][$product] = $count;
        }
    
    
        if(isset($_GET['act']) == 'minus'){
            $count --;
            $_SESSION['cart'][$product] = $count;
            $check = true;
            if($count == 0){
                unset($_SESSION['cart'][$product]);
            }
        }
        else{
           if($product){
                $count ++;
                $_SESSION['cart'][$product] = $count;
                $check = true;        
            } 
        }
        
    
        if($check == true){
            if ($_SESSION['lastPage'] == '/account.php?page=draft'){
                echo "<script>
                location.href ='account.php?page=draft';
                </script>";
                unset($_SESSION['lastPage']);
            }
            else{
                echo "<script>
                location.href ='product.php?product=$product';
                alert('Товар успешно добавлен в корзину!');
                </script>";
            }
        }
    }
    else{
        print_r($_SESSION);
        $link = substr($_SESSION['lastPage'], 1,);
        echo $link;
        echo "
        <script>
            alert('Что бы добавить товар в корзину необходимо зарегистрироваться или автороизоваться!');
            location.href='../$link';
        </script>
        ";
        unset($_SESSION['lastPage']);
    }
?>