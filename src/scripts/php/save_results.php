<?php
require_once("database.php");

$code = $_POST['code'];
$id_questionnaire = $_POST['id_questionnaire'];

$sql = "UPDATE `questionnaire` SET usages=usages-1 WHERE questionnaire.code='$code' AND usages>0;";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}

$answers_a = [
    "a1" => $_POST['a1'],
    "a2" => $_POST['a2'],
    "a3" => $_POST['a3'],
    "a4" => $_POST['a4'],
    "a5" => $_POST['a5']
];

$answers_b = [
    "b1" => $_POST['b1'],
    "b2" => $_POST['b2'],
    "b3" => $_POST['b3'],
    "b4" => $_POST['b4'],
    "b5" => $_POST['b5'],
    "b6" => $_POST['b6'],
    "b7" => $_POST['b7'],
    "b8" => $_POST['b8']
];

$answers_c = [
    "c1" => $_POST['c1']
];

$a = array_sum($answers_a)/count($answers_a);
$b = array_sum($answers_b)/count($answers_b);
$c = array_sum($answers_c)/count($answers_c);
date_default_timezone_set('Asia/Omsk');
$date = date("Y-m-d");

$sql = "INSERT INTO `rating` VALUES (NULL, $id_questionnaire, '$date', $a, $b, $c);";
$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
$new_url = 'http://localhost/rateuteacher/redirection.php';
header('Location: '.$new_url);
