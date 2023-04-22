<?php
require_once("database.php");

$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
$patronymic = mysqli_real_escape_string($link, $_POST['patronymic']);
$department = mysqli_real_escape_string($link, $_POST['department']);
$experience = mysqli_real_escape_string($link, $_POST['experience']);
$discipline = mysqli_real_escape_string($link, $_POST['discipline']);

$sql = "INSERT INTO `person` VALUES (NULL,'".$last_name."','".$first_name."','".$patronymic."','".$department."');";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$id_person = mysqli_insert_id($link);
$sql = "INSERT INTO `teacher` VALUES (NULL,'".$id_person."','".$experience."','".$discipline."');";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);