<?php
    require "connectbd.php";
    require "header.php";
?>

    <div id="way">
        <a href="index.php">Главная</a>
        <span class="slash">/</span>
        <a href="catalog.php">Каталог</a>
        <span class="slash">/</span>
        <a href="#">Категория</a>
        <span class="slash">/</span>
        <a href="position.php">Подвеска Dolce & Gabarra</a>
    </div>

    <div id="aboutProd">
        <div id="imgsNSlider">
            <img src="images/Rectangle 21.png" alt="product" id="productIndex">
            <div id="productSlider">
                <img src="images/Rectangle 21.png" alt="prod">
                <img src="images/Rectangle 21.png" alt="prod">
                <img src="images/Rectangle 21.png" alt="prod">
            </div>
        </div>
        <div id="aboutOpis">
            <div id="intoAboutOpis">
                <div id="textOpis">
                    <p>подвеска dolce & gabbara</p>
                    <div id="catNbrand">
                        <div>Категория: &nbsp;Подвески</div> &emsp;
                        <div>Бренд: &nbsp;Dolce & Gabbara</div>
                    </div>
                    <hr id="prodHr">
                    <span id="prodLorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit mattis scelerisque odio nunc. Ipsum quis facilisis turpis vulputate. Viverra dignissim in nec phasellus. Tincidunt est ipsum diam, vestibulum dignissim dui diam. Et nulla sit convallis orci est, fames sit luctus lacus. Nunc donec malesuada amet eget eget pharetra. Ultricies et, ac varius at amet viverra feugiat non massa.<br>
Vel vel in urna, sodales urna ac sed felis. Tellus augue et senectus malesuada faucibus sollicitudin ornare. Sit non et sit enim in ornare velit. Ac imperdiet vitae, orci, nec scelerisque enim sit enim risus. 
Et nulla sit convallis orci est, fames sit luctus lacus. 
                    </span>
                    <span id="prodPrice">200 000 &#8381</span>
                    <div id="prodTwoBtns">
                        <a class="btnPos" id="buy" href="#">купить</a>
                        <a class="btnPos" id="basket" href="#">добавить в корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mtPosOpis"></div>

    <div id="opis">
        <div id="opis1">
            <span id="opisLorem"><p>Полное описание товара</p>
                <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, lorem eu commodo porttitor erat. Amet mauris cursus bibendum in egestas. Nulla porttitor amet quam elit, mauris. Tortor egestas dignissim augue suspendisse rutrum pretium lobortis dolor. Commodo sagittis at amet faucibus faucibus id. Bibendum placerat convallis gravida eu quisque et augue. Sed dignissim amet ut vitae at ornare sed.
                Commodo sagittis at amet faucibus faucibus id. Bibendum placerat convallis gravida eu quisque et augue. Sed dignissim amet ut vitae at ornare sed.
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