<?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/app/head.php"); ?>
    <title>RateUTeacher</title>
</head>
<body class="<?=$themeClass; ?>">
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