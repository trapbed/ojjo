<?foreach ($products as $item):?>
<?php
for($i=1;){
    
}

?>
<div class="prod">
    <img src="images/jew/<?=$item[4]?>" alt="">
    <span><?=$item[7]?></span>
    <p><?=$item[1]?></p>
    <a href="position.php"><?=$item[5]?></a>
</div>

<?php
if($count==3){
    echo "<div class='void'></div>";
    echo "<hr>";
    echo "<div class='void'></div>";
    $count=0;
}
?>
<?endforeach;?>

<?php
foreach($products as $prod){
    
}
?>


else if($_GET['page']=='orders'){
                echo "<div id='userOrder'>
                        <h2 id='fixedOrder'>Ваши заказы</h2>
                        <div class='orderPosition'>
                            <span id='tovar'>Товар </span>
                            <span id='cena'>Цена</span>
                            <span>Дата</span>
                        </div>
                        <div id='myOrders'>";
                        $query = mysqli_fetch_all(mysqli_query($conn, 'SELECT jew_name, jew_price,order_sum, order_date, order_get FROM `item` JOIN jewelery ON jewelery.jew_id=item.item_jew JOIN orders ON orders.order_id=item.item_order where order_user=$idishka order by order_date;;'));
                        echo "<table id='tableOrders'>";
                        if(count($query)!=0){
                            foreach($query as $q){
                                    $date = date_format(date_create($q[4]), 'd.m.Y');
                                    echo "<tr>";
                                    echo "<td id='tovar'>$q[0]</td>";
                                    echo "<td id='cena'>$q[1]</td>";
                                    echo "<td>$date</td>";
                                    echo "</tr>";
                                }}else{echo "<span>У вас нет заказов</span>";}
                        echo "</table>";
                echo "</div>";                
            echo "</div>";
            }





            echo "<div id='userOrder'>
                        <table class='orderTable'>
                            <tr class='orderPosition'>
                                <td>Номер заказа</td>
                                <td id='tovar'>Товар </td>
                                <td id='cena'>Цена</td>
                                <td>Дата заказа</td>
                                <td>Дата получения</td>
                            </tr>
                        </table>";
                        $query = mysqli_fetch_all(mysqli_query($conn, "SELECT order_id, jew_name, jew_price, order_sum, order_date, order_get FROM `item` JOIN jewelery ON jewelery.jew_id=item.item_jew JOIN orders ON orders.order_id=item.item_order where order_user=".$idishka." order by order_date;"));
                        if(count($query)!=0){
                            echo "<table class='orderTable' id='tableOrders'>";
                            foreach($query as $q){
                                    $dateOrder = date_format(date_create($q[4]), 'd.m.Y');
                                    $dateGet = date_format(date_create($q[5]), 'd.m.Y');
                                    echo "<tr>";
                                    echo "<td>$q[0]</td>";
                                    echo "<td id='tovar'>$q[1]</td>";
                                    echo "<td id='cena'>$q[2]</td>";
                                    echo "<td>$dateOrder</td>";
                                    echo "<td>$dateGet</td>";
                                    echo "</tr>";}
                        }else{echo "<span>У вас нет заказов</span>";}
                        echo "</table>";
                echo "</div>";