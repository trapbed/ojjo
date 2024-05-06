<?php
session_start();
require "header.php";
?>

        <div id="emty1"></div>
        <div id="headerBtn">
            <span>Долго, дорого, богато!</span>
            <button id="toCatalog" onclick="location.href='catalog.php'">каталог изделий</button>
        </div>
        <div id="headerEmty"></div>
        <div id="headerEnd">
            <hr id="topHr">
            <div id="hrEmty"></div>
            <div id="logos">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
                <hr class="hrEnd">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
                <hr class="hrEnd">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
                <hr class="hrEnd">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
                <hr class="hrEnd">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
                <hr class="hrEnd">
                <img src="images/logoEnd.png" alt="logoEnd" class="logoEnd">
            </div>
        </div>
    </header>
    
    <div id="sorted">
        <div id="centerSorted">

            <div id="headSorted">
                <span id="headSorted1">К мероприятиям</span>
                <span id="headSorted2">Настоящая красота здесь!</span>
            </div>

            <div id="sort">
                <div class="sorts" id="merried">свадьба<div class="backSort"></div></div>
                
                <div class="sorts" id="husband">мужу<div class="backSort"></div></div>
                
                <div class="sorts" id="wife">жене<div class="backSort"></div></div>
                
                <div class="sorts" id="partner">партнеру<div class="backSort"></div></div>
                
                <div class="sorts" id="collections">коллекции<div class="backSort"></div></div>
                
                <div class="sorts" id="rarity">редкость<div class="backSort"></div></div>
                
            </div>

            <div id="sortImgs">
                <a href='catalog.php?category=1&cat_name=Кольца'><img src="images/rigs.png" alt="" id="sortByRing"></a>
                <a href='catalog.php?category=2&cat_name=Серьги'><img src="images/ears.png" alt="" id="sortByEar"></a>
                <a href='catalog.php?category=6&cat_name=Подвески'><img src="images/podv.png" alt="" id="sortByPodv"></a>
                <a href='catalog.php?category=3&cat_name=Запонки'><img src="images/zaponk.png" alt="" id="sortByZapon"></a>
                <a href='catalog.php?category=5&cat_name=Браслеты'><img src="images/bracelete.png" alt="" id="sortByBracelete"></a>
                <a href='catalog.php?category=4&cat_name=Часы'><img src="images/clocks.png" alt="" id="sortByClock"></a>
            </div>

        </div>

    </div>

    <div id="weSalons">
        <div id="salonCenter">
            <span id="salon1">Не знаете, что выбрать?</span>
            <span id="salon2">Посетите наши салоны в Москве</span>
            <span id="salon3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut duis tortor vitae pellentesque egestas quam pulvinar. Pellentesque porttitor velit sit pellentesque. Suspendisse donec pretium id dignissim. Dignissim ultrices eget orci viverra. Egestas quis et ut ultrices imperdiet lectus nulla tempus. Pharetra lorem sem purus nisi libero viverra ipsum.</span>
            <button>наши салоны</button>
        </div>
    </div>
    <div id="emty2"></div>
    <div id="poleznye">
        <div id="headPolez">
            <span id="hp1">Полезные статьи</span>
            <span id="hp2">Лучшие советы по подбору дорогих подарков</span>
        </div>
        <div id="imgPolez">
            <div id="imgP1">
                <div>
                    <span>Как выбрать<br>часы для своей будущей жены</span>
                </div>
            </div>
            <div id="imgP2">
                <div>
                    <span>Запонки для мужа:<br>7 ключевых правил покупки аксессуара</span>
                </div>
            </div>
            <div id="imgP3">
                <div>
                    <span>Как выбрать обручальные кольца молодоженам</span>
                </div>
            </div>
        </div>
        <button>читать наш блог</button>
    </div>
    <div id="social">
        <div id="emtySoc"></div>
        <div id="intoSoc">
            <div id="socTxt">
                <span id="socTxt1">#ojjo_jewerly</span>
                <span id="socTxt2">Мы в социальных сетях</span>
            </div>
            <div id="socImg">
                <div id="socImg1"><img src="images/play.png" alt="play"></div>
                <div id="socImg2"></div>
                <div id="socImg3"></div>
                <div id="socImg4"></div>
                <div id="socImg5"></div>
                <div id="socImg6"><img src="images/play.png" alt="play"></div>
            </div>
        </div>
    </div>
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
<script src='validate.js'></script>
</body>
</html>