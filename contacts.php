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
</head>
<body>
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

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

        <?php include("src/app/footer.php") ?>
    
    </div>
</body>
</html>