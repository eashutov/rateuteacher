<?php
    require_once("src/scripts/php/database.php");
    require_once("src/scripts/php/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RateUTeacher</title>
    <link rel="stylesheet" href="src/styles/style.css">
    <!-- <script src="src/script.js"></script> -->
</head>
<body>
    <div class="wrapper">


        <!-- HEADER -->


        <header class="site-header">
            <div class="site-search">
                <form action="" method="GET" class="search-bar">
                    <input id="search" type="search" placeholder="Поиск по сайту" name="q" autocomplete="off">
                    <button type="submit"><img src="src/images/search.svg" alt="x" width="20px" height="20px"></button>
                </form>
            </div>
            <div class="site-logo">
                <a href="index.html"><img src="src/images/rut_new.png" alt="rut" width="60px" height="60px"/></a>
            </div>
            <nav class="site-navigation">
                <ul class="nav">
                    <li class="hover"><a href="#">Рейтинги</a></li>
                    <li class="hover"><a href="#">Контакты</a></li>
                    <li class="hover"><a href="#">Q&ampA</a></li>
                </ul>
            </nav>
            <div class="site-sign">
                <div class="hover">
                    <a href="#" class="sign"><img src="src/images/sign.svg" alt="sign" width="20px" height="20px" /></a>
                </div>
            </div>
        </header>
        

        <!-- MAIN -->


        <main class="main-grid-type">
            <div></div>
            <div class="grid-type-container">
                <div class="category">
                    <h1>Администрация</h1>
                    <div class="card-container">
                        <div class="card">
                            <div class="card-info">
                                <h1 class="card-name">ФАМИЛИЯ<br>ИМЯ<br>ОТЧЕСТВО</h1>
                                <p><strong>КАФЕДРА:</strong>АСОИУ</p>
                                <p><strong>АУДИТОРИЯ:</strong>8-220</p>
                                <p><strong>ЭЛЕКТРОННАЯ&nbsp;ПОЧТА:</strong><br>test@mail.ru</p>
                                <p><strong>ТЕЛЕФОН:</strong>+7 (999) 999-99-99</p>
                            </div>
                            <img src="src/images/default_avatar.png" alt="photo">
                        </div>
                        <div class="card">
                            <div class="card-info">
                                <h1 class="card-name">ФАМИЛИЯ<br>ИМЯ<br>ОТЧЕСТВО</h1>
                                <p><strong>КАФЕДРА:</strong>АСОИУ</p>
                                <p><strong>АУДИТОРИЯ:</strong>8-220</p>
                                <p><strong>ЭЛЕКТРОННАЯ&nbsp;ПОЧТА:</strong><br>test@gmail.com</p>
                                <p><strong>ТЕЛЕФОН:</strong>+7 (999) 999-99-99</p>
                            </div>
                            <img src="src/images/default_avatar.png" alt="photo">
                        </div>
                    </div>
                </div>
                
                <div class="category after-category">
                    <h1>Модерация</h1>
                    <!-- <select name="kafedra" id="kaf">
                        <option value="default">КАФЕДРА</option>
                        <option value="asoiu">Автоматизированные системы обработки информации и управления</option>
                        <option value="other">Другая</option>
                    </select> -->
                    <!-- <div class="card-container"> -->
                        <!-- СЮДА ДОБАВЛЯТЬ КОНТАКТЫ СОТРУДНИКОВ КАФЕДРЫ -->
                    <!-- </div> -->
                    <table class="table_sort" id="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фамилия Имя Отчество</th>
                                <th>Эл. почта</th>
                                <th>Телефон</th>
                                <th>Аудитория</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- СЮДА ДОБАВЛЯТЬ ПРЕПОДАВАТЕЛЕЙ ИЗ БАЗЫ ДАННЫХ -->
                            <?php 
                                $admins = get_admins($link);
                                foreach($admins as $a):
                            ?>
                            <tr>
                                <td><?=$a['id_admin'] ?></td>
                                <td><?=$a['last_name']." ".$a['first_name']." ".$a['patronymic'] ?></td>
                                <td><?=$a['email'] ?></td>
                                <td><?=$a['phone'] ?></td>
                                <td><?=$a['office'] ?></td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div></div>
        </main>


        <!-- FOOTER -->


        <footer class="site-footer">
            <div class="dev-contacts">
                <p>8-800-555-35-35</p>
                <p>egorkamaxwell@yandex.ru</p>
            </div>
            <div class="powered-by">
                <h2>OmSTU, 2023</h2>
                <p>by E.A. Shutov</p>
            </div>
            <div class="references hover">
                <a href="#"><img src="src/images/discord_logo.svg" alt="DS"></a>
                <a href="https://omgtu.ru/"><img src="src/images/omstu-logo.svg" alt="OmSTU"></a>
                <a href="#"><img src="src/images/vk_logo.svg" alt="VK"></a>
            </div>
        </footer>
    
    </div>
</body>
</html>