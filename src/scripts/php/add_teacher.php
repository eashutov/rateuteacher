<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once("database.php");

$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
$patronymic = mysqli_real_escape_string($link, $_POST['patronymic']);
$department = $_POST['department'];
$experience = mysqli_real_escape_string($link, $_POST['experience']);
$discipline = mysqli_real_escape_string($link, $_POST['discipline']);

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
$sql = "INSERT INTO `teacher` VALUES (NULL, $id_person, $experience, '$discipline');";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$_SESSION['success'] = "Преподаватель";

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);
