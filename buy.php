<?php 
    session_start();
    require "connectbd.php";
    print_r($_SESSION['cart']);
    $id = $_SESSION['id'];
    $date = date('Y-m-d');
    $email = mysqli_fetch_array(mysqli_query($conn, "SELECT user_login FROM users WHERE user_id = $id"));
    $email = $email[0];


   if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0){
                    $countProd = 0;
                    $cart = $_SESSION['cart'];
                    foreach($cart as $prod=>$key){
                        $product = mysqli_fetch_array(mysqli_query($conn, "SELECT `jew_id`, `jew_name`, `jew_img`, `jew_price` FROM `jewelery` WHERE jew_id =".$prod));
                        $price = $product[3];
                        $amount = $key;
                        $sum = $amount * $price;
                        $countProd++;
                        if($countProd == count($_SESSION['cart'])){
                            $sumCart = 0;
                            $sumRowCart ;
                            foreach($_SESSION['cart'] as $prod => $amount){
                                $price = mysqli_fetch_array(mysqli_query($conn, "SELECT `jew_price` FROM `jewelery` WHERE jew_id =".$prod));
                                $sumRowCart = $price[0]*$amount;
                                $sumCart += $sumRowCart;
                            }
                        }
                    }
                }
    if(isset($_SESSION['cart'])){
        $order = mysqli_query($conn, "INSERT INTO `orders` (`order_user`, `order_date`,`order_sum`) VALUES ($id, '$date', '$sumCart');");
        if($order){
            $id_order = mysqli_insert_id($conn);
            foreach($_SESSION['cart'] as $prod=>$amount_p){
                $item = mysqli_query($conn, "INSERT INTO `item` (`item_jew`, `item_order`, `amount`) VALUES ( '$prod', '$id_order', '$amount_p');");
            }
            $mess_post = "Вы совершили покупку в магазине ojjo. Ваш заказ №$id_order.\nСумма заказа $sumCart";
            if(mail("$email","Спасибо за покупку!","$mess_post")){
                $_SESSION['mess'] = "Спасибо за покупку. Письмо отправлено на адрес $email";
                unset($_SESSION['cart']);
            }
            else{
                $_SESSION['mess'] = "Не удалось совершить покупку!";
            }
        }
    }
    else{
        $_SESSION['mess'] = "У вас нет товаров в корзине!";
    }
    echo "<script>location.href='../account.php?page=draft';</script>";
?>
