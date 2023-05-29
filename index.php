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

        <?php include("src/app/footer.php") ?>
    
    </div>
    <script src="src/scripts/pattern.js"></script>
</body>
</html>