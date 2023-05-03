<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once("database.php");

$id_teacher = $_POST['teacher'];
$study_group = $_POST['study_group'];
$usages = $_POST['usages'];
$id_admin = $_SESSION['id_admin']['id'];
date_default_timezone_set('Asia/Omsk');
$date = date("Y-m-d H:i:s");
$q_number = rand(1, 9999);
$code = implode('-', [$study_group, $id_teacher, $q_number]);

$sql = "INSERT INTO `questionnaire` VALUES (NULL,'$code', $usages, '$date', '$study_group', $id_teacher, $id_admin);";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$_SESSION['success'] = $code;

$new_url = 'http://localhost/rateuteacher/profile.php';
header('Location: '.$new_url);