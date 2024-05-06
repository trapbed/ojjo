<?php
session_start();
require "header.php";
?>

    <div id="way">
        <a href="index.php">Главная</a>
        <span class="slash">/</span>
        <a href="contacts.php">Контакты</a>
    </div>

    <div id="contact1">
        контакты
    </div>

    <div id="contacts2">
        <div id="cont1" class="cont">
            <span>Главный офис</span>
            <div>
                <img src="images/place.png" alt="place">
                <div id="textCont">
                    <span>Невский 140, офис 1-5</span><br>
                    <span>Невский 140, офис 1-5</span>
                </div>
            </div>
        </div>

        <div id="cont2" class="cont">
            <span>Телефон</span>
            <div>
                <img src="images/phone.png" alt="phone">
                <div id="textCont">
                    <span>8 (812) 458-56-45</span><br>
                    <span>8-911-878-00-00</span>
                </div>
            </div>
        </div>

        <div id="cont3" class="cont">
            <span>E-mail</span>
            <div>
                <img src="images/post.png" alt="post">
                <div id="textCont">
                    <span>office@ojjo.com</span><br>
                    <span>sales@ojjo.com</span>
                </div>
            </div>
        </div>

        <div id="cont4" class="cont">
            <span>Доп. адреса</span>
            <div>
                <img src="images/place.png" alt="place">
                <div id="textCont">
                    <span>Невский 140, офис 1-5</span><br>
                    <span>Невский 140, офис 1-5</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mtContTwin"></div>
    <hr id="contHr">
    <div class="mtContTwin"></div>

    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.1258132400699!2d30.366676177057705!3d59.930054474910804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631bb92b2b7f5%3A0xfc6c3540c8fb3df8!2sNevsky%20Ave%2C%20140%2C%20Sankt-Peterburg%2C%20191036!5e0!3m2!1sen!2sru!4v1705869769222!5m2!1sen!2sru" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div id="mtCont3"></div>
<?php
    include "footer.php";
?>
    <script src="modal.js"></script>
</body>
</html>