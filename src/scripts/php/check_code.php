<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once("database.php");

$code = mysqli_real_escape_string($link, $_POST['code']);
$sql = "SELECT questionnaire.id_questionnaire, questionnaire.creation_date, questionnaire.study_group, person.last_name, person.first_name, person.patronymic, department.name, teacher.discipline
        FROM `questionnaire`, `teacher`, `person`, `department`
        WHERE questionnaire.id_teacher=teacher.id_teacher 
        AND teacher.id_person=person.id_person
        AND person.department=department.id_department
        AND questionnaire.code='$code' 
        AND questionnaire.usages>0;";

$result = mysqli_query($link, $sql);
if (!$result) {
    die("Произошла ошибка при выполнении запроса");
}
if(mysqli_num_rows($result) == 0) {
    $_SESSION['wrong_code'] = 'Код недействителен';
    $new_url = 'http://localhost/rateuteacher/index.php';
    header('Location: '.$new_url);
    exit();
}

$q_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
$q_info['0']['code'] = $code;
$_SESSION['q_info'] = $q_info;

$new_url = 'http://localhost/rateuteacher/questionnaire.php';
header('Location: '.$new_url);