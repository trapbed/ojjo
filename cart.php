<?php
    session_start();
    
    require "connectbd.php";
    $check = false;
    $product = isset($_POST['idProd']) ? $_POST['idProd'] : false ;
    $count = isset($_SESSION['cart'][$product]) ? $_SESSION['cart'][$product] : 0 ;

    if(!isset($_SESSION['cart'][$product])){
        $_SESSION['cart'][$product] = array();
        $count = 0;
        $_SESSION['cart'][$product] = $count;
    }


    if($_GET['act'] == 'minus'){
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
        }
        echo "<script>
                alert('Товар успешно добавлен в корзину!');
                location.href ='product.php?product=$product';
            </script>";


        
        // else{echo "<script>
        //         alert('Товар успешно добавлен в корзину!');
        //         location.href ='product.php?product=$product';
        //     </script>";
            
        // }
    }
    
    // print_r($_SESSION['cart']);
    // echo $_SESSION['rowCart'];





    // $id_prod = $_POST['idProd'];
    // // echo $id_prod;
    // if(!isset($_SESSION['cart'])){
    //     $_SESSION['cart'] = array();
    //     // $_SESSION['cart'] = array("id"=>'' , "amount"=>);
    // }

    // if(isset($_POST['idProd'])){
    //     array_push($_SESSION['cart']['id'], $id_prod);
    //     array_push($_SESSION['cart']['amount']);
    // }
    // $_SESSION['cart'] = ;



    // $_SESSION['rowCart']

    
?>