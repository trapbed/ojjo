<div id='sectionCreate'>
<h2>Создание карточки украшения</h2>

    <form id='createForm' action='checkCreateJew.php' method='post'>
        <label for='name' class='labelCreate'>Название</label>
        <input name='name' class='inputCreate' type='text' value='<?=isset($_SESSION['name']) ? $_SESSION['name'] : ' ' ?>'>

        <label for='category' class='labelCreate'>Категория</label>
        <select name='category' class='inputCreate' id=''>
            <?php
            $getteing = isset($_SESSION['cat']) ? $_SESSION['cat'] : ' ' ;
            foreach($categories as $cat){
                echo '<option value='$cat[0]' ';
                if($getteing != ' ' && $getteing == $cat[0]){
                    echo 'selected';
                }
                echo '>$cat[1]</option>';
            }
        ?>
        </select>

        <label for='description' class='labelCreate'>Описание</label>
        <textarea name='description' class='inputCreate' id='' ><?=isset($_SESSION['desc']) ? $_SESSION['desc'] : ' ' ?></textarea>

        <label for='image' class='labelCreate'>Изображение</label>
        <input name='image' id='image' class='inputCreate' type='file' accept='image/*'>
        <!-- <img src='../images/setImg.png' alt='set image' id='setImg'> -->

        <label for='price' class='labelCreate'>Цена</label>
        <input name='price' type='number' id='priceCreate' value = '<?=isset($_SESSION['price']) ? $_SESSION['price'] : ' ' ?>' >

        <label for='brand' class='labelCreate'>Бренд</label>
        <input name='brand' class='inputCreate' type='text' value = '<?=isset($_SESSION['brand']) ? $_SESSION['brand'] : ' ' ?>'>

        <input type='submit' value='Создать карточку'>
    </form>
</div>