<?php
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    if(!isset($_SESSION['q_info'])) {
        echo "<kbd>";
        echo "Access denied <br>";
        $ref = $_SERVER['HTTP_REFERER'];
        echo "<a href='$ref'>Return</a>";
        echo "</kbd>";
        exit();
    } else {
        $q_info = $_SESSION['q_info'];
        unset($_SESSION['q_info']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
    <script src="src/scripts/modal.js" defer></script>
    <script src="src/scripts/btnup.js" defer></script>
    <script src="src/scripts/validation.js" defer></script>
</head>
<body class="<?=$themeClass; ?>">
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

        <dialog class="dialog" id="modal">
            <h1>Предупреждение</h1>
            <p>При старте опроса не закрывайте вкладку, не обновляйте страницу и не переходите на другие разделы сайта, в противном случае выбранные ответы не сохранятся.</p>
            <p>Поэтому советуем заранее настроить и проверить интернет соединение, выбрать подходящее место и выделить необходимое количество времени на прохождение опроса.</p>
            <button id="modal-btn" onclick="window['modal'].close()" disabled>10</button>
        </dialog>

        <main class="main-grid-type">
            <div></div>
            <div class="grid-type-container">
                <div class="qnaire-info">
                    <h1>Информация об опросе</h1>
                    <p>Действителен до: <?=date('Y-m-d', strtotime("+14 day", strtotime($q_info['0']['creation_date']))); ?></p>
                    <p>Группа: <?=$q_info['0']['study_group']; ?></p>
                    <p>Преподаватель: <?=$q_info['0']['last_name']." ".$q_info['0']['first_name']." ".$q_info['0']['patronymic']; ?></p>
                    <p>Дисциплина: <?=$q_info['0']['discipline'] ?></p>
                    <p>Кафедра: <?=$q_info['0']['name']; ?></p>
                    <p class="question">Ответы на предложенные вопросы необходимы для дальнейшего улучшения образовательного процесса, они дадут возможность обратной связи с Вашими преподавателями. 
                        Заполнение этого опросного листа является анонимным. Оценка проводится по 5-балльной шкале. Все поля обязательны к заполнению.</p>
                </div>
                <form action="src/scripts/php/save_results.php" method="post">
                    <div class="category">
                        <h1>Информированность студента</h1>
                        <div class="question">
                            <p><strong>A1</strong>Цель курса была ясна с самого начала.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="a1" value="1" id="a1-1" required>
                                    <label for="a1-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a1" value="2" id="a1-2">
                                    <label for="a1-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a1" value="3" id="a1-3">
                                    <label for="a1-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a1" value="4" id="a1-4">
                                    <label for="a1-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a1" value="5" id="a1-5">
                                    <label for="a1-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>A2</strong>Я знал, какими компетенциями должен буду владеть после изучения этой дисциплины.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="a2" value="1" id="a2-1" required>
                                    <label for="a2-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a2" value="2" id="a2-2">
                                    <label for="a2-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a2" value="3" id="a2-3">
                                    <label for="a2-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a2" value="4" id="a2-4">
                                    <label for="a2-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a2" value="5" id="a2-5">
                                    <label for="a2-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>A3</strong>С самого начала я был проинформирован относительно объема, содержания и трудоемкости дисциплины.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="a3" value="1" id="a3-1" required>
                                    <label for="a3-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a3" value="2" id="a3-2">
                                    <label for="a3-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a3" value="3" id="a3-3">
                                    <label for="a3-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a3" value="4" id="a3-4">
                                    <label for="a3-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a3" value="5" id="a3-5">
                                    <label for="a3-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>A4</strong>С самого начала были определены рейтинговые критерии освоения дисциплины, получения зачета и экзаменационной оценки.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="a4" value="1" id="a4-1" required>
                                    <label for="a4-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a4" value="2" id="a4-2">
                                    <label for="a4-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a4" value="3" id="a4-3">
                                    <label for="a4-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a4" value="4" id="a4-4">
                                    <label for="a4-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a4" value="5" id="a4-5">
                                    <label for="a4-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>A5</strong>Мне была предоставлена информация о необходимых учебных и методических пособиях.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="a5" value="1" id="a5-1" required>
                                    <label for="a5-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a5" value="2" id="a5-2">
                                    <label for="a5-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a5" value="3" id="a5-3">
                                    <label for="a5-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a5" value="4" id="a5-4">
                                    <label for="a5-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="a5" value="5" id="a5-5">
                                    <label for="a5-5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- B CATEGORY -->
                    <div class="category">
                        <h1>Качества преподавателя</h1>
                        <div class="question">
                            <p><strong>Б1</strong>Излагает материал ясно, доступно.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b1" value="1" id="b1-1" required>
                                    <label for="b1-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b1" value="2" id="b1-2">
                                    <label for="b1-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b1" value="3" id="b1-3">
                                    <label for="b1-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b1" value="4" id="b1-4">
                                    <label for="b1-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b1" value="5" id="b1-5">
                                    <label for="b1-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б2</strong>Следит за реакцией аудитории.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b2" value="1" id="b2-1" required>
                                    <label for="b2-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b2" value="2" id="b2-2">
                                    <label for="b2-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b2" value="3" id="b2-3">
                                    <label for="b2-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b2" value="4" id="b2-4">
                                    <label for="b2-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b2" value="5" id="b2-5">
                                    <label for="b2-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б3</strong>Задает вопросы, побуждает к дискуссии.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b3" value="1" id="b3-1" required>
                                    <label for="b3-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b3" value="2" id="b3-2">
                                    <label for="b3-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b3" value="3" id="b3-3">
                                    <label for="b3-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b3" value="4" id="b3-4">
                                    <label for="b3-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b3" value="5" id="b3-5">
                                    <label for="b3-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б4</strong>Умеет снять напряженность и усталость аудитории.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b4" value="1" id="b4-1" required>
                                    <label for="b4-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b4" value="2" id="b4-2">
                                    <label for="b4-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b4" value="3" id="b4-3">
                                    <label for="b4-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b4" value="4" id="b4-4">
                                    <label for="b4-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b4" value="5" id="b4-5">
                                    <label for="b4-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б5</strong>Уважительное отношение к студентам.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b5" value="1" id="b5-1" required>
                                    <label for="b5-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b5" value="2" id="b5-2">
                                    <label for="b5-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b5" value="3" id="b5-3">
                                    <label for="b5-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b5" value="4" id="b5-4">
                                    <label for="b5-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b5" value="5" id="b5-5">
                                    <label for="b5-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б6</strong>Располагает к себе высокой эрудицией, манерой поведения, внешним видом.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b6" value="1" id="b6-1" required>
                                    <label for="b6-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b6" value="2" id="b6-2">
                                    <label for="b6-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b6" value="3" id="b6-3">
                                    <label for="b6-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b6" value="4" id="b6-4">
                                    <label for="b6-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b6" value="5" id="b6-5">
                                    <label for="b6-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б7</strong>Преподаватель всегда старается поощрить и поддержать студентов, которые добросовестно выполняют свои обязанности.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b7" value="1" id="b7-1" required>
                                    <label for="b7-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b7" value="2" id="b7-2">
                                    <label for="b7-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b7" value="3" id="b7-3">
                                    <label for="b7-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b7" value="4" id="b7-4">
                                    <label for="b7-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b7" value="5" id="b7-5">
                                    <label for="b7-5">5</label>
                                </div>
                            </div>
                        </div>
                        <div class="question">
                            <p><strong>Б8</strong>Объективность в оценке знания студентов.</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="b8" value="1" id="b8-1" required>
                                    <label for="b8-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b8" value="2" id="b8-2">
                                    <label for="b8-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b8" value="3" id="b8-3">
                                    <label for="b8-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b8" value="4" id="b8-4">
                                    <label for="b8-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="b8" value="5" id="b8-5">
                                    <label for="b8-5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category">
                        <h1>Общая удовлетворенность</h1>
                        <div class="question">
                            <p><strong>В1</strong>Общая удовлетворенность от дисциплины (качество преподавания, востребованность дисциплины в жизни, в будущей профессии, объективность оценки и пр.).</p>
                            <div class="qnaire-input-container">
                                <div class="input-radio">
                                    <input type="radio" name="c1" value="1" id="c1-1" required>
                                    <label for="c1-1">1</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="c1" value="2" id="c1-2">
                                    <label for="c1-2">2</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="c1" value="3" id="c1-3">
                                    <label for="c1-3">3</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="c1" value="4" id="c1-4">
                                    <label for="c1-4">4</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="c1" value="5" id="c1-5">
                                    <label for="c1-5">5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="end-qnaire">
                        <!-- <input type="reset" value="Отменить"> -->
                        <!-- <input type="submit" value="Отправить"> -->
                        <input type="hidden" name="code" value="<?=$q_info['0']['code']; ?>">
                        <input type="hidden" name="id_questionnaire" value="<?=$q_info['0']['id_questionnaire']; ?>">
                        <div class="tooltip">
                            <input type="reset" value="Отменить">
                            <span class="tooltiptext">Удалить все введенные данные</span>
                        </div>
                        <div class="tooltip">
                            <input type="submit" value="Отправить" disabled> 
                            <span id="submit-span" class="tooltiptext">Сначала заполните все поля</span>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <div class="btn-up btn-up_hide"></div>
            </div>
        </main>

        <?php include("src/app/footer.php") ?>

    </div>
</body>
</html>