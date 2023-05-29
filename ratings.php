<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    require_once('src/scripts/php/database.php');
    require_once('src/scripts/php/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
    <script src="src/scripts/btnup.js" defer></script>
    <script src="src/scripts/sort.js" defer></script>
</head>
<body class="<?=$themeClass; ?>">
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

        <main class="main-grid-type">
            <div></div>
            <div class="grid-type-container">
                <div class="category after-category">
                    <h1>Рейтинг преподавателей</h1>
                    <table class="table_sort">
                        <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Фамилия Имя Отчество</th>
                                <th rowspan="2">Дисциплина</th>
                                <th rowspan="2">Кафедра</th>
                                <th rowspan="2">Стаж (лет)</th>
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
                                    <td><?=$r['name'] ?></td>
                                    <td><?=$r['experience'] ?></td>
                                    <td><?=round($r['a_year'], 2) ?></td>
                                    <td><?=round($r['b_year'], 2) ?></td>
                                    <td><?=round($r['c_year'], 2) ?></td>
                                    <td><?=round($r['a_full'], 2) ?></td>
                                    <td><?=round($r['b_full'], 2) ?></td>
                                    <td><?=round($r['c_full'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="btn-up btn-up_hide"></div>
            </div>
        </main>

        <?php include("src/app/footer.php") ?>
    
    </div>
</body>
</html>