<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    if(!isset($_SESSION['id_admin'])) {
        $new_url = 'http://localhost/rateuteacher/auth.php';
        header('Location: '.$new_url);
    }
    if(isset($_SESSION['success'])) {
        /* Супер странный if-else, но пусть пока будет xd */
        if(($_SESSION['success'] != "Модератор") && ($_SESSION['success'] != "Преподаватель") && ($_SESSION['success'] != "Изменено")) {
            $code = $_SESSION['success'];
            echo "<script>document.addEventListener('DOMContentLoaded', () => { document.getElementById('modal-q').showModal(); });</script>";
        } else if ($_SESSION['success'] == "Изменено") {
            echo "<script>document.addEventListener('DOMContentLoaded', () => { document.getElementById('modal-change').showModal(); });</script>";
        } else {
            $success = $_SESSION['success'];
            echo "<script>document.addEventListener('DOMContentLoaded', () => { document.getElementById('modal-success').showModal(); });</script>";
        }
        unset($_SESSION['success']);
    }
?>
<?php 
    require_once('src/scripts/php/database.php');
    require_once('src/scripts/php/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
    <script src="src/scripts/checkbox.js" defer></script>
    <script src="src/scripts/login.js" defer></script>
</head>
<body class="<?=$themeClass; ?>">
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

        <dialog class="dialog" id="modal-success">
            <h1>Успешно!</h1>
            <p><?=$success; ?> успешно добавлен.</p>
            <button id="modal-btn" onclick="window['modal-success'].close()">ok</button>
        </dialog>
        <dialog class="dialog" id="modal-q">
            <h1>Успешно!</h1>
            <p>Опрос успешно создан.</p>
            <p>Сохраните код опроса: <i><?=$code; ?></i></p>
            <button id="modal-btn" onclick="window['modal-q'].close()">ok</button>
        </dialog>
        <dialog class="dialog" id="modal-change">
            <h1>Успешно!</h1>
            <p>Данные успешно изменены.</p>
            <button id="modal-btn" onclick="window['modal-change'].close()">ok</button>
        </dialog>
        

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
                                    <th>Скрыть</th>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Имя</strong></td>
                                    <td><?=$person['0']['first_name']?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Отчество</strong></td>
                                    <td><?=$person['0']['patronymic']?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Кафедра</strong></td>
                                    <td><?=$person['0']['name']?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Телефон</strong></td>
                                    <td><?=$person['0']['phone']?></td>
                                    <td><input class="default-input" type="text" name="phone" autocomplete="off" 
                                    pattern="\+7\s?[\(]{1}9[0-9]{2}[\)]{1}\s?\d{3}[-]{1}\d{2}[-]{1}\d{2}"
                                    placeholder="+7(XXX)XXX-XX-XX"></td>
                                    <td><input class="check-hide" type="checkbox" id="phone" name="hide" value="2" <?php if($person['0']['hide'] == 2) { echo "checked"; } ?>></td>
                                </tr>
                                <tr>
                                    <td><strong>Электронная почта</strong></td>
                                    <td><?=$person['0']['email']?></td>
                                    <td><input class="default-input" type="email" name="email" autocomplete="off"></td>
                                    <td><input class="check-hide" type="checkbox" id="email" name="hide" value="1" <?php if($person['0']['hide'] == 1) { echo "checked"; } ?>></td>
                                </tr>
                                <tr>
                                    <td><strong>Аудитория</strong></td>
                                    <td><?=$person['0']['office']?></td>
                                    <td><input class="default-input" type="text" name="office" autocomplete="off" pattern="^[Г1-9]{1}[0-9]{0,1}-[1-9]{1}[0-9]{2}?"></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <input id="profile-change" class="grad-btn" type="submit" value="Применить изменения">
                    </form>
                </div>
                <?php if($_SESSION['id_admin']['role'] == 2): ?>
                <div class="category">
                    <h1>Администрирование</h1>
                    <div class="question">
                        <h3>ЗАРЕГИСТРИРОВАТЬ МОДЕРАТОРА</h3>
                        <form action="src/scripts/php/add_moderator.php" method="post">
                            <div class="add-input">
                                <p><strong>Фамилия:</strong></p><input class="default-input" type="text" name="last_name" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Имя:</strong></p><input class="default-input" type="text" name="first_name" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Отчество:</strong></p><input class="default-input" type="text" name="patronymic" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Кафедра:</strong></p>
                                <select class="default-input" name="department" required>
                                    <?php 
                                        $departments = get_departments($link);
                                    ?>
                                    <?php foreach($departments as $d): ?>
                                    <option value="<?=$d['id_department'] ?>"><?=$d['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><strong>Аудитория:</strong></p><input class="default-input" type="text" name="office" autocomplete="off" 
                                    pattern="^[Г1-9]{1}[0-9]{0,1}-[1-9]{1}[0-9]{2}?" 
                                    required>
                                <p><strong>Электронная почта:</strong></p><input class="default-input" type="email" name="email" autocomplete="off" required> 
                                <p><strong>Номер телефона:</strong></p><input class="default-input" type="text" name="phone" autocomplete="off" 
                                    pattern="\+7\s?[\(]{1}9[0-9]{2}[\)]{1}\s?\d{3}[-]{1}\d{2}[-]{1}\d{2}"
                                    placeholder="+7(XXX)XXX-XX-XX"
                                    required>
                                <p><strong>Логин:</strong></p><input class="default-input" type="text" name="login" autocomplete="off" minlength="6" maxlength="25" pattern="^[a-zA-Z]+$" onkeyup="isTaken(this.value)" required>
                                <p><strong>Пароль:</strong></p><input class="default-input" type="text" name="password" autocomplete="off" minlength="6" maxlength="25" required>
                            </div>
                            <div class='warn-c' id="login-warn" style="display: none"><kbd class='warn'>Указанный логин занят</kbd></div>
                            <input id="create-moder" type="submit" value="Зарегистрировать модератора">
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                <div class="category after-category">
                    <h1>Модерирование</h1>
                    <div class="question">
                        <h3>ДОБАВИТЬ ПРЕПОДАВАТЕЛЯ</h3>
                        <form action="src/scripts/php/add_teacher.php" method="post">
                            <div class="add-input">
                                <p><strong>Фамилия:</strong></p><input class="default-input" type="text" name="last_name" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Имя:</strong></p><input class="default-input" type="text" name="first_name" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Отчество:</strong></p><input class="default-input" type="text" name="patronymic" autocomplete="off" pattern="^[А-ЯЁ]{1}[а-яё]*$" required>
                                <p><strong>Кафедра:</strong></p>
                                <select class="default-input" name="department" required>
                                    <?php 
                                        $departments = get_departments($link);
                                    ?>
                                    <?php foreach($departments as $d): ?>
                                    <option value="<?=$d['id_department'] ?>"><?=$d['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><strong>Стаж:</strong></p><input class="default-input" type="number" name="experience" min="0" max="80" required>
                                <p><strong>Дисциплина:</strong></p><input class="default-input" type="text" name="discipline" autocomplete="off" pattern="^[А-Яа-яЁё\s]{2,}$" required>
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
                                <p><strong>Группа:</strong></p><input class="default-input" type="text" name="study_group" autocomplete="off" 
                                    pattern="^[А-ЯЁ]{2,5}-[1-2]{1}[0-9]{1}[1-9]{1}$" 
                                    required>
                                <p><strong>Количество использований:</strong></p><input class="default-input" type="number" name="usages" min="1" max="100" required>
                            </div>
                            <input class="grad-btn" type="submit" value="Создать опросы">
                        </form>
                    </div>
                    
                    <details class="question">
                        <summary><strong>СПИСОК АКТИВНЫХ КОДОВ</strong></summary>
                        <table class="table_sort" id="codes-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Код</th>
                                    <th>Кол-во использований</th>
                                    <th>Дата создания</th>
                                    <th>Преподаватель, дисциплина</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $codes = get_codes($link);
                                ?>
                                <?php foreach($codes as $c): ?>
                                <tr>
                                    <td><?=$c['id_questionnaire']; ?></td>
                                    <td><?=$c['code']; ?></td>
                                    <td><?=$c['usages']; ?></td>
                                    <td><?=$c['creation_date']; ?></td>
                                    <td><?=$c['last_name']." ".$c['first_name']." ".$c['patronymic'].", ".$c['discipline']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </details>
                </div>
            </div>
            <div>
                <div class="exit"><a href="src/scripts/php/logout.php">ВЫЙТИ</a></div>
            </div>
        </main>

        <?php include("src/app/footer.php") ?>
    
    </div>
</body>
</html>