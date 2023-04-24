<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    require_once('src/scripts/php/database.php');
    require_once('src/scripts/php/functions.php');
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
                <div class="category after-category">
                    <h1>Рейтинг преподавателей</h1>
                    <!-- <FORM>ПРОСМОТРЕТЬ РЕЙТИНГ ПРЕПОДАВАТЕЛЕЙ ЗА <INPUT/SELECT> ГОД <SUBMIT></FORM> -->
                    <!-- ACTION: ЗАДАТЬ SESSION ЗНАЧЕНИЕ ГОДА И РЕДИРЕКТНУТЬ НА РЕЙТИНГИ -->
                    <!-- if(!isset(SESSION)) { $year = date() } else { $year = SESSION } -->
                    <table class="table_sort">
                        <thead>
                            <!-- <tr>
                                <th>ID</th>
                                <th>Фамилия Имя Отчество</th>
                                <th>Дисциплина</th>
                                <th>Кафедра</th>
                                <th>Стаж (лет)</th>
                                <th>Рейтинг (текущий)</th>
                                <th>Рейтинг (общий)</th>
                            </tr> -->
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Фамилия Имя Отчество</th>
                                <th rowspan="2">Дисциплина</th>
                                <th rowspan="2">Кафедра</th>
                                <th rowspan="2">Стаж (лет)</th>
                                <!-- <th colspan="3">Рейтинг (Текущий)</th> -->
                                <th colspan="3">
                                    Рейтинг
                                    <form action="src/scripts/php/select_year.php" method="post">
                                        <select name="year" id="year" onchange="this.form.submit()">
                                            <?php 
                                                if(!isset($_SESSION['year'])) {
                                                    $year = date("Y"); 
                                                } else {
                                                    $year = $_SESSION['year'];
                                                }
                                            ?>
                                            <option value="<?=$year; ?>"><?=$year; ?></option>
                                            <?php
                                                $years = get_years($link);
                                                foreach($years as $y):
                                            ?>
                                            <option value="<?=$y['year']; ?>"><?=$y['year']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </form>
                                </th>
                                <th colspan="3">Рейтинг (общий)</th>
                            </tr>
                            <tr>
                                <th>А</th>
                                <th>Б</th>
                                <th>В</th>
                                <th>А</th>
                                <th>Б</th>
                                <th>В</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- СЮДА ДОБАВЛЯТЬ ПРЕПОДАВАТЕЛЕЙ ИЗ БАЗЫ ДАННЫХ -->
                            <?php 
                                $ratings = get_ratings($link, $year);
                            ?>
                            <?php foreach($ratings as $r): ?>
                                <tr>
                                    <td><?=$r['id_teacher'] ?></td>
                                    <td><?=$r['last_name']." ".$r['first_name']." ".$r['patronymic'] ?></td>
                                    <td><?=$r['discipline'] ?></td>
                                    <td><?=$r['department'] ?></td>
                                    <td><?=$r['experience'] ?></td>
                                    <td><?=round($r['a_year'], 2) ?></td>
                                    <td><?=round($r['b_year'], 2) ?></td>
                                    <td><?=round($r['c_year'], 2) ?></td>
                                    <td><?=round($r['a_full'], 2) ?></td>
                                    <td><?=round($r['b_full'], 2) ?></td>
                                    <td><?=round($r['c_full'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>1</td>
                                <td>Анатольев Александр Геннадьевич</td>
                                <td>Веб-программирование</td>
                                <td>АААААААААА</td>
                                <td>17</td>
                                <td>4.72</td>
                                <td>4.82</td>
                                <td>4.82</td>
                                <td>4.82</td>
                                <td>4.82</td>
                                <td>4.82</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="btn-up btn-up_hide"></div>
            </div>
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
    <script src="src/scripts/btnup.js"></script>
    <script src="src/scripts/sort.js"></script>
</body>
</html>