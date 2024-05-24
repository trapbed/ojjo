<?php
session_start();
require "connectbd.php";

    $check_brand = 0;

    $cats_name=isset($_GET['cats_name']) ? $_GET['cats_name'] : false;
    if($cats_name != ' '){
        if($cats_name==1){
            $cat_name= 'Кольца';
        }
        if($cats_name==2){
            $cat_name= 'Серьги';
        }
        if($cats_name==3){
            $cat_name= 'Запонки';
        }
        if($cats_name==4){
            $cat_name= 'Часы';
        }
        if($cats_name==5){
            $cat_name= 'Браслеты';
        }
        if($cats_name==6){
            $cat_name= 'Подвески';
        }
        if($cats_name == 7){
            $cat_name = 'nothing';
        }
    }

    require "header.php";
?>

        <div id="nothingBeforeHr"></div>

        <form id="sortCatalog" action='checkCat.php' method='GET'>
            <!-- BRANDS -->
            <select name="brand" id="brand">
                <?php
                    $brands = mysqli_fetch_all(mysqli_query($conn, "SELECT jew_brand FROM jewelery"));
                    echo "<option value=' ' id='sortBrand'>Без бренда</option>";
                    foreach($brands as $brand){
                        
                        echo "<option value='$brand[0]' id='sortBrand'";
                        if(isset($_GET['brands'])&& $_GET['brands']==$brand[0]){
                            echo " selected ";
                        }
                        echo ">".$brand[0]."</option>";
                    }
                ?>
            </select>
            <!-- PRICE -->
            <select name="price" id="price">
                <option value=" " id="sortPrice" <?= isset($_GET['price']) AND $_GET['price'] ==  "" ? "selected" : " " ?>>Цена (по умолч.)</option>
                <option value="jew_price ASC" id="sortPrice" <?= isset($_GET['price']) AND $_GET['price'] ==  "jew_price ASC" ? "selected" : " " ?> >Цена (по воз.)</option>
                <option value="jew_price DESC" id="sortPrice" <?= isset($_GET['price']) AND $_GET['price'] ==  "jew_price DESC" ? "selected" : " " ?>>Цена (по убыван.)</option>
            </select>            
            
            <!-- CATEGORY -->
            <select name="category" id="category">
                <?php
                $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT category_name, category_id FROM category "));
                echo "<option value='' id='sortCollection'>Без категории</option>";
                foreach($categories as $cat){
                    echo "<option value='$cat[1]' id='sortCollection'";

                    if((isset($cat_name)&&$cats_name== $cat[1]) ){
                        echo "selected";
                    }
                    if(isset($_GET['category']) && $_GET['category']==$cat[1]){
                        echo "selected";
                    }

                    echo ">$cat[0]</option>";
                }
                ?>
            </select>
            <select name="who" id="who">
                <option value="who" id="sortWho">Для кого</option>
            </select>
            <select name="session" id="season">
                <option value="season" id="sortSeason">Сезон</option>
            </select>
            <select name="name" id="event">
                <option value="event" id="sortEvent">Событие</option>
            </select>
        </form>

        
        <?php


        $products = false;

        $query = "SELECT * FROM jewelery inner join category on jew_cat=category_id WHERE availability = 0 ";
        $check_query = false;

        if($cats_name != false){
            $query.=" AND jew_cat =".$cats_name;
            $check_query = true;
        }
        if(isset($_GET['category'])){
            $query.=" AND jew_cat =".$_GET['category'];
            $check_query = true;
        }
        if(isset($_GET['brands'])){
            if($check_query = true){
                $query.=" AND ";
            }
            $query.=" jew_brand = '".$_GET['brands']."'";
        }

        if(isset($_GET['order_price'])){
            $check_query = true;
            $query.=" ORDER BY ".$_GET['order_price'];
        }

            $products = mysqli_fetch_all(mysqli_query($conn, $query));

        ?>
        <div id="catalogue">
            
            <?php 
                    $counter = 0;
                    $maketId = 0;

                    if($products == false){

                        // создать errors
                        echo "Нет товаров категории : ";
                        
                            echo isset($cat_name)?$cat_name:$_GET['cats_name'];
                        
                        echo "!";
                    }
                    else{
                        foreach($products as $product){
                            if($counter==0){                        
                                echo "<div class='void'></div>
                                <div class='cat1'>";
                            }
                            $counter++;                    
                                    echo "<div class = 'prod'>
                                            <img class='prodImages' src='images/jew/$product[4]' alt='$product[2]'>
                                            <p>$product[1]</p>
                                            <form action='product.php?product=$product[0]' method='POST' class='getProd'>
                                                <input type='submit' class='price' id='priceProd' value='$product[5] &#8381' title=''>
                                            </form>
                                        </div>";
                            if($counter==3){
                                echo "</div>";
                                $counter=0;
                            }
                            $maketId++;
                        }
            echo"</div><div id='centerCatMore'>
                            <div class='void'></div>
                            <button id='catMore'>покажите еще</button>
                        </div>";}
            ?>
                    
        <div id="befCatEmty"></div>

        <div id="opis">
            <div id="opis1">
                <span id="opisLorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, lorem eu commodo porttitor erat. Amet mauris cursus bibendum in egestas. Nulla porttitor amet quam elit, mauris. Tortor egestas dignissim augue suspendisse rutrum pretium lobortis dolor. Commodo sagittis at amet faucibus faucibus id. Bibendum placerat convallis gravida eu quisque et augue. Sed dignissim amet ut vitae at ornare sed.
                    Commodo sagittis at amet faucibus faucibus id. Bibendum placerat convallis gravida eu quisque et augue. Sed dignissim amet ut vitae at ornare sed.
                </span>
                <div id="gradientOpis"></div>
                <span id="opisMorePos" class="btnMore">Читать полностью</span>
            </div>
            <div id="imgsOpis">
                <div class="whyWe">
                    <img src="images/delivery.png" alt="delivery">
                    <span>Бесплатная доставка</span>
                </div>

                <div class="whyWe">
                    <img src="images/free.png" alt="free">
                    <span>Бесплатная примерка</span>
                </div>

                <div class="whyWe">
                    <img src="images/design.png" alt="design">
                    <span>Индивидуальный дизайн</span>
                </div>

                <div class="whyWe">
                    <img src="images/jewelry.png" alt="jewelry">
                    <span>Личный подход</span>
                </div>
            </div>
        </div>


        <div id="mtBeforeOpis"></div>

        <div id="subscribe">
            <div id="subEmty"></div>
            <div id="intoSubscribe">
                <div id="intoSub1">
                    
                </div>
                <div id="intoSub2">
                    <div id="intoSubTop">
                        <span id="intoSub11">Полезные советы и персональные предложения</span>
                        <span id="intoSub12">Эксклюзивная рассылка</span>
                    </div>
                    <div id="intoSubBottom">
                        <div id="intoSubBottomLeft">
                            <ul>
                                <li>Личный менеджер</li>
                                <li>Доставка и оформление</li>
                                <li>Индивидуальный дизайн</li>
                            </ul>
                        </div>
                        <div id="intoSubBottomRight">
                            <div>
                                <form action="#" method="GET" id="subscribes">
                                    <input type="email" placeholder="ваш e-mail" id="email" title=''>
                                    <input type="submit" name="submit" id="submit" title=''>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<?php
    include "footer.php";
?>
    <script src="script.js"></script>
    <script src="modal.js"></script>
    <script>
        $('#brand').change(function(){
            $('#sortCatalog').submit();
        })
        $('#price').change(function(){
            $('#sortCatalog').submit();
        })
        $('#category').change(function(){
            $('#sortCatalog').submit();
        })
    </script>
</body>
</html>