<?php
    require_once("src/scripts/php/database.php");
    require_once("src/scripts/php/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
    <script src="src/scripts/sort.js" defer></script>
</head>
<body class="<?=$themeClass; ?>">
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

        <main class="main-grid-type">
            <div></div>
            <div class="grid-type-container">
                <div class="category">
                    <h1>Администрация</h1>
                    <div class="card-container">
                        <?php
                            $admins = get_admins($link);
                            foreach($admins as $a):
                        ?>
                        <div class="card">
                            <div class="card-info">
                                <h1 class="card-name"><?=$a['last_name']; ?><br><?=$a['first_name']; ?><br><?=$a['patronymic']; ?></h1>
                                <p><strong>КАФЕДРА:</strong><?=$a['name']; ?></p>
                                <p><strong>АУДИТОРИЯ:</strong><?=$a['office']; ?></p>
                                <p><strong>ЭЛЕКТРОННАЯ&nbsp;ПОЧТА:</strong><br><?=$a['email']; ?></p>
                                <p><strong>ТЕЛЕФОН:</strong><?=$a['phone']; ?></p>
                            </div>
                            <img src="<?=$a['photo']; ?>" alt="photo">
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
                
                <div class="category after-category">
                    <h1>Модерация</h1>
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
                                $moderators = get_moderators($link);
                                foreach($moderators as $m):
                            ?>
                            <tr>
                                <td><?=$m['id_admin'] ?></td>
                                <td><?=$m['last_name']." ".$m['first_name']." ".$m['patronymic'] ?></td>
                                <td><?=$m['email'] ?></td>
                                <td><?=$m['phone'] ?></td>
                                <td><?=$m['office'] ?></td>
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

        <?php include("src/app/footer.php") ?>
    
    </div>
</body>
</html>