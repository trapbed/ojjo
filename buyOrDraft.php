<?php
    include "connectbd.php";
    $prodId = $_POST['idProd'];

    $queryProd = mysqli_fetch_all(mysqli_query($conn, "SELECT jew_name, category_name, jew_descr, jew_img, jew_price, jew_brand FROM jewelery inner join category on jew_cat=category_id WHERE jew_id=$prodId"));

    foreach($queryProd as $prod){
        print_r($prod);
        $name = $prod[0];
        $cat = $prod[1];
        $desc = $prod[2];
        $img = $prod[3];
        $price = $prod[4];
        $brand = $prod[5];
    }

    if(isset($_POST['buy'])){
    //    echo 'вы нажали купить';
        setcookie('name',$name ,time()+3600*5 ,'/' );
        setcookie('cat',$cat ,time()+3600*5 ,'/' );
        setcookie('desc',$desc ,time()+3600*5 ,'/' );
        setcookie('img',$img ,time()+3600*5 ,'/' );
        setcookie('price',$price ,time()+3600*5 ,'/' );
        setcookie('brand',$brand ,time()+3600*5 ,'/' );
        echo "
        <script>
            location.href='buy.php';
        </script>";
    }
    if(isset($_POST['draft'])){
        // echo 'вы нажали в корзину';
        setcookie('name',$name ,time()+3600*5 ,'/' );
        setcookie('cat',$cat ,time()+3600*5 ,'/' );
        setcookie('desc',$desc ,time()+3600*5 ,'/' );
        setcookie('img',$img ,time()+3600*5 ,'/' );
        setcookie('price',$price ,time()+3600*5 ,'/' );
        setcookie('brand',$brand ,time()+3600*5 ,'/' );
        setcookie('product', $prodId, time()+3600, '/');
        echo "
        <script>
            location.href='draft.php';
        </script>";
    }
?>