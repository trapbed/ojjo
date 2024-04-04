<?php
    include "connectbd.php";
    
    $idishka = $_COOKIE['id'];


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
                $queryNum = mysqli_fetch_all(mysqli_query($conn, "SELECT order_id, item_id, jew_name, jew_price, order_date, order_get FROM `item` JOIN jewelery ON jewelery.jew_id=item.item_jew JOIN orders ON orders.order_id=item.item_order where order_user=".$idishka.";"));
                echo "<div class = 'yourOrders'>";
                    if(count($queryNum)!=0){
                        $num = $queryNum[0];
                        foreach($numOrders as $num){
                            echo " <div class = 'oneOrders'>";
                            $query = mysqli_fetch_all(mysqli_query($conn, "SELECT order_id, item_id, jew_name, jew_price, order_date, order_get FROM `item` JOIN jewelery ON jewelery.jew_id=item.item_jew JOIN orders ON orders.order_id=item.item_order where order_user=".$idishka." AND order_id = ".$num[0]." ;"));
                            // print_r($query);
                            $amount = count($query)-1;
                            $count = 1;
                            $sumPrice = 0;

                            echo "<p class='numbers'> Заказ номер №$num[0] </p>";
                            foreach($query as $q){
                            echo "<div class='orderOne'>";
                            echo "<p class = 'namePos'>$q[2]</p>";
                            echo "<p class = 'pricePos'>Цена : $q[3]</p>";
                            echo "<p class = 'orderPos'> Дата заказа : $q[4]</p>";
                            echo "<p class = 'deliveryPos'> Дата доставки : $q[5]</p>";
                            $sumPrice+=$q[3];
                            if($count == $amount){
                                echo "</div>";
                                $count++;
                            }else{
                                echo "</div>";
                                echo "<p class = 'sumPrice'>Сумма заказа : $sumPrice</p>";
                            }}
                            


                            echo "</div>";
                        }
                    // echo "</div>";
                    }
                    else{
                        echo "<span id = ''> У вас пока нет заказов. Что бы сделать заказ перейдите к <a href='catalog.php'> каталогу</a>.</span>";
                    }
                    echo "</div>";
                }
                    


// Drafts
            else if(isset($_GET['page']) AND $_GET['page']=='draft'){
                echo "В корзине хранятся неоплаченные товары";
            }        
// Settings
            else{
                $queryUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from users WHERE user_id = $idishka"));
                // print_r($queryUser);

                echo "<form id='account' action = 'editProfile.php' method = 'POST'>
                    <label for='nameAcc' id='nameAcc' class='labelBlack'>Ваше имя 
                        <input type='text' name='nameAcc' id='nameAcc' value='".($queryUser['user_name'])." 'required>
                    </label>";

                    echo "
                    <label for='birthAcc' id='birthAcc' class='labelBlack'>Ваша дата рождения
                        <input type='text' name='birthAcc' id='birthAcc' value='". $queryUser['user_birth'] ."'>
                    </label>

                    <label for='logAcc' id='logAcc' class='labelBlack'>Ваш логин
                        <input type='text'name='logAcc' id='logAcc' value='".($queryUser['user_login'])." 'required>
                    </label>

                    <label for='passAcc' id='passAcc' class='labelBlack'>Ваша пароль
                        <input type='text' name='passAcc' id='passAcc' value='". $queryUser['user_password'] ."' required>
                    </label>
                    
                    <input type='submit' id='subEdit' value='сохранить'>
                </form>";

                // setcookie('id', $idishka, time()+3600 , '/');

            }
            ?>


        </div>
<?php
    include "footer.php";
?>         
</body>
</html>