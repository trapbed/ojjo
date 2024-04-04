<?php
    $query = '?';
    $check_query = false;
    // CATHEGORYS
    if(isset($_GET['category'])){
        if($_GET['category']==' '){
            $query.='';
        }
        else{
            $query.="cats_name=".$_GET['category'];
            $check_query = true;
        }
    }
    // PRICES
    if(isset($_GET['price'])&&$_GET['price']!=' '){
        if($check_query = true){
            $query.="&&";
        }
        $query.="order_price=".$_GET['price'];
        $check_query = true;
    }
    // BRANDS
    if(isset($_GET['brand']) && $_GET['brand']!=' '){
        if($check_query = true){
            $query.="&&";
        }
        $query.="brands=".$_GET['brand'];
    }
    echo "
    <script>
    location.href='catalog.php$query';
    </script>
    ";

    // if(isset($_GET['brand']) && $_GET['brand'] != ' '){
    //     $check_query = true; 
    //     $query.=" AND jew_brand = '".$_GET['brand']."'";
    // }


    // alert(".$_GET['price'].");


    // if(isset($_GET['price']) && $_GET['price'] != " " ){
    //     $check_query = true;
    //     if($check_query == true){
    //         $query.=" ";
    //     }
    //     $query.="ORDER BY ".$_GET['price']."" ;
    // }
?>

