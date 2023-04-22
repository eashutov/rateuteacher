<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start(); 
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


        <main class="main-flex-type">
            <div class="code-window">
                <div class="logo-text">
                    RateUTeacher
                </div>
                <div class="form">
                    <div class="question">
                    <h3>АВТОРИЗАЦИЯ</h3>
                    <form action="src/scripts/php/login.php" method="post" class="form-input">
                        <div class="add-input">
                            <p><strong>Логин:</strong></p><input class="default-input" type="text" name="login" autocomplete="off">
                            <p><strong>Пароль:</strong></p><input class="default-input" type="password" name="password" autocomplete="off">
                        </div>
                        
                        
                        <!-- Какая-то хуйня с предупреждением, потому что через style.css ничего не меняется -->
                        <!-- пока обернул в h3 -->
                        <?php
                            if(isset($_SESSION['wrong_info'])) {
                                echo "<div class='warn-c'><kbd class='warn'>".$_SESSION['wrong_info']."</kbd></div>";
                            }
                            unset($_SESSION['wrong_info']);
                        ?>
                        <input class="grad-btn" type="submit" value="Войти">
                    </form>
                    </div>
                </div>
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
    <script src="src/scripts/pattern.js"></script>
</body>
</html>