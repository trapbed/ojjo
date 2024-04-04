<?php
    require "../connectbd.php";

    $name = isset($_POST['name']) ? $_POST['name'] : false;
    $category = isset($_POST['category']) ? $_POST['category'] : false;
    $desc = isset($_POST['description']) ? $_POST['description'] : false;
    $img = isset($_POST['image']) ? $_POST['image'] : false;
    $price = isset($_POST['price']) ? $_POST['price'] : false;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : false;

    $query = "";
    $check = false;
    $error = '';

   


    if($name!=false && $category!=false && $desc!=false && $img!=false && $price!=false && $brand!=false){
        $query = mysqli_query($conn, "INSERT INTO `jewelery`( `jew_name`, `jew_cat`, `jew_descr`, `jew_img`, `jew_price`, `jew_brand`, `availability`) VALUES ('$name', '$category', '$desc', '$img', '$price' ,'$brand' , '0' )");
        $error = "Карточка товара создана!";
        unset($_SESSION['name']);
        unset($_SESSION['cat']);
        unset($_SESSION['desc']);
        unset($_SESSION['img']);
        unset($_SESSION['price']);
        unset($_SESSION['brand']);
        move_uploaded_file($img, "images/jew/".$img.")");
        echo 1;
        echo "<script> 
            alert('$error');
            location.href='index.php?page=items';
        </script>";
    }
    else{
        // session_start();
        // $_SESSION['name'] = $name ;
        // $_SESSION['cat'] = $category ;
        // $_SESSION['desc'] = $desc ;
        // $_SESSION['img'] = $img ;
        // $_SESSION['price'] = $price ;
        // $_SESSION['brand'] = $brand ;

        $error = " Данные о товаре не заполнены ! ";
        echo 6;
        echo "<script> 
            alert('$error');
            location.href='index.php?page=items';
        </script>";
    }

//     // NAME
//     if($name == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "' '";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$name'";
//         $check = true;
//     }

//     // category
//     if($category == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "''";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$category'";
//         $check = true;
//     }

//     // DESC
//     if($desc == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "' '";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$desc'";
//         $check = true;
//     }

//     //  IMG
//     if($img == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "''";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$img'";
//         move_uploaded_file($file['name'], "images/myPinguin/".$file['name'].")");
//         $check = true;
//     }

//      // PRICE
//      if($price == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "' '";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$price'";
//         $check = true;
//     }

//     //  BRAND
//     if($brand == ' '){
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "''";
//     }
//     else{
//         if($check == true){
//             $query .= ", ";
//         }
//         $query .= "'$brand'";
//         $check = true;
//     }

//     $query.=", '0'";

    
//     $query .= ")";

//     echo $query;



 
 
//     echo $name;
//     echo "<br>";
//     echo $category;
//     echo "<br>";
//     echo $desc;
//     echo "<br>";
//     echo($img);
//     echo "<br>";
//     echo $price;
//     echo "<br>";
//     echo $brand;

//     // $imgF = $_FILES['image']['tmp_name'];

//     // '[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
// ?>