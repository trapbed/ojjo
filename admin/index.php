<?php
    include "header-admin.php";
    $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT category_id, category_name FROM category"));
?>       
        <div id="nothingBeforeHr"></div>
        <div id="blkForForm">

            <aside id='accountAside'>
                <a href="index.php?page=items">Товары</a>
                <!-- <a href="index.php">Настройки аккаунта</a> -->
                <a href="index.php?page=users">Пользователи</a>
            </aside>


<?php
// Items Jew
if(isset($_GET['page']) AND $_GET['page']=='items'){
    $queryJewAdm = mysqli_fetch_all(mysqli_query($conn, "SELECT jew_name, jew_img, jew_price, jew_descr, availability, jew_cat, jew_id FROM jewelery"));
        $queryCategories = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM category"));
        if ($queryJewAdm!=null) {
         $i = count($queryJewAdm);
         $ii=0;
         

         echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
         <div class='modal-dialog' id='firstMod'>
           <div class='modal-content' id='secondMod'>
             <div class='modal-header' id='thirdMod'>
               <h1 class='modal-title fs-5' id='exampleModalLabel'>Создание карточки украшения</h1>
             </div>
             <div class='modal-body'>
               
                


             <form id='createForm' action='checkCreateJew.php' method='post'>
        <label for='name' class='labelCreate'>Название</label>
        <input name='name' class='inputCreate' type='text'>

        <label for='category' class='labelCreate'>Категория</label>
        <select name='category' class='inputCreate' id=''>";
                foreach($categories as $cat){
                    echo "<option value='".$cat[0]."'";
                   
                    echo ">".$cat[1]."</option>";
                }
                
        echo "</select>

        <label for='description' class='labelCreate'>Описание</label>
        <textarea name='description' class='inputCreate'  ></textarea>

        <label for='image' class='labelCreate'>Изображение</label>
        <input name='image' id='image' class='inputCreate' type='file' accept='image/*'>

        <label for='price' class='labelCreate'>Цена</label>
        <input name='price' type='number' id='priceCreate' >

        <label for='brand' class='labelCreate'>Бренд</label>
        <input name='brand' class='inputCreate' type='text'>
<div class='modal-footer'>
               <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Отмена</button>
               <input type='submit' class='btn btn-primary' value='Сохранить изменения'>
             </div>
    </form>






             </div>
             
           </div>
         </div>
       </div>
       
       
       <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
         Создать карточку украшения
       </button>
       
       
       ";
        
        echo "<div id='scrollUsers'>";
            foreach ($queryJewAdm as $orders) {
                $ii++;
                if ($orders[4]==1) {$class_st='classDeleted';
                    $class_st2='classDeleted2';}
                else {$class_st='classAvailable';  
                    $class_st2='classAvailable2';}
                echo "<form id='rowOrder' class='rowOrderForADMIN' action='checkJewEdit.php' method='post' enctype='multipart/form-data'>";
                                                                    echo "<div id='numberOrder' class='$class_st2'>$ii</div>"; 
                                                                     echo "<input type='file' id='file' style='display:none;' name='jew_img'>
                                                                     <img src='../images/jew/$orders[1]' id='imgOrder' onclick='file.click()'>"; 
                                                                    echo "<input id='getOrder' value='$orders[0]' class='$class_st' name='jew_name'>";
                                                                    echo "<div></div>";
                                                                    echo "<input value='$orders[2]' class='$class_st' name='jew_price'> ₽";  
                                                                    echo "<input value='$orders[3]' class='$class_st' name='jew_descr'>";
                                                                    echo "<div></div>";
                                                                    echo "<select class='$class_st' name='jew_cat'>";
                                                                          foreach ($queryCategories as $category) {if ( $orders[5] == $category[0]) {$sel = 'selected';}
                                                                                                                   else {$sel = '';}
                                                                            echo "<option $sel>$category[1]</option>";}
                                                                    echo "</select>";
                                                                    echo "<input type='submit' value='OK' class='$class_st' id='buttonOK'>";
                                                                    if ($orders[4]==1) {echo "<a href='preEditJewStatus.php?edit=recover&id=$orders[6]' class='aDelRec'><img src='../images/recover.png' class='buttonRecover'></a>";}
                                                                    else {echo "<a href='preEditJewStatus.php?edit=delete&id=$orders[6]'><img src='../images/delete.png' class='buttonDelete'></a>";}
                                                                    echo "<input type='hidden' value='$orders[6]' name='jew_id'>";
                                                                    echo  "</form>";}} 
        else {echo "<p id='empty'>Пока пусто..</p>";}
}
// Users
else 
// (isset($_GET['page']) AND $_GET['page']=='users')
{
    $query_users = mysqli_fetch_all(mysqli_query($conn, "SELECT user_id, user_name, user_login, user_birth, blocked FROM users"));
    echo "<div id='scrollUsers'>
    <table id='user_admin'>
    <tr>
    <th class='user_id_admin'>ID</th> <th class='user_name_admin'>Имя</th> <th class='user_login_admin'>Логин</th> <th class='user_birth_admin'>День рождения</th> <th class='user_status_admin'>Статус</th>
    </tr>";
    foreach($query_users as $user){
        echo "<tr>
        <td class='user_id_admin'>".$user[0]."</td>
        <td class='user_name_admin'>".$user[1]."</td>
        <td class='user_login_admin'>".$user[2]."</td>
        <td class='user_birth_admin'>".$user[3]."</td>";
        if($user[4]==0){
            echo "<td class='blocked'> <a href='blockUser.php?idUser=".$user[0]."' class='user_status_admin greenUser'>Заблокировать</a> </td>";
        }
        else{
            echo "<td class='unblocked'> <a href='unblockUser.php?idUser=".$user[0]."' class='user_status_admin redUser'>Разблокировать</a> </td>";
        }
        echo "</tr>";
        // print_r($users);
    }
    echo "</table>";
}
echo "</div>";
// Account
// else{
//     $queryUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from users WHERE user_id = $idishka"));
//     // print_r($queryUser);

//     echo "<form id='account' action = 'editProfile.php' method = 'POST'>
//         <label for='nameAcc' id='nameAcc' class='labelBlack'>Ваше имя 
//             <input type='text' name='nameAcc' id='nameAcc' value='".($queryUser['user_name'])." 'required>
//         </label>";

//         echo "
//         <label for='birthAcc' id='birthAcc' class='labelBlack'>Ваша дата рождения
//             <input type='text' name='birthAcc' id='birthAcc' value='". $queryUser['user_birth'] ."'>
//         </label>

//         <label for='logAcc' id='logAcc' class='labelBlack'>Ваш логин
//             <input type='text'name='logAcc' id='logAcc' value='".($queryUser['user_login'])." 'required>
//         </label>

//         <label for='passAcc' id='passAcc' class='labelBlack'>Ваша пароль
//             <input type='text' name='passAcc' id='passAcc' value='". $queryUser['user_password'] ."' required>
//         </label>
        
//         <input type='submit' id='subEdit' value='сохранить'>
//     </form>";

//     setcookie('idsh', $idishka, time()+3600 , '/');

// }

?>