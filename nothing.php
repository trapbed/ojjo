<?php
session_start();
require "connectbd.php";

    $sortBy = isset($_GET['sort']) ? $_GET['sort'] : false;

    if($sortBy == false ){
        $justQ = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM jewelery"));

        $query = mysqli_query($conn, "SELECT * FROM jewelery inner join category on jew_cat=category_id");

    }
    else{
        $sort = "SELECT *FROM jewelery JOIN category ON category.category_id=jewelery.jew_cat WHERE jew_cat='".$sortBy."'";

        $query = mysqli_query($conn, $sort);
    }

    $products = mysqli_fetch_all($query);

    print_r($products);
 
    require "header.php";
?>

        <div id="nothingBeforeHr"></div>

        <form id="sortCatalog">
            <select name="brand" id="brand"><option value="brand" id="sortBrand">Бренд</option></select>
            <select name="price" id="price"><option value="price" id="sortPrice">Цена</option></select>
            <select name="who" id="who"><option value="who" id="sortWho">Для кого</option></select>
            <select name="collection" id="collection"><option value="collection" id="sortCollection">Коллекция</option></select>
            <select name="session" id="season"><option value="season" id="sortSeason">Сезон</option></select>
            <select name="name" id="event"><option value="event" id="sortEvent">Событие</option></select>
        </form>

        <div id="nothingBeforeForm"></div>

        <div id="catalogue">
            <div class="cat1">

                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>


            </div>

            <div class="void"></div>
            <hr>
            <div class="void"></div>

            <div class="cat1">

                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>

            

            </div>
            

            <?php 
                    $counter = 0;
                    $maketId = 0;

                    // print_r($products);
                    
                foreach($products as $product){
                    
                    
                    if($counter==0){                        
                        echo "<div class='void'></div>";
                        echo "<hr>";
                        echo "<div class='void'></div>";
                        echo "<div class='cat1'>";
                    }

                    $counter++;                    
                    echo "
                    <div class = 'prod'>
                        <img src='images/jew/$product[4]' alt='$product[2]'>
                        <p>$product[1]</p>
                        <form action='product.php' method='POST' class='getProd'>
                            <input type='submit' class='price' id='priceProd' value='$product[5] &#8381'>
                            <input type='hidden' name ='prodId' value ='$product[0]' id ='prodId'>
                        </form>
                    </div>";

                    if($counter==3){
                        echo "</div>";
                        $counter=0;
                    }

                    $maketId++;

                }
?>

            
            </div>

            <div class="void"></div>

            <button id="catMore">покажите еще</button>
        </div>

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
                                    <input type="email" placeholder="ваш e-mail" id="email">
                                    <input type="submit" name="submit" id="submit">
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
</body>
</html>





<!-- <div class="cat1">

                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>


            </div> -->

            <!-- <div class="void"></div>
            <hr>
            <div class="void"></div>

            <div class="cat1"> -->

                <!-- <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div>
                <div class="prod">
                    <img src="images/Rectangle 21.png" alt="подвеска">
                    <span>Подвеска</span>
                    <p>Dolce & Gabanna</p>
                    <a href="position.php">175 000 &#8381</a>
                </div> -->

            

            <!-- </div> -->




            
    echo $name."<br>";
    echo $oldName."<br>";
    echo $login."<br>";
    echo $oldLogin."<br>";
    echo $birth."<br>";
    echo $oldBirth."<br>";
    echo $pass."<br>";
    echo $oldPass."<br>";