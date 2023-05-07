<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once('database.php');

$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
$patronymic = mysqli_real_escape_string($link, $_POST['patronymic']);
$department = $_POST['department'];
$office = mysqli_real_escape_string($link, $_POST['office']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$login = mysqli_real_escape_string($link, trim($_POST['login']));
$password = md5(mysqli_real_escape_string($link, trim($_POST['password'])));

$sql = "SELECT id_person FROM `person`
        WHERE last_name='$last_name'
        AND first_name='$first_name'
        AND patronymic='$patronymic'
        AND department='$department';";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
if(mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO `person` VALUES (NULL, '$last_name', '$first_name', '$patronymic', $department);";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Произошла ошибка при выполнении запроса");
    }
    $id_person = mysqli_insert_id($link);
} else {
    $id_person = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['id_person'];
}

$sql = "INSERT INTO `admin` VALUES (NULL, $id_person, 0, '$login', '$password', '$office', '$email', '$phone', NULL, 0);";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$_SESSION['success'] = "Модератор";

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);