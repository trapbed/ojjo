<?php
    include "connectbd.php";
    session_start();
    
    $idishka = isset($_SESSION['id']) ? $_SESSION['id'] : false;


    require "header.php";
?>

        <div id="nothingBeforeHr"></div>

        <div id="blkForForm">

            <aside id='accountAside'>
                <a href="account.php?page=orders">Заказы</a>
                <a href="account.php">Настройки</a>
                <a href="account.php?page=draft">Корзина</a>
            </aside>

            <?php

//Orders
            if(isset($_GET['page']) AND $_GET['page']=='orders'){
                $numOrders = mysqli_fetch_all(mysqli_query($conn, "SELECT DISTINCT order_id FROM orders"));
                $query;
                echo "<div class = 'yourOrders'>";
                $queryNum = mysqli_fetch_all(mysqli_query($conn, "SELECT order_id, order_get order_sum FROM `orders` where order_user=".$idishka));
                    if(count($queryNum)!=0){
                        $numO = $queryNum[0];
                        $query_order = mysqli_fetch_all(mysqli_query($conn, "SELECT order_id,order_date, order_get, order_sum FROM `orders` where order_user=".$idishka));
                        foreach($query_order as $qo){
                            $count = 1;
                            $sumPrice = 0;
                            $amount = count($query_order)-1;
                            echo "<p class='numbers'> Заказ номер №$qo[0] </p>";
                            echo "<div class='orderOne'>";

                            $query_item_order = mysqli_fetch_all(mysqli_query($conn, "SELECT `item_id`, `item_jew`, `item_order`, `amount`, jewelery.jew_name, jewelery.jew_price, jewelery.jew_img FROM `item` JOIN jewelery ON jewelery.jew_id=item.item_jew JOIN orders ON orders.order_id=item.item_order WHERE item_order=".$qo[0]));
                            foreach($query_item_order as $qio){
                                echo "<br>";
                                echo "<p class = 'namePos'>$qio[4]</p>";
                                echo "<p class = 'pricePos'>Цена : $qio[5]</p>";
                                echo "<p class = 'pricePos'>Количество : $qio[3]</p>";
                                echo "<p class = 'orderPos'> Дата заказа : $qo[1]</p>";
                                echo "<p class = 'deliveryPos'> Дата доставки : $qo[2]</p>";
                                $sumPrice+=$qio[5]*$qio[3];
                            }
                            if($count == $amount){
                                echo "</div>";
                                $count++;
                            }else{
                                echo "</div>";
                                echo "<p class = 'sumPrice'>Сумма заказа : $sumPrice</p>";
                            }
                        }
                            if($count == $amount){
                                echo "</div>";
                                $count++;
                            }else{
                                echo "</div>";
                            }

                            echo "</div>";
                    }
                    else{
                        echo "<span id = ''> У вас пока нет заказов. Что бы сделать заказ перейдите к <a href='catalog.php'> каталогу</a>.</span>";
                    }
                    echo "</div>";
                }
                    


// Drafts
        
            else if(isset($_GET['page']) AND $_GET['page']=='draft'){
                $_SESSION['lastPage'] = $_SERVER['REQUEST_URI'];
                echo "<div id='cart'>";
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0){
                    
                    $countProd = 0;
                    $cart = $_SESSION['cart'];

                    foreach($cart as $prod=>$key){
                    
                        $product = mysqli_fetch_array(mysqli_query($conn, "SELECT `jew_id`, `jew_name`, `jew_img`, `jew_price` FROM `jewelery` WHERE jew_id =".$prod));
                        $id = $product[0];
                        $name = $product[1];
                        $img = $product[2];
                        $price = $product[3];
                        $amount = $key;
                        $sum = $amount * $price;
                        $_SESSION['lastPage'] = $_SERVER['REQUEST_URI'];
                        $countProd++;
                        // echo $countProd;
                        echo "
                            <div class='oneProdCart'>
                                <img class='imgProdCat' src='../images/jew/$img' alt='$name'>
                                <div class='infoCart'>
                                    <h5 class='nameProdcat'>$name</h5>
                                    <div class='priceNAmountCart'>
                                        <span>$amount</span>
                                        <span>x</span>
                                        <span>$price &#8381;</span>
                                    </div>
                                    <div class='sumProdCart'><span>Итог $sum &nbsp;&nbsp; &#8381;</span></div>
                                </div>
                                <div class='cartBtns'>
                                    <form class='cartFormPlus' method='POST' action='cart.php?act=minus'>
                                        <input type='hidden' name='idProd' value='$id'>
                                        <input class='minusProdCart' type='submit' value='-'>
                                    </form>




                                    <div class='amountProdCart'>$amount</div>
                                    <form class='cartFormPlus' method='POST' action='cart.php'>
                                        <input type='hidden' name='idProd' value='$id'>
                                        <input class='plusProdCart' type='submit' value='+'>
                                    </form>
                                </div>
                            </div>
                        ";
                        // echo count($_SESSION['cart']);
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
                    echo "</div>";
                    echo "<div id='sumAllCart'><span>СУММА КОРЗИНЫ : &nbsp;&nbsp;&nbsp; $sumCart &nbsp; &#8381</span> <a href='buy.php' id='buyCartUser'>Купить</a></div>";
                }
                else{ 
                    echo "В корзине хранятся неоплаченные товары";echo "</div>";
                }
                
            }        
            // <a class='minusProdCart' href='account.php?page=draft&act=minus'>-</a>

// Settings
            else{
                $queryUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from users WHERE user_id = $idishka"));
                // print_r($queryUser);

                echo "<form id='account' action = 'editProfile.php' method = 'POST'>
                    <label for='nameAcc' id='nameAcc' class='labelBlack'>Ваше имя 
                        <input type='text' name='nameAcc' id='nameAcc' value='".($queryUser['user_name'])." 'required title=''>
                    </label>";

                    echo "
                    <label for='birthAcc' id='birthAcc' class='labelBlack'>Ваша дата рождения
                        <input type='text' name='birthAcc' id='birthAcc' value='". $queryUser['user_birth'] ."' title=''>
                    </label>

                    <label for='logAcc' id='logAcc' class='labelBlack'>Ваш логин
                        <input type='text'name='logAcc' id='logAcc' value='".($queryUser['user_login'])." 'required title=''>
                    </label>

                    <label for='passAcc' id='passAcc' class='labelBlack'>Ваша пароль
                        <input type='text' name='passAcc' id='passAcc' value='". $queryUser['user_password'] ."' required title=''>
                    </label>
                    
                    <input type='submit' id='subEdit' value='сохранить'>
                </form>";

            }
            ?>


        </div>
<?php
    include "footer.php";
?>         
</body>
</html>