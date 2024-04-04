<?php
    require "connectbd.php";
    $query = mysqli_query($conn, "SELECT * FROM jewelery inner join category on jew_cat=category_id");
    $products = mysqli_fetch_all($query);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="background"></div>

    <section id="logInModal">
        <form action="checkLogIn.php" method="POST">
            <img src="images/x.png" alt="christ" class="christ">
            <p id="headerForm">Войти</p>
            <!-- <label for="name">ФИО :
                <input type="text" name="name" id="nameForm">
            </label> -->
            <label for="phone">Телефон :
                <input type="text" name="phone" id="phone">
            </label>
            <label for="password">Пароль :
                <input type="text" name="password" id="password">
            </label>
            <div id="btns">
                <span id="toSignIn">Зарегистрироваться</span>
                <input type="submit" value="Войти">
            </div>
        </form>
    </section>

    <section id="signInModal">
        <form action="checkSignIn.php" method="POST">
            <img src="images/x.png" alt="christ" class="christ">
            <p id="headerForm">Зарегистрироваться</p>
            <label for="name">ФИО :
                <input type="text" name="name" id="name">
            </label>
            <label for="phone">Телефон :
                <input type="text" name="phone" id="phone">
            </label>
            <label for="password">Пароль :
                <input type="text" name="password" id="password">
            </label>
            <div id="btns">
                <span id="toLogIn">Войти</span>
                <input type="submit" value="Зарегистрироваться">
            </div>
            
        </form>
    </section>

        <nav>
            <div>
                <div id="navLeft">
                    <span>Контрагентам</span>
                    <span>Дизайнерам</span>
                    <span>Вакансии</span>
                </div>
                <img src="images/logo.png" alt="logo" id="logo">
                <div id="navRight">
                    <div id="search">
                        <img src="images/search.png" alt="search">
                        <span>Поиск</span>
                    </div>
                    <div id="logIn">Вход/Регистрация</div>
                    <div id="icons">
                        <img src="images/profile.png" alt="profile">
                        <img src="images/like.png" alt="like">
                    </div>
                </div>
            </div>
        </nav>

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
                        <span>$product[7]</span>
                        <p>$product[1]</p>
                        <a href='position.php'>$product[5] &#8381</a>
                    </div>";

                    if($counter==3){
                        echo "</div>";

                        $counter=0;

                    }


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
    
        <footer>
            <div>
                <div id="fooEmty1"></div>
                <div id="fooCenter">
                    <div id="foo1">
                        <div id="fooTitle">
                            <span>полезные ссылки</span>
                            <hr>
                        </div>
                        <div id="fooEmtyInto"></div>
                        <div id="intoFoo1">
                            <span>Доставка</span>
                            <span>Оплата</span>
                            <span>Акции</span>
                            <span>Политика конфиденциальности</span>
                        </div>
                    </div>
                    <div id="foo2">
                        <div id="fooTitle">
                            <span>оплата</span>
                            <hr>
                        </div>
                        <div id="fooEmtyInto"></div>
                        <div id="intoFoo2">
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ullamcorper justo, nec, pellentesque.</span>
                            <div>
                                <img src="images/Rectangle 13.png" alt="">
                                <img src="images/Rectangle 14.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="foo3">
                        <div id="fooTitle">
                            <a href="contacts.php">контакты</a>
                            <hr>
                        </div>
                        <div id="fooEmtyInto"></div>
                        <div id="intoFoo3">
                            <ul>
                                <li>8(812)234-56-55</li>
                                <li>8(812)234-56-55</li>
                                <li>ojjo@ojjo.ru</li>
                            </ul>
                        </div>
                    </div>
                    <div id="foo4">
                        <div id="fooTitle">
                            <span>социальные сети</span>
                            <hr>
                        </div>
                        <div id="fooEmtyInto"></div>
                        <div id="intoFoo4">
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ullamcorper justo, nec, pellentesque.</span>
                            <div>
                                <img src="images/imgFoo1.png" alt="img">
                                <img src="images/imgFoo2.png" alt="img">
                                <img src="images/imgFoo3.png" alt="img">
                                <img src="images/imgFoo4.png" alt="img">
                                <img src="images/imgFoo5.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="fooEmty2"></div>
                <hr>
                <div id="copyright">
                    <span>(c) 2020 OJJO jewelry</span>
                    <span>Договор публичной офферты</span>
                    <span>Контрагентам</span>
                    <span>Сделано Figma.info</span>
                </div>
            </div>
        </footer>
    <script src="script.js"></script>
    <script src="modal.js"></script>
</body>
</html>