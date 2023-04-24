<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    if(!isset($_SESSION['id_admin'])) {
        $new_url = 'http://localhost/rateuteacher/auth.php';
        header('Location: '.$new_url);
    }
?>
<?php 
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
                    <h1>Персональная информация</h1>
                    <form action="src/scripts/php/change_info.php" method="post">
                        <table class="table_sort" id="profile-table">
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Текущие данные</th>
                                    <th>Внести изменения</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $person = get_person($link);
                                ?>
                                <tr>
                                    <td><strong>Фамилия</strong></td>
                                    <td><?=$person['0']['last_name']?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Имя</strong></td>
                                    <td><?=$person['0']['first_name']?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Отчество</strong></td>
                                    <td><?=$person['0']['patronymic']?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Кафедра</strong></td>
                                    <td><?=$person['0']['department']?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Телефон</strong></td>
                                    <td><?=$person['0']['phone']?></td>
                                    <td><input class="default-input" type="text" name="phone" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><strong>Электронная почта</strong></td>
                                    <td><?=$person['0']['email']?></td>
                                    <td><input class="default-input" type="text" name="email" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><strong>Аудитория</strong></td>
                                    <td><?=$person['0']['office']?></td>
                                    <td><input class="default-input" type="text" name="office" autocomplete="off"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input id="profile-change" class="grad-btn" type="submit" value="Применить изменения">
                    </form>
                </div>
                <div class="category" <?php if($_SESSION['id_admin']['role'] != 2) { echo "hidden"; }?>>
                    <h1>Администрирование</h1>
                    <div class="question">
                        <h3>ЗАРЕГИСТРИРОВАТЬ МОДЕРАТОРА</h3>
                        <form action="src/scripts/php/add_moderator.php" method="post">
                            <div class="add-input">
                                <p><strong>Фамилия:</strong></p><input class="default-input" type="text" name="last_name" autocomplete="off" required>
                                <p><strong>Имя:</strong></p><input class="default-input" type="text" name="first_name" autocomplete="off" required>
                                <p><strong>Отчество:</strong></p><input class="default-input" type="text" name="patronymic" autocomplete="off" required>
                                <p><strong>Кафедра:</strong></p><input class="default-input" type="text" name="department" autocomplete="off" required>
                                <p><strong>Аудитория:</strong></p><input class="default-input" type="text" name="office" autocomplete="off" required>
                                <p><strong>Электронная почта:</strong></p><input class="default-input" type="email" name="email" autocomplete="off" required> 
                                <p><strong>Номер телефона:</strong></p><input class="default-input" type="text" name="phone" autocomplete="off" required>
                                <p><strong>Логин:</strong></p><input class="default-input" type="text" name="login" autocomplete="off" minlength="6" maxlength="25" required>
                                <p><strong>Пароль:</strong></p><input class="default-input" type="text" name="password" autocomplete="off" minlength="6" maxlength="25" required>
                            </div>
                            <input class="grad-btn" type="submit" value="Зарегистрировать модератора">
                        </form>
                    </div>
                </div>
                <div class="category after-category">
                    <h1>Модерирование</h1>
                    <div class="question">
                        <h3>ДОБАВИТЬ ПРЕПОДАВАТЕЛЯ</h3>
                        <form action="src/scripts/php/add_teacher.php" method="post">
                            <div class="add-input">
                                <p><strong>Фамилия:</strong></p><input class="default-input" type="text" name="last_name" autocomplete="off" required>
                                <p><strong>Имя:</strong></p><input class="default-input" type="text" name="first_name" autocomplete="off" required>
                                <p><strong>Отчество:</strong></p><input class="default-input" type="text" name="patronymic" autocomplete="off" required>
                                <p><strong>Кафедра:</strong></p><input class="default-input" type="text" name="department" autocomplete="off" required>
                                <p><strong>Стаж:</strong></p><input class="default-input" type="number" name="experience" min="0" max="80" required>
                                <p><strong>Дисциплина:</strong></p><input class="default-input" type="text" name="discipline" autocomplete="off" required>
                            </div>
                            <input class="grad-btn" type="submit" value="Добавить преподавателя">
                        </form>
                    </div>
                    <div class="question">
                        <h3>СОЗДАТЬ ОПРОС</h3>
                        <form action="src/scripts/php/add_q.php" method="post">
                            <div class="add-input">
                                <p><strong>Преподаватель:</strong></p>
                                <select class="default-input" name="teacher" required>
                                    <?php 
                                        $teachers = get_teachers($link);
                                    ?>
                                    <?php foreach($teachers as $t): ?>
                                    <option value="<?=$t['id_teacher'] ?>"><?php echo $t['last_name']." ".$t['first_name']." ".$t['patronymic'].", ".$t['discipline'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><strong>Группа:</strong></p><input class="default-input" type="text" name="study_group" autocomplete="off" required>
                                <p><strong>Количество использований:</strong></p><input class="default-input" type="number" name="usages" min="0" required>
                            </div>
                            <input class="grad-btn" type="submit" value="Создать опросы">
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="exit"><a href="src/scripts/php/logout.php">ВЫЙТИ</a></div>
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
</body>
</html>