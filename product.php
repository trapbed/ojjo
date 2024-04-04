<?php
    require "connectbd.php";
    require "header.php";

    
    $prodId = isset($_POST['prodId']) ? $_POST['prodId'] : $_COOKIE['product'];

    $queryProd = mysqli_fetch_all(mysqli_query($conn, "SELECT jew_name, category_name, jew_descr, jew_img, jew_price, jew_brand FROM jewelery inner join category on jew_cat=category_id WHERE jew_id=$prodId"));

    foreach($queryProd as $prod){
        $name = $prod[0];
        $cat = $prod[1];
        $desc = $prod[2];
        $img = $prod[3];
        $price = $prod[4];
        $brand = $prod[5];
    }

?>

    <div id="way">
        <a href="index.php">Главная</a>
        <span class="slash">/</span>
        <a href="catalog.php">Каталог</a>
        <span class="slash">/</span>
        <a href="#">Категория</a>
        <span class="slash">/</span>
        <a href="position.php"><?=$name ?></a>
    </div>

    <div id="aboutProd">
        <div id="imgsNSlider">
            <img src="images/jew/<?=$img?>" alt="product" id="productIndex">
            <div id="productSlider">
                <img src="images/jew/<?=$img?>" alt="prod">
                <img src="images/jew/<?=$img?>" alt="prod">
                <img src="images/jew/<?=$img?>" alt="prod">
            </div>
        </div>
        <div id="aboutOpis">
            <div id="intoAboutOpis">
                <div id="textOpis">
                    <p><?=$name ?></p>
                    <div id="catNbrand">
                        <div>Категория: &nbsp;  <?=$cat ?>  </div> &emsp;
                        <div>Бренд: &nbsp;  <?=$brand ?>  </div>
                    </div>
                    <hr id="prodHr">
                    <span id="prodLorem"><?=$desc ?>
                    </span>
                    <span id="prodPrice"><?=$price ?> &#8381</span>
                        <form action="buyOrDraft.php" method='POST' id='prodTwoBtns'>
                            <input type="submit" name='buy' value="Купить" id='buy'>
                            <input type="submit" name='draft' value="Добавить в корзину" id='basket'>
                            <input type="hidden" name="idProd" value='<?=$prodId?>'>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div id="mtPosOpis"></div>

    <div id="opis">
        <div id="opis1">
            <span id="opisLorem"><p>Полное описание товара</p>
                <br>
                <?=$desc?>
            </span>
            <div id="gradientOpis"></div>
            <span id="btnBottom" class="btnMore">Читать полностью</span>
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

    <div id="mtPos2"></div>

    <div id="mayLike">
        <div id="headMay">
            <span id="may1">Мы подготовили для вас кое-что еще</span>
            <span id="may2">Товары, которые могут Вам понравиться</span>
        </div>
        <div id="mayPost">
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
    </div>

    <div id="mtPost"></div>

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
    <script src="modal.js"></script>
    <script src="script.js"></script>
</body>
</html>