<?php
    session_start();

    include "header-admin.php";
    $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT category_id, category_name FROM category"));
?>       
        <div id="nothingBeforeHr"></div>
        <div id="blkForForm">

            <aside id='accountAside'>
                <a href="index.php?page=items">Товары</a>
                <a href="index.php?page=users">Пользователи</a>
                <a href="index.php?page=categories">Категории</a>
            </aside>


<?php

  // $_SESSION['page'] = isset($_GET['page']) ? $_GET['page'] : false;

    $search = isset($_GET['search'])?$_GET['search']:false;
    // FILTER
    $filterCatProd = isset($_GET['filterCatProd'])?$_GET['filterCatProd']:false;
    // SORT
    $sortName = isset($_GET['sortName'])?$_GET['sortName']:false;
    $sortPrice = isset($_GET['sortPrice'])?$_GET['sortPrice']:false;


$queryJewAdm = "SELECT * FROM category";
if ($search) {$queryJewAdm.=" WHERE category_name LIKE '%$search%'";}
$queryJewAdm = mysqli_fetch_all(mysqli_query($conn, $queryJewAdm));



echo "<form action='index.php?page=categories' method='get' id='formSearch'>";
echo "<input name='search' type='text' id='inputSearch' title='что ищем ?' required>";
echo "<input type='hidden' name='page' value='".$_GET['page']."' >";
echo "<input type='submit' value='Искать' id='buttonSearch'>";
echo "</form>";

// ITEMS JEW
if(isset($_GET['page']) AND $_GET['page']=='items'){
  


  echo "
<div id='sortNFilterTovar'>
<form action='index.php?page=items' method='GET' class='widthAuto' id='filterSortAdminJew'>

    <input type='hidden' name='page' value='".$_GET['page']."'>

    <input type='hidden' name='search' value='".$search."'>

    <div class='labelFilSor'>
        <label for='filterCatProd' class=''>
            Фильтр :
        </label>
        <select name='filterCatProd' id='filterCatProd'>
          <option value=''>Без категорий</option>";
            foreach ($categories as $cat){
            echo "<option value='".$cat[0]."'";
            if(isset($_GET['filterCatProd']) && $_GET['filterCatProd'] == $cat[0]){
              echo "selected";
            }
            else{
              echo " ";
            }
            echo ">".$cat[1]."</option>";
            }
        echo "</select>
    </div>

    <div class='labelFilSor'>
        <label for='sortName' class=''>
            Сортировать по названию :
        </label>
        <select name='sortName' id='sortName'>
            <option value=''>без сортировки</option>
            <option value='jewelery.jew_name ASC' ";
            if(isset($_GET['sortName']) && $_GET['sortName'] == 'jewelery.jew_name ASC'){
              echo "selected";
            }
            echo ">А-Я</option>
            <option value='jewelery.jew_name DESC' ";
            if(isset($_GET['sortName']) && $_GET['sortName'] == 'jewelery.jew_name DESC'){
              echo "selected";
            }
            echo ">Я-А</option>
        </select>
    </div>
    <div class='labelFilSor'>
        <label for='sortPrice' class=''>
            Сортировать по цене :
        </label>
        <select name='sortPrice' id='sortPrice'>
            <option value=''>Без сортировки </option>
            <option value='jewelery.jew_price ASC'";
            if(isset($_GET['sortPrice']) && $_GET['sortPrice'] == 'jewelery.jew_price ASC'){
              echo "selected";
            }
            echo ">по возрастанию</option>
            <option value='jewelery.jew_price DESC' ";
            if(isset($_GET['sortPrice']) && $_GET['sortPrice'] == 'jewelery.jew_price DESC'){
              echo "selected";
            }
            echo ">по убыванию</option>
        </select>
    </div>
    <input type='submit' value='Искать' id='submitFSAJew'>
</form>
</div>";
// SELECT * FROM `jewelery` WHERE jew_name LIKE '%бр%' AND jew_cat = 5 ORDER BY jewelery.jew_name DESC, jewelery.jew_price ASC;
    $queryJewAdm = "SELECT jew_name, jew_img, jew_price, jew_descr, availability, jew_cat, jew_id FROM jewelery JOIN category ON category.category_id=jewelery.jew_cat";

    $checkAnd = false;
    $checkComm = false;

    // ПОИСК
    if(isset($search) && $search != false){
      $queryJewAdm.= " WHERE jew_name LIKE '%$search%'";
      $checkAnd = true;
    }
    // ФИЛЬТР ПО КАТЕГОРИЯМ
    if($filterCatProd){
      if($checkAnd == true){
        $queryJewAdm .= " AND ";
      }
      else{
        $queryJewAdm .= " WHERE ";
      }
      $queryJewAdm .= " jew_cat = ".$filterCatProd;
      $checkAnd = true;
    }
    // СОРТИРОВКА ПО НАЗВАНИЮ ИЛИ ЦЕНЕ
    if($sortName OR $sortPrice){
      $queryJewAdm .= " ORDER BY ";
    }
    // СОРТИРОВКА ПО НАЗВАНИЮ
    if($sortName){
      if($checkComm == true){
        $queryJewAdm .= ", ";
      }
      $queryJewAdm .= $sortName;
      $checkComm = true;
    }
    // СОРТИРОВКА ПО ЦЕНЕ
    if($sortPrice){
      if($checkComm == true){
        $queryJewAdm .= ", ";
      }
      $queryJewAdm .= $sortPrice;
      $checkComm = true;
    }

    // echo $queryJewAdm;

    $queryJewAdm = mysqli_fetch_all(mysqli_query($conn, $queryJewAdm));

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
        <input name='name' class='inputCreate' type='text' required title='название украшения'>

        <label for='category' class='labelCreate'>Категория</label>
        <select name='category' class='inputCreate' id='' title='категория украшения'>";
                foreach($categories as $cat){
                    echo "<option value='".$cat[0]."'";
                   
                    echo ">".$cat[1]."</option>";
                }
                
        echo "</select>

        <label for='description' class='labelCreate'>Описание</label>
        <textarea name='description' class='inputCreate' required title='описание украшения'></textarea>

        <label for='image' class='labelCreate'>Изображение</label>
        <input name='image' id='image' class='inputCreate' type='file' accept='image/*' required title='изоюражение украшения'>

        <label for='price' class='labelCreate'>Цена</label>
        <input name='price' type='number' id='priceCreate' required title='цена украшения'>

        <label for='brand' class='labelCreate'>Бренд</label>
        <input name='brand' class='inputCreate' type='text' required title='бренд украшения'>
    <div class='modal-footer'>
               <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Отмена</button>
               <input type='submit' class='btn btn-primary' value='Сохранить изменения' required>
             </div>
    </form>
             </div>
           </div>
         </div>
       </div>
       <br>
       <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
         Создать карточку украшения
       </button>";

       echo "<br>";
       
        echo "<div id='titlesItems'>
            <div id='titleId'>ID</div>
            <div id='titleImg'>Фото</div>
            <div id='titleName'>Название</div>
            <div id='titlePrice'>Цена</div>
            <div id='titleDesc'>Описание</div>
            <div id='titleCat'>Категория</div>
            <div id='titleAction'>Действия</div>
        </div>";
        echo "<div id='scrollUsers' style='height:18vmax'>";

        
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
                                                                    echo "<input id='getOrder' value='$orders[0]' class='$class_st' name='jew_name' required title='Название уккрашения'> ";
                                                                    echo "<div></div>";
                                                                    echo "<input value='$orders[2]' class='$class_st' name='jew_price' required  title='Цена'> ₽";  
                                                                    echo "<input value='$orders[3]' class='$class_st' name='jew_descr' required  title='Описание украшения'>";
                                                                    echo "<div></div>";
                                                                    echo "<select class='$class_st' name='jew_cat'  title='Категория украшние'>";
                                                                          foreach ($queryCategories as $category) {if ( $orders[5] == $category[0]) {$sel = 'selected';}
                                                                                                                   else {$sel = '';}
                                                                            echo "<option $sel>$category[1]</option>";}
                                                                    echo "</select>";
                                                                    echo "<input type='submit' value='OK' class='$class_st' id='buttonOK' required>";
                                                                    if ($orders[4]==1) {echo "<a href='preEditJewStatus.php?edit=recover&id=$orders[6]' class='aDelRec'><img src='../images/recover.png' class='buttonRecover'></a>";}
                                                                    else {echo "<a href='preEditJewStatus.php?edit=delete&id=$orders[6]'><img src='../images/delete.png' class='buttonDelete'></a>";}
                                                                    echo "<input type='hidden' value='$orders[6]' name='jew_id'>";
                                                                    echo  "</form>";}} 
        else {echo "<p id='empty'>Пока пусто..</p>";}
}
// CATEGORY

if(isset($_GET['page']) AND $_GET['page']=='categories'){
echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' >
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Добавление товара</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Закрыть'></button>
      </div>
      <div class='modal-body'>
      <form method='post' enctype='multipart/form-data' action='checkCreateCat.php' id='createJewForm'>
            <label for='cat_name'>Название категории</label>
            <input required id='cat_name' name='cat_name' >
            <input type='submit' value='Отправить' id='submitCreateJew' style='display:none;'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
        <button type='button' class='btn btn-primary' onclick='submitCreateJew.click();'>Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>
<div id='orderContent' class='orderContentForADMIN'>";
    // $order_no = isset($_GET['order'])?$_GET['order']:false;
    // if ($order_no) {echo "<div id='rowOrder'><div class='headline'>Заказ № $order_no</div></div>";}
        if ($queryJewAdm!=null) {
         $i = count($queryJewAdm)+2;
         echo "<script> let numRows = document.getElementById('orderContent');
                               numRows.style.gridTemplateRows='repeat($i,4vmax) 1fr'; </script>";
                               echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            //здесь убрать data-bs, если нужно будет вернуться + добавить тег a href='createJew.php'
            echo "<div id='buttonCreateJew' data-bs-toggle='modal' data-bs-target='#exampleModal'>Добавить новую категорию</div>";
            echo "</div>";
                echo "<div id='rowOrder' class='rowOrderFORCATEGORY'>";
                                echo "<div id='numberOrder'><b>№</b></div>";
                                echo "<div id='sumOrder'><b>Название категории</b></div>";  
                                echo  "</div>";
                echo "<div style ='height:16vmax' id='scrollUsers'>";
            foreach ($queryJewAdm as $cats) { if ($cats[2]=='deleted') {$class_st='classDeleted';
                $class_st2='classDeleted2';}
            else {$class_st='classAvailable';  
                $class_st2='classAvailable2';}
                  echo "<form id='rowOrder' class='rowOrderFORCATEGORY' method='post' action='checkCatEdit.php'>";
                  echo "<div class='$class_st2'>$cats[0]</div>";
                  echo "<input type='hidden' value='$cats[0]' name='cat_id'>";
                  echo "<input class='$class_st' name='cat_name' title='название' value='$cats[1]' required>";
                  echo "<input type='submit' value='OK' class='$class_st' id='buttonOK'>";
                  if ($cats[2]=='deleted') {echo "<a href='preEditCatStatus.php?edit_cat=recover&id_cat=$cats[0]' class='aDelRec'><img src='../images/recover.png' class='buttonRecover'></a>";}
                  else {echo "<a href='preEditCatStatus.php?edit_cat=delete&id_cat=$cats[0]'><img src='../images/delete.png' class='buttonDelete'></a>";}
                  echo  "</form>";} }
        else {echo "<p id='empty'>Пока пусто..</p>";}

        echo "</div>";

    // $order_no = isset($_GET['order'])?$_GET['order']:false;
    // if ($order_no) {echo "<div id='rowOrder'><div class='headline'>Заказ № $order_no</div></div>";}
}



    
// USERS
if(isset($_GET['page']) && $_GET['page'] == 'users'){

  $search = isset($_GET['search'])?$_GET['search']:false;
  $query_users = false;

    $query_users = "SELECT user_id, user_name, user_login, user_birth, blocked FROM users";
    if(isset($search) && $search != false){
      $query_users .= " WHERE user_login LIKE '%$search%' OR user_name LIKE '%$search%'";
    }
    $query_users = mysqli_fetch_all(mysqli_query($conn, $query_users));
    // $s12 = $s1.$s2;
    // echo $s12;
    if($query_users != false){
    echo "
    <br>
    <div id='scrollUsers'>
    <table id='user_admin'>
    <tr>
    <th class='user_id_admin'>ID</th> <th class='user_name_admin'>Имя</th> <th class='user_login_admin'>Логин</th> <th class='user_birth_admin'>День рождения</th> <th class='user_status_admin'>Статус</th>
    </tr>";
    foreach($query_users as $user){
        echo "<tr>
        <td class='user_id_admin'>".$user[0]."</a></td>
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
  else{
    echo "<p id='empty'>Пользователей нет..</p>";
  }
}
echo "</div>";
?>

<!-- <script>
        $('#filterSortAdminJew').change(function(){
            $('#filterAdminJew').submit();
        })
        $('#filterSortAdminJew').change(function(){
            $('#sortAdminJew').submit();
        })
        $('#filterSortAdminJew').change(function(){
            $('#sortAdminJew').submit();
        })
</script> -->