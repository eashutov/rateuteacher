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