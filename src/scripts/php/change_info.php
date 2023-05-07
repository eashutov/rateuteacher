<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once("database.php");

$admin = $_SESSION['id_admin']['id'];
if(isset($_POST['phone']) && $_POST['phone'] != "" && $_POST['phone'] != " ") {
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $sql = "UPDATE `admin` SET phone='$phone' WHERE id_admin=$admin;";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}
if(isset($_POST['email']) && $_POST['email'] != "" && $_POST['email'] != " ") {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $sql = "UPDATE `admin` SET email='$email' WHERE id_admin=$admin;";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}
if(isset($_POST['office']) && $_POST['office'] != "" && $_POST['office'] != " ") {
    $office = mysqli_real_escape_string($link, $_POST['office']);
    $sql = "UPDATE `admin` SET office='$office' WHERE id_admin=$admin;";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
}

// в любом случае делает запрос на обновление, даже если значение осталось тем же (возможно недоработка)
if(isset($_POST['hide'])) {
    $hide = $_POST['hide'];
} else {
    $hide = 0;
}
$sql = "UPDATE `admin` SET hide=$hide WHERE id_admin=$admin;";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$_SESSION['success'] = "Изменено";

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);