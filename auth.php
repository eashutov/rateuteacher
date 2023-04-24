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
</head>
<body>
    <div class="wrapper">

        <?php include("src/app/header.php"); ?>        

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

        <?php include("src/app/footer.php") ?>
    
    </div>
</body>
</html>