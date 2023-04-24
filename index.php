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


        <!-- <header class="site-header">
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
                    <a href="profile.php" class="sign"><img src="src/images/sign.svg" alt="sign" width="20px" height="20px" /></a>
                </div>
            </div>
        </header> -->
        <?php include("src/app/header.php"); ?>
        

        <!-- MAIN -->


        <main class="main-flex-type">
            <div class="code-window">
                <div class="logo-text">
                    RateUTeacher
                </div>
                <div class="form">
                    <form action="src/scripts/php/check_code.php" method="post" class="form-input">
                        <div class="input-container">
                            <input type="text" name="code" class="code-input" id="code" placeholder="Введите код опроса" required>
                            <label for="code" class="label">Код опроса</label>
                            <?php
                                if(isset($_SESSION['wrong_code'])) {
                                    echo "<div class='warn-c'><kbd class='warn'>".$_SESSION['wrong_code']."</kbd></div>";
                                }
                                unset($_SESSION['wrong_code']);
                            ?>
                            <button class="grad-btn" type="submit" id="btn">Начать опрос</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>


        <!-- FOOTER -->


        <!-- <footer class="site-footer">
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
        </footer> -->
        <?php include("src/app/footer.php") ?>
    
    </div>
    <script src="src/scripts/pattern.js"></script>
</body>
</html>