<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
</head>
<body class="<?=$themeClass; ?>">
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>

        <style>
            .qna-questions p {
                margin-top: 10px;
            }

            .qna-questions strong {
                font-size: 18px;
                font-style: italic;
            }
        </style>
        <main class="main-grid-type vh">
            <div></div>
            <div class="grid-type-container">
                <div class="category after-category">
                    <h1>Вопросы и ответы</h1>
                    <div class="question">
                        <p>Сайт предназначен для оценки студентами профессиональных качеств преподавателей</p>
                    </div>
                    <div class="qna-questions">
                        <details class="question">
                            <summary><strong>Где взять код опроса?</strong></summary>
                            <p>Для того, чтобы пройти опрос, можно обратиться к администрации сайта (все необходимые для этого данные указаны в разделе "Контакты").
                                Либо же сам преподаватель или администрация выдадут код опроса для вашей группы.</p>
                        </details>
                        <details class="question">
                            <summary><strong>Куда вводить код опроса?</strong></summary>
                            <p>Для ввода кода опроса на главной странице предусмотрена специальная форма.</p>
                        </details>
                        <details class="question">
                            <summary><strong>Что делать, если случайно закрыл форму оценки преподавателей?</strong></summary>
                            <p>Если вы не заполнили все поля или не нажали кнопку "отправить", то у вас есть возможность повторно ввести код опроса на главной странице 
                                (выбранные ранее вами ответы при этом не сохранятся).</p>
                        </details>
                        <details class="question">
                            <summary><strong>Как узнать рейтинг преподавателя, на которого прошел опрос?</strong></summary>
                            <p>Актуальный рейтинг преподавателей указан в разделе "Рейтинги".</p>
                        </details>
                        <details class="question">
                            <summary><strong>Почему один и тот же преподаватель отображен несколько раз на странице рейтингов?</strong></summary>
                            <p>Один преподаватель может вести несколько дисциплин и по каждой может быть составлен рейтинг.</p>
                        </details>
                        <details class="question">
                            <summary><strong>Куда можно обратиться, если возникли проблемы или вопросы во время работы с сайтом?</strong></summary>
                            <p>На каждом разделе сайта на подложке (в нижней левой части страницы) указаны контакты для обращений.</p>
                        </details>
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