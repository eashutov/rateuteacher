<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
/* unset($_SESSION['id_admin']); */
session_destroy();
$new_url = 'http://localhost/rateuteacher/index.php';
header('Location: '.$new_url);