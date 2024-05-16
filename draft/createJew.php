<?php
session_start();
    include "header-admin.php";
    $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT category_id, category_name FROM category"));
    // print_r($categories);

?>
<a href="index.php" id='backIndex'>< Вернуться назад</a>
<div id='sectionCreate'>
    <h2>Создание карточки украшения</h2>

    <form id='createForm' action="checkCreateJew.php" method='post'>
        <label for="name" class='labelCreate'>Название</label>
        <input name='name' class='inputCreate' type="text" value='<?=isset($_SESSION['name']) ? $_SESSION['name'] : ' ' ?>'>

        <label for="category" class='labelCreate'>Категория</label>
        <select name="category" class='inputCreate' id="">
            <?php
                $getteing = isset($_SESSION['cat']) ? $_SESSION['cat'] : ' ' ;
                foreach($categories as $cat){
                    echo "<option value='$cat[0]' ";
                    if($getteing != ' ' && $getteing == $cat[0]){
                        echo "selected";
                    }
                    echo ">$cat[1]</option>";
                }
            ?>
        </select>

        <label for="description" class='labelCreate'>Описание</label>
        <textarea name="description" class='inputCreate' id="" ><?=isset($_SESSION['desc']) ? $_SESSION['desc'] : ' ' ?></textarea>

        <label for="image" class='labelCreate'>Изображение</label>
        <input name='image' id='image' class='inputCreate' type="file" accept='image/*'>
        <!-- <img src="../images/setImg.png" alt="set image" id='setImg'> -->

        <label for="price" class='labelCreate'>Цена</label>
        <input name='price' type="number" id='priceCreate' value = '<?=isset($_SESSION['price']) ? $_SESSION['price'] : ' ' ?>' >

        <label for="brand" class='labelCreate'>Бренд</label>
        <input name='brand' class='inputCreate' type="text" value = '<?=isset($_SESSION['brand']) ? $_SESSION['brand'] : ' ' ?>'>

        <input type="submit" value="Создать карточку">
    </form>
            </div>


            
<!-- $file = isset($_FILES['image']['tmp_name'])?$postImg:false;


include "connect.php";

$postImg=$_FILES["imagePost"];
$postP=$_POST['titlePost'];
$postTxt=$_POST['contentPost'];
$postCat=$_POST['categoryId'];

$title = isset($postP)?$postP:false;
$text = isset($postTxt)?$postTxt:false;
$file = isset($_FILES['image']['tmp_name'])?$postImg:false;
$category = isset($postCat)?$postCat:false;

function check_error($error){
    return "<script>
    alert($error);
    location.href = 'createNew.php' 
    </script>";
}

if($title && $text && $file && $category){
    if (strlen($title)>20) echo check_error('Название не должно превышать 20 символов!!!');
    $result = mysqli_query($con, "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)");

    if($result){
        move_uploaded_file($file['name'], "images/myPinguin/".$file['name'].")");
        check_error('Новость успешно создана');
    }
    else check_error('Произошла ошибка'.mysqli_error($con));
}
else{
    echo check_error("Все поля должны быть заполнены!!!");
} -->




foreach ($queryCategories as $categoryCats) {
                $ii++;
                if ($categoryCats[4]==1) {$class_st='classDeleted';
                    $class_st2='classDeleted2';}
                else {$class_st='classAvailable';  
                    $class_st2='classAvailable2';}
                echo "<form id='rowOrder' class='rowOrderForADMIN' action='checkJewEdit.php' method='post' enctype='multipart/form-data'>";
                echo "<div id='numberOrder' class='$class_st2'>$ii</div>"; 
                echo "<input type='file' id='file' style='display:none;' name='jew_img'>
                      <img src='../images/jew/$orders[1]' id='imgOrder' onclick='file.click()'>"; 
                echo "<input id='getOrder' value='$orders[0]' class='$class_st' name='jew_name' required title='Название уккрашения'> ";
                echo "<div></div>";
                echo "<input value='$orders[2]' class='$class_st' name='jew_price' required  title='Цена'> ₽";  
                echo "<input value='$orders[3]' class='$class_st' name='jew_descr' required  title='Описание украшения'>";
                echo "<div></div>";
                echo "<select class='$class_st' name='jew_cat'  title='Категория украшние'>";
                foreach ($queryCategories as $category) {
                    if ( $orders[5] == $category[0]) {
                        $sel = 'selected';
                    }
                    else {
                        $sel = '';
                    }
                    echo "<option $sel>$category[1]</option>";
                }
                echo "</select>";
                echo "<input type='submit' value='OK' class='$class_st' id='buttonOK' required>";
                if ($orders[4]==1) {
                    echo "<a href='preEditJewStatus.php?edit=recover&id=$orders[6]' class='aDelRec'><img src='../images/recover.png' class='buttonRecover'></a>";
                }
                else {
                    echo "<a href='preEditJewStatus.php?edit=delete&id=$orders[6]'><img src='../images/delete.png' class='buttonDelete'></a>";
                }
                echo "<input type='hidden' value='$orders[6]' name='jew_id'>";
                echo  "</form>";}